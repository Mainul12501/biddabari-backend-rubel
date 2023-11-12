<?php

namespace App\Http\Controllers\Backend\CourseManagement\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseManagement\CourseCreateFormRequest;
use App\Models\Backend\BatchExamManagement\BatchExam;
use App\Models\Backend\BatchExamManagement\BatchExamRoutine;
use App\Models\Backend\BatchExamManagement\BatchExamSection;
use App\Models\Backend\BatchExamManagement\BatchExamSubscription;
use App\Models\Backend\Course\Course;
use App\Models\Backend\Course\CourseCategory;
use App\Models\Backend\Course\CourseCoupon;
use App\Models\Backend\Course\CourseRoutine;
use App\Models\Backend\Course\CourseSection;
use App\Models\Backend\Course\CourseSectionContent;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Runner\validate;

class CourseController extends Controller
{
    //    permission seed done
    protected $course, $courses = [];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('manage-course'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (!empty($request->category_id))
        {
            $this->courses = CourseCategory::find($request->category_id)->coursesDescOrder;
        } else {
            $this->courses = Course::latest()->get();
        }
        return view('backend.course-management.course.courses.index', [
            'courses'   => $this->courses,
            'courseCategories'  => CourseCategory::whereStatus(1)->where('parent_id', 0)->orderBy('order', 'ASC')->get(),
            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('create-course'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCreateFormRequest $request)
    {
        abort_if(Gate::denies('store-course'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        abort_if(Gate::denies('show-course'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        abort_if(Gate::denies('edit-course'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.course-management.course.courses.edit', [
            'course'    => Course::where('id',$id)->with('courseCategories')->first(),
            'courseCategories'  => CourseCategory::whereStatus(1)->where('parent_id', 0)->orderBy('order', 'ASC')->get(),
            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCreateFormRequest $request, string $id)
    {
        abort_if(Gate::denies('update-course'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        abort_if(Gate::denies('delete-course'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        return back()->with('error', 'Feature temporary disabled. Please contact your admin to enable it.');
        $user = auth()->user();
        foreach ($user->roles as $role)
        {
            if ($role->id == 1)
            {
                $this->course = Course::find($id)->delete();
                return back()->with('success', 'Course deleted Successfully.');
            }
        }

        return back()->with('error', 'You dont have permission to delete this course.');
    }

    public function assignTeacherToCourse ($courseId)
    {
        abort_if(Gate::denies('assign-course-teacher-page'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.course-management.course.courses.assign-teacher', [
            'course'   => Course::find($courseId),
            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    public function assignTeacher (Request $request, $id)
    {
        abort_if(Gate::denies('assign-course-teacher'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate(['teachers' => 'required']);
        $this->course = Course::find($id);
        $this->course->teachers()->sync($request->teachers);
        return back()->with('success', 'Trainer assigned to course Successfully.');
    }
    public function detachTeacher (Request $request, $id)
    {
        abort_if(Gate::denies('detach-course-teacher'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        abort_if(Gate::denies('assign-course-student-page'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.course-management.course.courses.assign-student', [
            'course'   => Course::find($courseId),
            'students'  => Student::whereStatus(1)->get(),
            'courses'   => Course::whereStatus(1)->get(['id', 'title'])
        ]);
    }

    public function assignStudent (Request $request, $id)
    {
        abort_if(Gate::denies('assign-course-student'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $validator = $request->validate([
            'students' => 'required',
            'course_id' => 'required',
        ]);
        $this->course = Course::find($id);
        $oldCourse = Course::find($request->course_id);
        foreach ($this->course->students as $student)
        {
            foreach ($request->students as $inputStudentId)
            {
//                if ($student->id == $inputStudentId)
                if ($student->id != $inputStudentId)
                {
                    $oldCourse->students()->detach($inputStudentId);
                    $stParentOrder = ParentOrder::where(['ordered_for' => 'course', 'parent_model_id' => $request->course_id, 'user_id' => Student::find($inputStudentId)->user_id])->first();
                    $stParentOrder->update([
                        'parent_model_id' => $id,
                    ]);
                    $this->course->students()->attach($inputStudentId);
//                    return back()->with('error', 'Student Already assigned this course.');
                }
            }
        }
//        $this->course->students()->attach($request->students);
        return back()->with('success', 'Student assigned to course Successfully.');
    }

    public function assignNewStudent(Request $request, $id)
    {
        abort_if(Gate::denies('assign-course-student'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $validator = $request->validate([
            'student_id' => 'required',
            'paid_amount' => 'required',
        ]);
        $this->course = Course::find($id);
        foreach ($this->course->students as $student)
        {
            if ($student->id == $request->student_id)
            {
                return back()->with('error', 'Student Already assigned this course.');
            }
        }

        ParentOrder::assignNewStudentToModel('course', $request, $id);
        $this->course->students()->attach($request->student_id);
        return back()->with('success', 'Student assigned to course Successfully.');
    }
    public function detachStudent (Request $request, $id)
    {
        abort_if(Gate::denies('detach-course-student'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->course = Course::find($id);
        $this->course->students()->detach($request->student_id);
        ParentOrder::where(['parent_model_id' => $id, 'user_id' => Student::find($request->student_id)->user_id])->first()->update(['status' => 'canceled']);
        return back()->with('success', 'Student assigned to course Successfully.');
    }

    public function getCoursesByCategory($id)
    {
        return response()->json(CourseCategory::find($id)->courses);
    }

    protected $courseArray ;
    public function exportCourseJson($modelName, $modelId)
    {


        $tempDir = public_path('backend/json-tmp-dir/');
        if (!File::isDirectory($tempDir))
        {
            File::makeDirectory($tempDir, 0777, true, true);
        }
        if ($modelName == 'course')
        {
            $modelData = Course::whereId($modelId)->with(['courseRoutines', 'courseCoupons', 'courseSections.courseSectionContents'])->first();
        } elseif ($modelName == 'batch_exam')
        {
            $modelData = BatchExam::whereId($modelId)->with(['batchExamRoutines', 'batchExamSubscriptions', 'batchExamSections.batchExamSectionContents'])->first();
        }
        File::put($tempDir.time().'-'.$modelName.'-export.json', $modelData);
        return \response()->download($tempDir.time().'-'.$modelName.'-export.json');
    }

    public function importModelJson(Request $request, $model)
    {
        try {
            $data = json_decode(File::get($request->file('json_file')->getRealPath()));
            if ($model == 'course')
            {
//            return $data->course_sections[0]->course_section_contents;
                $this->course = Course::importCourseModel($data);

//            course routines
                if (isset($data->course_routines) && count($data->course_routines) > 0)
                {
                    CourseRoutine::importCourseRoutine($data->course_routines, $this->course->id);
                }

//                course coupons
                if (isset($data->course_coupons) && count($data->course_coupons) > 0)
                {
                    CourseCoupon::importCourseCoupon($data->course_coupons, $this->course->id);
                }

//                course sections
                if (isset($data->course_sections) && count($data->course_sections) > 0)
                {
                    CourseSection::importCourseSections($data->course_sections, $this->course->id);
                }
            } elseif ($model == 'batch_exam')
            {
//                batch exam
                $batchExam = BatchExam::importBatchExamJson($data);

//                batch exam routines
                if (isset($data->batch_exam_routines) && count($data->batch_exam_routines) > 0)
                {
                    BatchExamRoutine::importBatchExamRoutine($data->batch_exam_routines, $batchExam->id);
                }

//                batch_exam_subscriptions
                if (isset($data->batch_exam_subscriptions) && count($data->batch_exam_subscriptions) > 0)
                {
                    BatchExamSubscription::importBatchExamSubcriptionsJson($data->batch_exam_subscriptions, $batchExam->id);
                }

//                batch_exam_sections
                if (isset($data->batch_exam_sections) && count($data->batch_exam_sections) > 0)
                {
                    BatchExamSection::importBatchExamSectionJson($data->batch_exam_sections, $batchExam->id);
                }
            }
            return back()->with('success', $model.' imported successfully.');
        } catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }

    }
}
