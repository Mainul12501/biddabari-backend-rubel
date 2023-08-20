<?php

namespace App\Http\Controllers\Backend\OrderManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\BatchExamManagement\BatchExamCategory;
use App\Models\Backend\ExamManagement\Exam;
use App\Models\Backend\ExamManagement\ExamCategory;
use App\Models\Backend\ExamManagement\ExamOrder;
use App\Models\Backend\OrderManagement\ParentOrder;
use Illuminate\Http\Request;

class ExamOrderController extends Controller
{
    protected $examOrders;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        if (!empty($request->category_id))
//        {
//            $this->examOrders = ExamOrder::whereExamCategoryId($request->category_id)->get();
//        } else {
//            $this->examOrders = ExamOrder::whereStatus('pending')->take(10)->get();
//        }
        $this->examOrders = ParentOrder::whereOrderedFor('batch_exam')->latest()->get();
        return view('backend.order-management.exam-order.index', [
//            'exams'   => Exam::whereStatus(1)->get(),
            'examOrders'  => !empty($this->examOrders) ? $this->examOrders : '',
//            'examCategories'    => BatchExamCategory::whereStatus(1)->get(),
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
        ParentOrder::updateExamOrderStatus($request, $id);
        return back()->with('success', 'Order Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ParentOrder::find($id)->delete();
        return back()->with('success', 'Order Deleted Successfully');
    }

    public function changeContactStatus(Request $request, string $id)
    {
        $courseOrder = ParentOrder:: find($id)->update(['contact_status' => $request->contact_status, 'checked_by' => auth()->id()]);
        return back()->with('success', 'Order Contact Status Updated Successfully');
    }
}
