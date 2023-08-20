<?php

namespace App\Http\Controllers\Backend\ViewControllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Course\Course;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use Illuminate\Http\Request;

use App\Models\Backend\Course\CourseSection;
use App\Models\Backend\Course\CourseExamResult;
use App\Models\Backend\Course\CourseSectionContent;
use Illuminate\Support\Facades\DB;

class AdminViewController extends Controller
{
    protected $data = [];
    public function dashboard ()
    {
        $user = auth()->user();
        foreach ($user->roles as $role)
        {
            if ($role->id == 4)
            {
                return redirect()->route('front.student.dashboard');
            }
        }
        $this->data = [
            'totalStudents'     => Student::whereStatus(1)->get()->count(),
            'totalTeachers'     => Teacher::whereStatus(1)->get()->count(),
            'totalCourses'     => Course::whereStatus(1)->get()->count(),
            'totalIncome'       => ParentOrder::where('status', 'approved')->get()
        ];
        return view('backend.single-view.dashboard.dashboard', $this->data);
    }

    public function changeStatus(Request $request, $id = null)
    {
        $status = '';
        try {
            $object = DB::table($request->model_name)->where('id', $request->id)->first();
            if ($object->status == 1)
            {
                $object = DB::table($request->model_name)->where('id', $request->id)->update(['status' => 0]);
                $status = 'Unpublished';
            } elseif ($object->status == 0)
            {
                $object = DB::table($request->model_name)->where('id', $request->id)->update(['status' => 1]);
                $status = 'Published';
            }
            return response()->json(['status' => 'success', 'message' => $status]);
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }
}
