<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Models\Backend\UserManagement\Student;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Xenon\LaravelBDSms\Facades\SMS;
use Xenon\LaravelBDSms\Provider\MimSms;
use Xenon\LaravelBDSms\Sender;
use App\Http\Requests\Auth\UserRegisterRequest;

class CustomAuthController extends Controller
{
    protected $email, $phone, $password, $user;
    public function login(Request $request)
    {
        if (auth()->attempt($request->only(['mobile', 'password']), $request->remember_me))
        {
            $this->user = auth()->user();
            if (str()->contains(url()->current(), '/api/'))
            {
                return response()->json([
                    'user'  => $this->user,
                    'auth_token' => $this->user->createToken('auth_token')->plainTextToken,
                    'status'    => 200
                ]);
            } else {
                if (Session::has('course_redirect_url'))
                {
                    $redirectUrl = Session::get('course_redirect_url');
                    Session::forget('course_redirect_url');
                    return redirect($redirectUrl)->with('success', 'You are successfully logged in.');
                }
                if ($request->ajax())
                {
                    return response()->json(['status' => 'success']);
                }
                return redirect()->route('dashboard')->with('success', 'You are successfully logged in.');
            }
        }
        if (str()->contains(url()->current(), '/api/')) {
            return response()->json(['error' => 'Email and Password does not match . Please try again.'],500);
        } else {
            if ($request->ajax())
            {
                return response()->json(['status' => 'error']);
            }
            return redirect()->route('login')->with('error', 'Something went wrong. Please try again');
        }
    }

    public function register (UserRegisterRequest $request)
    {
        $request['roles'] = 4;
        $request['request_form'] = 'student';
        DB::beginTransaction();
        try {
            $this->user = User::createOrUpdateUser($request);
            if ($request->roles == 4)
            {
                Student::createOrUpdateStudent($request, $this->user);
            }
            DB::commit();
            if (isset($this->user)) {
                Auth::login($this->user);
                if (str()->contains(url()->current(), '/api/')) {
                    return response()->json(['user' => $this->user, 'auth_token' => $this->user->createToken('auth_token')->plainTextToken]);
                } else {
                    if ($request->ajax())
            {
                return response()->json(['status' => 'success']);
            }
                    return redirect()->route('dashboard')->with('success', 'Your registration completed successfully.');
                }
            }
        } catch (\Exception $exception)
        {
            DB::rollBack();
            if (str()->contains(url()->current(), '/api/')) {
                return response()->json(['error' => $exception->getMessage()],500);
            } else {
                if ($request->ajax())
            {
                return response()->json(['status' => 'error']);
            }
                return redirect('/register')->with('error', $exception->getMessage());
            }
        }


//        return 'register failed';
    }

    public function sendOtp (Request $request)
    {
        $otpNumber = rand(100000, 999999);
        try {
            $existUser = User::whereMobile($request->mobile)->first();
            if (!isset($existUser))
            {
                //            test two
                $client = new Client();
                $body = $client->request('GET', 'http://sms.felnadma.com/api/v1/send?api_key=44516684285595991668428559&contacts=88'.$request->mobile.'&senderid=01844532630&msg=Biddabari+otp+is+'.$otpNumber);
                $responseCode = explode(':', explode(',', $body->getBody()->getContents())[0])[1];
//            return response()->json(gettype($responseCode));

                if (isset($responseCode) && !empty($responseCode) && $responseCode === "\"445000\"")
                {
//                \session()->put('otp', $otpNumber);
                    session_start();
                    $_SESSION['otp'] = $otpNumber;
                    return response()->json(['otp' => $otpNumber, 'status' => 'success', 'user_status' => isset($existUser) ? 'exist' : 'not_exist']);
                } else {
                    return response()->json(['status' => 'false']);
                }
            } else {
                return response()->json([
                    'status' => 'success',
                    'user_status' => isset($existUser) ? 'exist' : 'not_exist',
                ]);
            }

        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }

    public function verifyOtp (Request $request)
    {
        session_start();
        try {
//            if (Session::get('otp') == $request->otp)
            if ($_SESSION['otp'] == $request->otp)
            {
                \session()->forget('otp');
                $existUser = User::whereMobile($request->mobile_number)->first();
                return response()->json([
                    'status' => 'success',
                    'user_status' => isset($existUser) ? 'exist' : 'not_exist',
                ]);
            } else {
                return response()->json(['error'=> 'OTP mismatch. Please Try again.']);
            }
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }
    public function checkUserForApp (Request $request)
    {

        try {
            $existUser = User::whereMobile($request->mobile_number)->first();
            return response()->json([
                'status' => 'success',
                'user_status' => isset($existUser) ? 'exist' : 'not_exist',
            ]);
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }
}
