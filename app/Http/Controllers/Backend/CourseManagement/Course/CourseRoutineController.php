<?php

namespace App\Http\Controllers\Backend\CourseManagement\Course;

use App\Http\Controllers\Controller;
use App\Models\Backend\Course\Course;
use App\Models\Backend\Course\CourseRoutine;
use Illuminate\Http\Request;

class CourseRoutineController extends Controller
{
    //    permission seed done
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!empty(request()->input('course_id')))
        {
            return view('backend.course-management.course.course-routines.index', [
                'courseRoutines'   => CourseRoutine::where('course_id', request()->input('course_id'))->get(),
            ]);
        }
        return 'Please select a course to get Course Routine';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['date_time' => 'required','day' => 'required']);
        CourseRoutine::createOrUpdateCourseRoutines($request);
        return back()->with('success', 'Course Routine Created Successfully');
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
        return view('backend.course-management.course.course-routines.edit', [
            'courseRoutine'   => CourseRoutine::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        CourseRoutine::createOrUpdateCourseRoutines($request, $id);
        return back()->with('success', 'Course Routine Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseRoutine::find($id)->delete();
        return back()->with('success', 'Course Routine deleted Successfully');
    }
}
