<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Order\OrderSubmitRequest;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Frontend\CourseOrder\CourseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function placeCourseOrder (OrderSubmitRequest $request)
    {
        try {
            if (auth()->check())
            {
                $existUser = ParentOrder::where(['user_id' => auth()->id(), 'ordered_for' => 'course', 'parent_model_id' => $request->course_id])->first();
                if (!empty($existUser))
                {
                    if (str()->contains(url()->current(), '/api/'))
                    {
                        return response()->json(['message' => 'Sorry. You already enrolled this course.'], 400);
                    }
                    return back()->with('error', 'Sorry. You already enrolled this course.');
                }
//                CourseOrder::saveOrUpdateCourseOrder($request);
                ParentOrder::storeXmOrderInfo($request, $request->course_id);
                if (str()->contains(url()->current(), '/api/'))
                {
                    return response()->json(['message' => 'You Ordered the course successfully.'], 200);
                }
                return redirect()->route('front.student.dashboard')->with('success', 'You Ordered the course successfully.');
            } else {
                Session::put('course_redirect_url', url()->current());
                if (str()->contains(url()->current(), '/api/'))
                {
                    return response()->json(['message' => 'Please Login First.'], 401);
                }
                return redirect()->route('login')->with('error', 'Please Login First');
            }
        } catch (\Exception $exception)
        {
            if (str()->contains(url()->current(), '/api/'))
            {
                return response()->json($exception->getMessage());
            } else {
                return back()->with('error', $exception->getMessage());
            }
        }

    }
}
