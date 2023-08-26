<?php

namespace App\Http\Controllers\Backend\CourseManagement\Course;

use App\Http\Controllers\Controller;
use App\Models\Backend\Course\Course;
use App\Models\Backend\Course\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    //    permission seed done
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.course-management.course.course-sections.index', [
            'courseSections'   => CourseSection::whereCourseId(\request()->input('course_id'))->get(),
        ]);
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
        $request->validate(['title' => 'required', 'available_at' => 'required',]);
        CourseSection::createOrUpdateCourseSection($request);
        return back()->with('success', 'Course Section Created Successfully.');
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
        return response()->json(CourseSection::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['title' => 'required', 'available_at' => 'required',]);
        CourseSection::createOrUpdateCourseSection($request, $id);
        return back()->with('success', 'Course Section Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseSection::find($id)->delete();
        return back()->with('success', 'Course Section deleted Successfully.');
    }

}
