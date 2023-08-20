<?php

namespace App\Http\Controllers\Backend\ExamManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\BatchExamManagement\BatchExamResult;
use App\Models\Backend\ExamManagement\Exam;
use App\Models\Backend\ExamManagement\ExamCategory;
use App\Models\Backend\ExamManagement\ExamResult;
use App\Models\Backend\QuestionManagement\QuestionStore;
use App\Models\Backend\QuestionManagement\QuestionTopic;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    private $questions, $exam, $exams, $examSheets = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.exam-management.exams.index', [
            'exams'               => Exam::latest()->get(),
            'questionTopics'      => QuestionTopic::whereStatus(1)->get(),
            'examCategories'      => ExamCategory::where('exam_category_id', 0)->select('id', 'name')->whereStatus(1)->orderBy('order', 'ASC')->get()
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
        $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);
        try {
            Exam::createOrUpdateExam($request);
            return back()->with('success', 'Exam created Successfully.');
        } catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
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
//        return view('backend.exam-management.exams.edit', [
//            'exam'  => Exam::find($id)
//        ]);
        $this->exam = Exam::whereId($id)->with(['questionStores' => function($questionStore){
            $questionStore->select('id', 'question')->get();
        }])->first();
//        return response()->json($this->exam);
        return view('backend.exam-management.exams.edit', [
            'exam'  => $this->exam,
            'examCategories'      => ExamCategory::where('exam_category_id', 0)->select('id', 'name')->whereStatus(1)->orderBy('order', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);
        try {
            Exam::createOrUpdateExam($request, $id);
            return back()->with('success', 'Exam Updated Successfully.');
        } catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Exam::find($id)->delete();
        return back()->with('success', 'Exam Updated Successfully.');
    }

    public function getQuestionsForExam (Request $request)
    {
        $this->questions = QuestionStore::whereStatus(1)->where('question_type', $request->question_type)->select('id', 'question')->get();
        return response()->json($this->questions);
    }

    public function showExamSheet (Request $request)
    {
        if (!empty($request->exam_id))
        {

//            $this->examSheets = ExamResult::whereExamId($request->exam_id)->get();
            $this->examSheets = BatchExamResult::whereExamId($request->exam_id)->get();
        }
        return view('backend.exam-management.xm-sheets.index', [
//            'exams'   => Exam::whereStatus(1)->where('xm_type', 'Written')->get(),
            'exams'   => BatchExamResult::whereStatus(1)->where('xm_type', 'Written')->get(),
            'examSheets'  => !empty($this->examSheets) ? $this->examSheets : '',
        ]);
    }

    public function updateExamResult(Request $request)
    {
        ExamResult::updateXmResult($request);
        return back()->with('success', 'Exam Result Updated Successfully.');
    }
    public function getExamSheet($id)
    {
        return response()->json(ExamResult::find($id));
    }
    public function getExamsByCategory($id)
    {
        return response()->json(Exam::whereExamCategoryId($id)->whereStatus(1)->select('id', 'title', 'slug')->get());
    }
    public function checkExamPaper($id)
    {
        return view('backend.exam-management.xm-sheets.check-paper', [
            'examSheet' => ExamResult::find($id)
        ]);
    }
    public function updateWrittenExamResult(Request $request,$id)
    {
        $request['xm_result_id'] = $id;
        ExamResult::updateXmResult($request);
        return redirect()->route('show-exam-sheet')->with('success', 'Sheet updated successfully.');
    }
    public function getXmForAddQuestion(Request $request)
    {
        return view('backend.exam-management.exams.include-add-que-to-exams', [
            'exam'   => Exam::whereId($request->exam_id)->select('id', 'title', 'exam_category_id', 'subject_name')->first(),
            'examType'  => $request->exam_type,
            'questionTopics'    => QuestionTopic::whereStatus(1)->whereType($request->exam_type == 'exam' ? 'mcq' : 'written')->select('id', 'question_topic_id', 'name')->get(),
        ]);
    }

    public function assignQuestionToExam (Request $request)
    {
        $this->sectionContent = Exam::find($request->exam_id);
        $this->sectionContent->questionStores()->attach($request->question_ids);
        return back()->with('success', 'Questions Added to this exam successfully.');
    }
}
