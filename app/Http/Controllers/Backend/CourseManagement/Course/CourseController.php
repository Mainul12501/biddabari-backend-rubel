<?php

namespace App\Http\Controllers\Backend\CourseManagement\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseManagement\CourseCreateFormRequest;
use App\Models\Backend\Course\Course;
use App\Models\Backend\Course\CourseCategory;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use function PHPUnit\Runner\validate;

class CourseController extends Controller
{
    protected $course, $courses = [];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!empty($request->category_id))
        {
            $this->courses = CourseCategory::find($request->category_id)->courses;
        } else {
            $this->courses = Course::all();
        }
        return view('backend.course-management.course.courses.index', [
            'courses'   => $this->courses,
            'courseCategories'  => CourseCategory::whereStatus(1)->where('parent_id', 0)->get(),
            'teachers'  => Teacher::whereStatus(1)->get()
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
    public function store(CourseCreateFormRequest $request)
    {
        $this->course = Course::createOrUpdateCourse($request);
        $this->course->courseCategories()->sync(explode(',', $request->course_categories[0]));
//        $this->course->teachers()->sync($request->teachers_id);
        if ($request->ajax())
        {
            return response()->json('Course Created Successfully.');
        } else {
            return back()->with('success', 'Course Created Successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.course-management.course.courses.show', [
            'course'    => Course::where('id',$id)->with('courseCategories')->first(),
            'courseCategories'  => CourseCategory::whereStatus(1)->get(),
            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        return view('backend.course-management.course.courses.edit', [
            'course'    => Course::where('id',$id)->with('courseCategories')->first(),
            'courseCategories'  => CourseCategory::whereStatus(1)->get(),
            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCreateFormRequest $request, string $id)
    {
        try {
            $this->course = Course::createOrUpdateCourse($request, $id);
            $this->course->courseCategories()->sync(explode(',', $request->course_categories[0]));
//        $this->course->teachers()->sync($request->teachers_id);
            if ($request->ajax())
            {
                return response()->json('Course Updated Successfully.');
            } else {
                return back()->with('success', 'Course Updated Successfully.');
            }
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        return back()->with('error', 'Feature temporary disabled. Please contact your admin to enable it.');
        $this->course = Course::find($id);
        if (file_exists($this->course->image))
        {
            unlink($this->course->image);
        }
        $this->course->courseCategories()->detach();
        $this->course->delete();
        return back()->with('success', 'Course deleted Successfully.');
    }

    public function assignTeacherToCourse ($courseId)
    {
        return view('backend.course-management.course.courses.assign-teacher', [
            'course'   => Course::find($courseId),
            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    public function assignTeacher (Request $request, $id)
    {
        $request->validate(['teachers' => 'required']);
        $this->course = Course::find($id);
        $this->course->teachers()->sync($request->teachers);
        return back()->with('success', 'Trainer assigned to course Successfully.');
    }
    public function detachTeacher (Request $request, $id)
    {
        $this->course = Course::find($id);
        if (count($this->course->teachers) > 1)
        {
            $this->course->teachers()->detach($request->teacher_id);
            return back()->with('success', 'Trainer assigned to course Successfully.');
        }
        return back()->with('error', 'You must assign one teacher for this course.');
    }

    public function assignStudentToCourse ($courseId)
    {
        return view('backend.course-management.course.courses.assign-student', [
            'course'   => Course::find($courseId),
            'students'  => Student::whereStatus(1)->get()
        ]);
    }

    public function assignStudent (Request $request, $id)
    {
        $validator = $request->validate(['students' => 'required']);
        $this->course = Course::find($id);
        foreach ($this->course->students as $student)
        {
            foreach ($request->students as $inputStudentId)
            {
                if ($student->id == $inputStudentId)
                {
                    return back()->with('error', 'Student Already assigned this course.');
                }
            }
        }
        $this->course->students()->attach($request->students);
        return back()->with('success', 'Student assigned to course Successfully.');
    }
    public function detachStudent (Request $request, $id)
    {
        $this->course = Course::find($id);
        $this->course->students()->detach($request->student_id);
        return back()->with('success', 'Student assigned to course Successfully.');
    }

    public function getCoursesByCategory($id)
    {
        return response()->json(CourseCategory::find($id)->courses);
    }
}
