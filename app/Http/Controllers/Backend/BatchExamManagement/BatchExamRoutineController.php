<?php

namespace App\Http\Controllers\Backend\BatchExamManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\BatchExamManagement\BatchExamRoutine;
use Illuminate\Http\Request;

class BatchExamRoutineController extends Controller
{
    protected $batchExamRoutines = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!empty(request()->input('batch_exam_id')))
        {
            return view('backend.batch-exam-management.batch-exam-routines.index', [
                'batchExamRoutines'   => BatchExamRoutine::where('batch_exam_id', request()->input('batch_exam_id'))->get(),
            ]);
        }
        return 'Please select a Batch Exam to get Batch Exam Routine';
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
        $request->validate(['date_time' => 'required','day' => 'required']);
        BatchExamRoutine::createOrUpdateCourseRoutines($request);
        return back()->with('success', 'Batch Exam Routine Created Successfully');
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
        return view('backend.batch-exam-management.batch-exam-routines.edit', [
            'batchExamRoutine'   => BatchExamRoutine::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        BatchExamRoutine::createOrUpdateCourseRoutines($request, $id);
        return back()->with('success', 'Batch Exam Routine Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BatchExamRoutine::find($id)->delete();
        return back()->with('success', 'Batch Exam Routine deleted Successfully');
    }
}
