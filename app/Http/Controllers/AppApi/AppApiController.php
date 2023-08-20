<?php

namespace App\Http\Controllers\AppApi;

use App\Http\Controllers\Controller;
use App\Models\Backend\Course\Course;
use App\Models\Backend\Course\CourseCategory;
use Illuminate\Http\Request;

class AppApiController extends Controller
{
    protected $course, $courses = [], $courseCategories = [], $courseCategory;
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
}
