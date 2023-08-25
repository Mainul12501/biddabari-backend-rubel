<?php

namespace App\Http\Controllers\AppApi;

use App\Http\Controllers\Controller;
use App\Models\Backend\BatchExamManagement\BatchExam;
use App\Models\Backend\BatchExamManagement\BatchExamResult;
use App\Models\Backend\Course\Course;
use App\Models\Backend\Course\CourseCategory;
use App\Models\Backend\Course\CourseExamResult;
use App\Models\Backend\Course\CourseSectionContent;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function Nette\Utils\data;

class AppApiController extends Controller
{
    protected $course, $courses = [], $courseCategories = [], $courseCategory, $courseSections = [], $courseSectionContent, $courseSectionContents = [], $date = [];
    public function courseDetails($id, $slug = null)
    {
        $this->course = Course::whereId($id)
            ->select('id', 'title', 'sub_title', 'price', 'banner', 'description', 'starting_date_time', 'ending_date_time', 'discount_type', 'discount_amount', 'total_video', 'total_class', 'total_note', 'total_exam', 'is_paid', 'status', 'discount_start_date', 'discount_end_date')->with([
            'teachers'   => function($teachers) {
                $teachers->select('id', 'user_id', 'subject', 'first_name', 'last_name', 'image')->with(['user' => function($user){
//                    $user->select('id', 'name', 'email')->first();
                }])->get();
            },
            'courseSections' => function($courseSections) {
                $courseSections->whereStatus(1)->select('id', 'course_id', 'title', 'available_at', 'is_paid', 'status')->get()->except(['created_at', 'updated_at']);
            }
        ])->first();
        return response()->json(['course' => $this->course]);
    }

    public function allCourses()
    {
        $this->courseCategories = CourseCategory::whereStatus(1)->where('parent_id', 0)->select('id', 'name', 'slug')->with(['courses' => function($course){
            $course->whereStatus(1)->select('id','title','sub_title','price','banner', 'slug')->latest()->get();
        },
            'courseCategories' => function($courseCategories) {
                $courseCategories->select('id', 'parent_id', 'name', 'image', 'slug')->whereStatus(1)->get();
            }])->get();
        return response()->json(['courseCategories' => $this->courseCategories]);
    }

    public function allCoursesForNavTabs()
    {
        $this->courses = Course::whereStatus(1)->select('id','title','sub_title','price','banner', 'slug')->latest()->get();
        return response()->json(['courses' => $this->courses]);
    }

    public function courseCategoryResources($id, $slug = null)
    {
        $this->courseCategories = CourseCategory::where('parent_id', $id)->whereStatus(1)->select('id', 'parent_id', 'name', 'image')->get();
        foreach($this->courseCategories as $courseCategory)
        {
            $courseCategory->image = asset($courseCategory->image);
        }
        return response()->json(['courseCategories' => $this->courseCategories]);
    }

    public function CategoryCoursesResources($id, $slug = null)
    {
        $this->courseCategory = CourseCategory::where('id', $id)->whereStatus(1)->select('id','name')->with(['courses' => function($courses){
            $courses->select('id', 'title', 'sub_title', 'banner', 'price')->whereStatus(1)->get();
        }])->first();

            foreach($this->courseCategory->courses as $course)
            {
                $course->banner = asset($course->banner);
            }
        return response()->json(['courses' => $this->courseCategory->courses]);
    }

    public function getCourseSections ($courseId)
    {
        $this->course = Course::whereId($courseId)->select('id', 'title', 'slug', 'status')->with(['courseSections' => function($courseSections){
            $courseSections->whereStatus(1)->where('available_at', '<=', Carbon::now()->format('Y-m-d H:i'))->select('id', 'course_id', 'title', 'available_at', 'is_paid')->get();
        }])->first();
        return response()->json(['courseSections' => $this->course]);
    }

    public function getCourseSectionContents($courseSectionId)
    {
        $this->courseSectionContents = CourseSectionContent::where(['course_section_id' => $courseSectionId, 'status' => 1])->select('id', 'course_section_id', 'title', 'is_paid', 'has_class_xm')->get();
        return response()->json(['courseSectionContents' => $this->courseSectionContents]);
    }

    public function appCourseSectionContentDetails($contentId)
    {
        $this->courseSectionContent = CourseSectionContent::find($contentId);
        $this->courseSectionContent->note_content = strip_tags($this->courseSectionContent->note_content);
        $this->courseSectionContent->pdf_file = asset($this->courseSectionContent->pdf_file);
        return response()->json(['courseSectionContentDetails' => $this->courseSectionContent]);
    }

    public function showCourseExamRanking($contentId)
    {
        $this->courseExamResults = CourseExamResult::where(['course_section_content_id' => $contentId])->orderBy('result_mark', 'DESC')->orderBy('required_time', 'ASC')->get();
        $myRank = [];
        foreach ($this->courseExamResults as $index => $courseExamResult)
        {
            if ($courseExamResult->user_id == auth()->id())
            {
                $myRank = $courseExamResult;
                $myRank['position'] = ++$index;
            }
            $courseExamResult->provided_ans = strip_tags($courseExamResult->provided_ans);
        }
        $this->data = [
            'courseExamResults'     => $this->courseExamResults,
            'myPosition'    => $myRank
        ];
        return response()->json($this->data);
    }
    public function showBatchExamRanking($contentId)
    {
        $this->courseExamResults = BatchExamResult::where(['batch_exam_section_content_id' => $contentId])->orderBy('result_mark', 'DESC')->orderBy('required_time', 'ASC')->get();
        $myRank = [];
        foreach ($this->courseExamResults as $index => $courseExamResult)
        {
            if ($courseExamResult->user_id == auth()->id())
            {
                $myRank = $courseExamResult;
                $myRank['position'] = ++$index;
            }
            $courseExamResult->provided_ans = strip_tags($courseExamResult->provided_ans);
        }
        $this->data = [
            'courseExamResults'     => $this->courseExamResults,
            'myPosition'    => $myRank
        ];
        return response()->json($this->data);
    }

    public function showBatchDetailsWithSections ($batchExamId)
    {
            $this->exam = BatchExam::whereId($batchExamId)->select('id', 'title', 'slug', 'status')->with(['batchExamSections' => function($batchExamSections){
                $batchExamSections->where('available_at', '<=', Carbon::now()->format('Y-m-d H:i'))->whereStatus(1)->select('id', 'batch_exam_id', 'title', 'available_at', 'is_paid')->get();
            }])->first();

            $this->data = [
                'batchExam'    => $this->exam
            ];
            return response()->json($this->data);
    }

    public function getUserInfo()
    {
        $isStudent = false;
        $isTeacher = false;
        $user = auth()->user();
        if (!empty($user->roles))
        {
            foreach ($user->roles as $role)
            {
                if ($role->id == 4)
                {
                    $isStudent = true;
                } elseif ($role->id == 3)
                {
                    $isTeacher = true;
                }
            }
        }
        try {
            if ($isStudent)
            {
                $this->data = [
                    'student'   => Student::whereUserId($user->id)->first(),
                    'user'      => $user
                ];
            } elseif ($isTeacher)
            {
                $this->data = [
                    'teacher'   => Teacher::whereUserId($user->id)->first(),
                    'user'      => $user
                ];
            }
            if (!empty($this->data))
            {
                return response()->json($this->data);
            } else {
                return response()->json(['error' => 'Nothing found! Please Try Again.']);
            }
        } catch (\Exception $exception)
        {
            return response()->json(['error' => 'Login as a student or teacher to update Profile Info in this page.']);
        }
    }
}
