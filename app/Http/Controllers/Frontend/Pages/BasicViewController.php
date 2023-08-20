<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Models\Backend\AdditionalFeatureManagement\Advertisement;
use App\Models\Backend\AdditionalFeatureManagement\PopupNotification;
use App\Models\Backend\BlogManagement\Blog;
use App\Models\Backend\BlogManagement\BlogCategory;
use App\Models\Backend\CircularManagement\Circular;
use App\Models\Backend\Course\Course;
use App\Models\Backend\Course\CourseCategory;
use App\Models\Backend\Course\CourseCoupon;
use App\Models\Backend\ExamManagement\Exam;
use App\Models\Backend\ExamManagement\ExamCategory;
use App\Models\Backend\NoticeManagement\Notice;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Backend\ProductManagement\Product;
use App\Models\Backend\UserManagement\Teacher;
use App\Models\Frontend\AdditionalFeature\ContactMessage;
use App\Models\Frontend\CourseOrder\CourseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BasicViewController extends Controller
{
    protected $courseCategories, $courseCategory, $courses, $course, $courseCoupon, $courseCoupons = [], $teachers = [], $blogs = [], $blogCategories = [], $blog, $blogCategory;
    protected $message, $status, $notices = [], $notice, $products = [], $product, $data, $exams = [], $examCategories = [], $homeSliderCourses = [];
    protected $comments = [];
    public function home ()
    {
        $this->courseCategories = CourseCategory::whereStatus(1)->where('parent_id', 0)->latest()->orderBy('order', 'ASC')->select('id', 'name', 'image', 'slug', 'icon')->get();
        $this->courses = Course::whereStatus(1)->latest()->select('id', 'title', 'sub_title', 'price', 'banner', 'total_video', 'total_audio', 'total_pdf', 'total_exam', 'total_note', 'total_zip', 'total_live', 'total_link','total_file','total_written_exam', 'slug', 'discount_type', 'discount_amount', 'starting_date_time')->take(8)->get();
        foreach ($this->courses as $course)
        {
            $course->order_status = ViewHelper::checkIfCourseIsEnrolled($course);
        }
        $this->products = Product::whereStatus(1)->latest()->select('id', 'title', 'image', 'slug', 'description','price')->get();
//        $this->homeSliderCourses = Course::where('show_home_slider', 1)->select('id', 'slug', 'title', 'banner', 'description')->get();
        $this->homeSliderCourses = Advertisement::whereStatus(1)->whereContentType('course')->take(6)->get();
        $this->data = [
            'courseCategories'  => $this->courseCategories,
            'courses'           => $this->courses,
            'products'          => $this->products,
            'homeSliderCourses' => $this->homeSliderCourses,
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.home.home');
    }
    public function appHome ()
    {
        $this->courseCategories = CourseCategory::whereStatus(1)->where('parent_id', 0)->latest()->orderBy('order', 'ASC')->select('id', 'name', 'image', 'slug')->get();
        $this->courses = Course::whereStatus(1)->latest()->select('id', 'title', 'sub_title', 'price', 'banner')->take(8)->get();
        $this->products = Product::whereStatus(1)->latest()->select('id', 'title', 'image', 'price')->get();
        $this->notices = Notice::whereStatus(1)->whereType('scroll')->latest()->select('id', 'title', 'image', 'body')->get();
        $this->homeSliderCourses = Advertisement::whereStatus(1)->whereContentType('course')->take(5)->select('id', 'title', 'image', 'link', 'description')->get();
        $this->data = [
            'courseCategories'  => $this->courseCategories,
            'courses'           => $this->courses,
            'products'          => $this->products,
            'homeSliderCourses' => $this->homeSliderCourses,
            'scrollNotices'     => $this->notices
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.home.home');
    }

    public function appHomeCourseCategories ()
    {
        $data = CourseCategory::whereStatus(1)->where('parent_id', 0)->latest()->orderBy('order', 'ASC')->select('id', 'name', 'image', 'slug')->get();
        foreach ($data as $datum)
        {
            $datum->image = asset($datum->image);
        }
        return response()->json(['courseCategories' => $data]);
    }

    public function appHomeCourses ()
    {
        $data = Course::whereStatus(1)->latest()->select('id', 'title', 'sub_title', 'price', 'banner', 'discount_type', 'discount_amount', 'discount_start_date', 'discount_end_date')->take(8)->get();
        foreach ($data as $datum)
        {
            $datum->banner = asset($datum->banner);
        }
        return response()->json(['courses' => $data]);
    }

    public function appHomeProducts ()
    {
        $data = Product::whereStatus(1)->latest()->select('id', 'title', 'image', 'price')->get();
        foreach ($data as $datum)
        {
            $datum->image = asset($datum->image);
        }
        return response()->json(['products' => $data]);
    }

    public function appHomeNotices ()
    {
        $data = Notice::whereStatus(1)->whereType('scroll')->latest()->select('id', 'title', 'image', 'body')->get();
        foreach ($data as $datum)
        {
            $datum->image = asset($datum->image);
        }
        return response()->json(['notices' => $data]);
    }

    public function appHomeSliderCourses ()
    {
        $data = Advertisement::whereStatus(1)->whereContentType('course')->take(5)->select('id', 'title', 'image', 'link', 'description')->get();
        foreach ($data as $datum)
        {
            $datum->image = asset($datum->image);
        }
        return response()->json(['sliderCourses' => $data]);
    }

    public function appHomePopupNotification()
    {
        $this->data = PopupNotification::where(['status' => 1])->orderBy('id', 'DESC')->first();
        return response()->json(['popupNotification' => $this->data]);
    }

    public function allCourses ()
    {
        $this->courseCategories = CourseCategory::whereStatus(1)->where('parent_id', 0)->select('id', 'name', 'slug')->with(['courses' => function($course){
            $course->whereStatus(1)->select('id','title','sub_title','price','banner','total_video','total_audio','total_pdf','total_exam','total_note','total_zip','total_live','total_link','total_file','total_written_exam','slug','discount_type','discount_amount','starting_date_time')->latest()->take(9)->get();
        },
            'courseCategories' => function($courseCategories) {
                $courseCategories->select('id', 'parent_id', 'name', 'image', 'slug')->whereStatus(1)->get();
            }])->get();
        $this->data = ['courseCategories' => $this->courseCategories];
        return ViewHelper::checkViewForApi($this->data, 'frontend.courses.courses');
    }

    public function categoryCourses ($id, $slug = null)
    {
        $this->courseCategory = CourseCategory::whereId($id)->select('id','name', 'parent_id', 'image', 'icon', 'slug', 'status')->with(['courses' => function($course){
            $course->whereStatus(1)->select('*')->get()->makeHidden('updated_at');
        },
            'courseCategories' => function($courseCategories){
                $courseCategories->whereStatus(1)->select('id', 'parent_id','name', 'image', 'icon', 'slug', 'status')->get();
            }])->first();
        $this->data = ['courseCategory' => $this->courseCategory];
        return ViewHelper::checkViewForApi($this->data, 'frontend.courses.course-category', 'Category Not Found');
    }

    public function courseDetails ($id,$slug = null)
    {
        $course = Course::find($id);
        $courseEnrollStatus = ViewHelper::checkIfCourseIsEnrolled($course);
        if ($courseEnrollStatus == 'true')
        {
            return redirect()->route('front.student.course-contents', ['course_id' => $course->id, 'slug' => $course->slug]);
        } else {
            $this->course = Course::whereId($id)->with([
                'teachers'   => function($teachers) {
                    $teachers->select('id', 'user_id', 'subject', 'first_name', 'last_name', 'description', 'image')->with(['user' => function($user){
//                    $user->select('id', 'name', 'email')->first();
                    }])->get();
                },
                'courseSections' => function($courseSections) {
                    $courseSections->whereStatus(1)->with('courseSectionContents')->get()->except(['created_at', 'updated_at']);
                },
                'courseRoutines'    => function($courseRoutines) {
                    $courseRoutines->whereStatus(1)->get();
                }
            ])->first();
            $this->comments = ContactMessage::where(['status' => 1, 'type' => 'course', 'parent_model_id' => $this->course->id])->get();
            $this->data = [
                'course' => $this->course,
                'courseEnrollStatus' => $courseEnrollStatus,
                'comments'  => $this->comments
            ];
            return ViewHelper::checkViewForApi($this->data, 'frontend.courses.details', 'Course Not Found');
        }
        return 'something went wrong';
    }

    public function checkout ($id, $slug = null)
    {
        if (auth()->check())
        {
            $this->course = Course::whereId($id)->first();
//            $existUser = CourseOrder::where(['user_id' => auth()->id(), 'course_id' => $this->course->id])->first();
            $existUser = ParentOrder::where(['user_id' => auth()->id(), 'ordered_for' => 'course', 'parent_model_id' => $this->course->id])->first();
            if (!empty($existUser))
            {
                if (str()->contains(url()->current(), '/api/'))
                {
                    return response()->json('Sorry. You already enrolled this course.', 400);
                }
                return back()->with('error', 'Sorry. You already enrolled this course.');
            }
            if (!empty($this->course))
            {
                $this->data = [
                    'course'    => $this->course,
//                    'discountStatus'   => dateTimeFormatYmdHi($this->course->discount_start_date) < currentDateTimeYmdHi() && dateTimeFormatYmdHi($this->course->discount_end_date) > currentDateTimeYmdHi() ? 'valid' : 'not-valid'
                    'discountStatus'   => isset($this->course->discount_start_date) && !empty($this->course->discount_start_date) ? (dateTimeFormatYmdHi($this->course->discount_start_date) < currentDateTimeYmdHi() && dateTimeFormatYmdHi($this->course->discount_end_date) > currentDateTimeYmdHi() ? 'valid' : 'not-valid') : 'not-valid'
                ];
                return ViewHelper::checkViewForApi($this->data, 'frontend.courses.checkout');
            } else {
                if (str()->contains(url()->current(), '/api/'))
                {
                    return response()->json('Course Not Found', 400);
                } else {
                    return back()->with('error', 'Course Not Found');
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Please Login First to order a course.');
        }
        return 'course Checkout page';
    }


    public function allNotices ()
    {
//        $this->notices = Notice::whereStatus(1)->whereType('normal')->latest()->paginate(9);
        $this->notices = Notice::whereStatus(1)->whereType('normal')->latest()->take(6)->get();
        $this->data = [
            'notices'    => $this->notices,
//            'singleNotice'  => isset($_GET['notice-id']) ? Notice::find($_GET['notice-id']) : ''
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.notice.notice');
    }

    public function freeCourses ()
    {
        $this->courses = Course::where('is_paid', 0)->whereStatus(1)->latest()->select('id','title','sub_title','price','banner','total_video','total_audio','total_pdf','total_exam','total_note','total_zip','total_live','total_link','total_file','total_written_exam','slug','discount_type','discount_amount','starting_date_time')->get();
        $this->examCategories = ExamCategory::where('status', 1)->where('has_free_xm', 1)->select('id', 'exam_category_id', 'name')->with(['exams' => function($exams){
            $exams->where('is_paid', 0)->whereStatus(1)->select('id', 'exam_category_id', 'title', 'total_mark', 'image', 'xm_duration', 'xm_date', 'xm_start_time', 'xm_end_time', 'status')->get();
        }])->get();
        $this->data = [
            'courses'   => $this->courses,
            'examCategories'     => $this->examCategories,
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.free-service.free-service');
    }

    public function checkCoupon (Request $request)
    {
        try {
            $this->courseCoupons = CourseCoupon::whereCourseId($request->course_id)->get();
            if (count($this->courseCoupons) > 0)
            {
                foreach ($this->courseCoupons as $courseCoupon)
                {
//                    return response()->json(Carbon::parse($courseCoupon->available_from)->format('d-m-Y H:i'));
//                    return response()->json(Carbon::now()->format('d-m-Y H:i'));
                    if ($courseCoupon->code == $request->coupon_code)
                    {
                        if (session()->has('valid_used_coupon'))
                        {
                            if (session()->get('valid_used_coupon') == $request->coupon_code)
                            {
                                return response()->json([
                                    'status'     => 'false',
                                    'message'    => 'code already used for this course',
                                ]);
                            }
                        }
                        if (Carbon::parse($courseCoupon->available_from)->format('Y-m-d H:i') < Carbon::now()->format('Y-m-d H:i') && Carbon::parse($courseCoupon->expire_date_time)->format('d-m-Y H:i') > Carbon::now()->format('d-m-Y H:i'))
                        {
                            $this->status = 'true';
                            $this->message = 'Thanks for using coupon code.';
                            $currentTotal = $request->current_total - $courseCoupon->discount_amount;
                            session()->put('valid_used_coupon', $courseCoupon->code);
                            return response()->json([
                                'status'    => $this->status,
                                'message'    => $this->message,
                                'coupon'    => $courseCoupon,
                                'currentTotal'  => $currentTotal
                            ]);
                        } else {
                            $this->status = 'false';
                            $this->message = 'Sorry!! Coupon Expired.';
                            return response()->json([
                                'status'    => $this->status,
                                'message'    => $this->message,
                            ]);
                        }
                    }
                }
            } else {
                $this->status = 'false';
                $this->message = 'Sorry!! Coupon not found.';
                return response()->json([
                    'status'    => $this->status,
                    'message'    => $this->message,
                ]);
            }
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }

    }

    public function contact ()
    {
        return view('frontend.basic-pages.contact');
    }


    public function aboutUs ()
    {
        return view('frontend.basic-pages.about');
    }

    public function termsConditions ()
    {
        return view('frontend.basic-pages.terms-conditions');
    }

    public function privacy ()
    {
        return view('frontend.basic-pages.privacy');
    }


}
