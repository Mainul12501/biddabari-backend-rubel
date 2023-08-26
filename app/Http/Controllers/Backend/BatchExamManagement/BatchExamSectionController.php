<?php

namespace App\Http\Controllers\Backend\BatchExamManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\BatchExamManagement\BatchExamSection;
use Illuminate\Http\Request;

class BatchExamSectionController extends Controller
{
    //    permission seed done
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.batch-exam-management.batch-exam-sections.index', [
            'batchExamSections'   => BatchExamSection::whereBatchExamId(\request()->input('batch_exam_id'))->get(),
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
        BatchExamSection::createOrUpdateCourseSection($request);
        return back()->with('success', 'Batch Exam Section Created Successfully.');
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
        return response()->json(BatchExamSection::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['title' => 'required', 'available_at' => 'required',]);
        BatchExamSection::createOrUpdateCourseSection($request, $id);
        return back()->with('success', 'Batch Exam Section Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BatchExamSection::find($id)->delete();
        return back()->with('success', 'Batch Exam Section deleted Successfully.');
    }
}
