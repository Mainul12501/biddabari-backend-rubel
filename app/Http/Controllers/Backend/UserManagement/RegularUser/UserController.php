<?php

namespace App\Http\Controllers\Backend\UserManagement\RegularUser;

use App\Http\Controllers\Controller;
use App\Models\Backend\RoleManagement\Role;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user, $users = [];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->user_type))
        {
            $this->users    = User::all();
        } else {
            $this->users = User::latest()->select('id', 'mobile', 'name', 'status', 'profile_photo_path')->get();
        }
        return view('backend.role-management.user.index',[
            'users'   => $this->users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.role-management.user.create',[
            'roles'   => Role::whereStatus(1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->user = User::createOrUpdateUser($request);
        foreach ($request->roles as $role)
        {
            if ($role == '3')
            {
//                teacher
                Teacher::createOrUpdateTeacher($request, $this->user);
            } elseif ($role == '4')
            {
//                student
                Student::createOrUpdateStudent($request, $this->user);
            }
        }
        return back()->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.role-management.user.create',[
            'roles'   => Role::whereStatus(1)->get(),
            'user'      => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->user = User::createOrUpdateUser($request, $id);

        foreach ($this->user->roles as $role)
        {
            if ($role->id == 3)
            {
//                teacher
                Teacher::createOrUpdateTeacher($request, $this->user, $request->teacher_id);
            } elseif ($role->id == 4)
            {
//                student
                Student::createOrUpdateStudent($request, $this->user, $request->student_id);
            }
        }
        if (empty($request->user_try_update) && $request->user_try_update != 1)
        {
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } else {
            return back()->with('success', 'User updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($id != 1)
        {
            User::find($id)->delete();
            return back()->with('success', 'User deleted successfully.');
        } else {
            return back()->with('success', 'Please Contact your developer for deleting default user');
        }
    }

    public function viewProfile()
    {
        $user = User::find(auth()->id());
        $userDetails = '';
        $userType = '';
        foreach ($user->roles as $role)
        {
            if ($role->id == 3)
            {
                $userDetails = Teacher::where('user_id', $user->id)->first();
                $userType = 'teacher';
                break;
            } elseif ($role->id == 4)
            {
                $userDetails = Student::where('user_id', $user->id)->first();
                $userType = 'student';
                break;
            }
        }
        return view('backend.role-management.user.profile',[
            'user'  => $user,
            'userDetails'  => $userDetails,
            'userType'  => $userType,
        ]);
    }

    public function studentChangePassword(Request $request, $id)
    {
        $this->user = User::find($id);
        if (password_verify($request->old_password, $this->user->password))
        {
            if ($request->new_password == $request->confirm_password)
            {
                $this->user->update(['password' => Hash::make($request->new_password)]);
                return back()->with('success', 'Password Changed successfully.');
            } else {
                return back()->with('error', 'Password Mismatch. Please Try again.');
            }
        } else {
            return back()->with('error', 'Invalid Password. Please Try again.');
        }
    }

    public function allUsersPage(Request $request)
    {
        if (isset($request->user_type) && $request->user_type == 'student')
        {
            $this->users    = Student::latest()->get();
        } elseif (isset($request->user_type) && $request->user_type == 'teacher')
        {
            $this->users    = Teacher::latest()->get();
        } else {
            $this->users    = User::latest()->get();
        }
        return view('backend.role-management.user.all-users', [
            'users' => $this->users
        ]);
    }
}
