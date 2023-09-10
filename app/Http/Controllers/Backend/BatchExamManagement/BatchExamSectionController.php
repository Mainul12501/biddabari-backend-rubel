<?php

namespace App\Http\Controllers\Backend\BatchExamManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\BatchExamManagement\BatchExamSection;
use App\Models\Backend\PdfManagement\PdfStoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BatchExamSectionController extends Controller
{
    //    permission seed done
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('manage-batch-exam-section'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.batch-exam-management.batch-exam-sections.index', [
            'batchExamSections'   => BatchExamSection::whereBatchExamId(\request()->input('batch_exam_id'))->get(),
            'pdfStoreCategories'   => PdfStoreCategory::whereStatus(1)->select('id', 'title')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('create-batch-exam-section'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('store-batch-exam-section'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate(['title' => 'required', 'available_at' => 'required',]);
        BatchExamSection::createOrUpdateCourseSection($request);
        return back()->with('success', 'Batch Exam Section Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort_if(Gate::denies('show-batch-exam-section'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_if(Gate::denies('edit-batch-exam-section'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return response()->json(BatchExamSection::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort_if(Gate::denies('update-batch-exam-section'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate(['title' => 'required', 'available_at' => 'required',]);
        BatchExamSection::createOrUpdateCourseSection($request, $id);
        return back()->with('success', 'Batch Exam Section Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort_if(Gate::denies('delete-batch-exam-section'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        BatchExamSection::find($id)->delete();
        return back()->with('success', 'Batch Exam Section deleted Successfully.');
    }
}
