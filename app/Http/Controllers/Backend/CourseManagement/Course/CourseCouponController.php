<?php

namespace App\Http\Controllers\Backend\CourseManagement\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseManagement\CourseCouponFormRequest;
use App\Models\Backend\Course\CourseCoupon;
use Illuminate\Http\Request;

class CourseCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!empty(request()->input('course_id')))
        {
            return view('backend.course-management.course.course-coupons.index', [
                'courseCoupons'   => CourseCoupon::where('course_id', request()->input('course_id'))->get(),
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
    public function store(CourseCouponFormRequest $request)
    {
//        $validator = $request->validate([
//            'code'  => 'required',
//            'type'  => 'required',
//            'expire_date_time'  => 'required',
//            'available_from'    => 'required',
//            'avaliable_to'  => 'required',
//        ]);
        CourseCoupon::createOrUpdateCourseCoupons($request);
        if ($request->ajax())
        {
            return response()->json('Course Coupon Created Successfully');
        }
        return back()->with('success', 'Course Coupon Created Successfully');
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
        return view('backend.course-management.course.course-coupons.edit', [
            'courseCoupon'   => CourseCoupon::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCouponFormRequest $request, string $id)
    {
//        $request->validate([
//            'code'  => 'required',
//            'type'  => 'required',
//            'expire_date_time'  => 'required',
//            'available_from'    => 'required',
//            'avaliable_to'  => 'required',
//        ]);
        CourseCoupon::createOrUpdateCourseCoupons($request, $id);
        if ($request->ajax())
        {
            return response()->json('Course Coupon Updated Successfully');
        }
        return back()->with('success', 'Course Coupon Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseCoupon::find($id)->delete();
        return back()->with('success', 'Course Coupon Updated Successfully');
    }
}
