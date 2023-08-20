<?php

namespace App\Http\Controllers\Backend\OrderManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Course\Course;
use App\Models\Backend\Course\CourseCategory;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Frontend\CourseOrder\CourseOrder;
use Illuminate\Http\Request;

class CourseOrderController extends Controller
{
    protected $courseOrders;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!empty($request->course_id))
        {
//            $this->courseOrders = CourseOrder::whereCourseId($request->course_id)->get();
            $this->courseOrders = ParentOrder::where('ordered_for', 'course')->whereParentModelId($request->course_id)->get();
        } else {
//            $this->courseOrders = CourseOrder::latest()->take(30)->get();
            $this->courseOrders = ParentOrder::where('ordered_for', 'course')->latest()->take(30)->get();
        }
        return view('backend.order-management.course-order.index', [
//            'courses'   => Course::whereStatus(1)->get(),
            'courseCategories'   => CourseCategory::whereStatus(1)->whereParentId(0)->get(),
            'courseOrders'  => !empty($this->courseOrders) ? $this->courseOrders : '',
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
        //
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
        return response()->json(ParentOrder::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        CourseOrder::updateCourseOrderStatus($request, $id);
        ParentOrder::updateExamOrderStatus($request, $id);
        return back()->with('success', 'Order Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        CourseOrder::find($id)->delete();
        ParentOrder::find($id)->delete();
        return back()->with('success', 'Order Deleted Successfully');
    }

    public function changeContactStatus(Request $request, string $id)
    {
//        $courseOrder =CourseOrder::find($id)->update(['contact_status' => $request->contact_status, 'checked_by' => auth()->id()]);
        $courseOrder = ParentOrder::find($id)->update(['contact_status' => $request->contact_status, 'checked_by' => auth()->id()]);
        return back()->with('success', 'Order Contact Status Updated Successfully');
    }

    public function getCourseOrderDetails($id)
    {
        return view('backend.order-management.course-order.course-order-details', [
//            'courseOrder'   => CourseOrder::find($id),
            'courseOrder'   => ParentOrder::find($id),
        ]);
//        return response()->json(CourseOrder::find($id));
    }
}
