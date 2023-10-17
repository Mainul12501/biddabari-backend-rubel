<?php

namespace App\Http\Controllers\Frontend\FrontExam;

use App\helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Models\Backend\BatchExamManagement\BatchExam;
use App\Models\Backend\BatchExamManagement\BatchExamCategory;
use App\Models\Backend\BatchExamManagement\BatchExamResult;
use App\Models\Backend\BatchExamManagement\BatchExamSectionContent;
use App\Models\Backend\Course\CourseClassExamResult;
use App\Models\Backend\Course\CourseExamResult;
use App\Models\Backend\Course\CourseSectionContent;
use App\Models\Backend\ExamManagement\Exam;
use App\Models\Backend\ExamManagement\ExamCategory;
use App\Models\Backend\ExamManagement\ExamOrder;
use App\Models\Backend\ExamManagement\ExamResult;
use App\Models\Backend\ExamManagement\ExamSubscriptionPackage;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Backend\QuestionManagement\QuestionOption;
use App\Models\Backend\QuestionManagement\QuestionStore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Response;
use function PHPUnit\Framework\directoryExists;

class FrontExamController extends Controller
{
    protected $questions = [], $exams = [], $exam, $examCategory, $examCategories = [], $subscriptions = [], $courseExamResults = [];
    protected $xmResult, $data = [], $courseSection, $courseSections = [], $sectionContent, $sectionContents = [];
    protected $examResult, $resultNumber, $totalRightAns, $totalWrongAns, $totalProvidedAns, $question, $questionOption, $questionJson=[], $fileSessionPaths = [], $filePathString, $pdfFilePath;
    public function xmTestForDev ()
    {
        $this->questions = QuestionStore::whereQuestionType('mcq')->get();
        return view('frontend.exams.view-exam-form', ['questions' => $this->questions]);
    }

    public function startExam ($examId, $slug = null)
    {
        if (ViewHelper::authCheck())
        {
            $this->exam = Exam::find($examId);
//        if (Carbon::today()->format('Y-m-d') <= $this->exam->xm_date)
//        {
//            return 'can participate';
//        }
//        if (Carbon::today()->format('Y-m-d') > $this->exam->xm_date)
//        {
//            return 'date over';
//        }
            return view('frontend.exams.practice.start', [
                'exam'  => $this->exam,
            ]);
        } else {
            return back()->with('error', 'Please Login First.');
        }
    }

    public function startcourseExam ($contentId)
    {
        if (ViewHelper::authCheck())
        {
            $existExamResult = CourseExamResult::where(['course_section_content_id' => $contentId, 'user_id' => ViewHelper::loggedUser()->id])->first();
            if (!empty($existExamResult))
            {
                return back()->with('error', 'You already participate in this exam.');
            }
            $this->exam = CourseSectionContent::whereId($contentId)->with(['questionStores'])->first();
            $this->data = [
                'exam'   => $this->exam
            ];
            return ViewHelper::checkViewForApi($this->data, 'frontend.exams.course.start');
        } else {
            return back()->with('error', 'Please Login First.');
        }
    }

    public function startClassExam($contentId)
    {
        if (ViewHelper::authCheck())
        {
            $this->sectionContent = CourseSectionContent::whereId($contentId)->with(['questionStoresForClassXm'])->first();
            $existUserClassXm = CourseClassExamResult::where(['course_section_content_id' => $this->sectionContent->id, 'user_id' => ViewHelper::loggedUser()->id])->first();
            if (isset($existUserClassXm))
            {
                return back()->with('error' , 'You already passed the class Exam.');
            }
            $this->data = [
                'exam'   => $this->sectionContent
            ];
            return ViewHelper::checkViewForApi($this->data, 'frontend.exams.course.class.start');
        } else {
            return back()->with('error', 'Please Login First.');
        }
    }

    public function startBatchExam ($contentId)
    {
        if (ViewHelper::authCheck())
        {
            $existExamResult = BatchExamResult::where(['batch_exam_section_content_id' => $contentId, 'user_id' => ViewHelper::loggedUser()->id])->first();
            if (!empty($existExamResult))
            {
                return back()->with('error', 'You already participate in this exam.');
            }
            $this->exam = BatchExamSectionContent::whereId($contentId)->with(['questionStores'])->first();
            $this->data = [
                'exam'   => $this->exam
            ];
            return ViewHelper::checkViewForApi($this->data, 'frontend.exams.batch-exam.start');
        } else {
            return back()->with('error', 'Please Login First.');
        }
    }

    public function getExamResult (Request $request, $examId, $slug = null)
    {
        $this->resultNumber = 0;
        $this->exam = Exam::whereId($examId)->first();

        if ($this->exam)
        {
            if ($this->exam->xm_type == 'MCQ')
            {
                $this->questionJson = $request->question;
                foreach ($request->question as $question_id => $answer)
                {
                    if (!is_array($answer))
                    {
                        unset($this->questionJson[$question_id]);
                    }
                    $this->question = QuestionStore::whereId($question_id)->select('id', 'question_type', 'question_mark', 'negative_mark', 'has_all_wrong_ans', 'status')->first();
                    if (is_array($answer))
                    {
                        if ($this->question->has_all_wrong_ans == 1)
                        {
//                            $this->resultNumber -= (int)$this->question->negative_mark;
                            $this->resultNumber -= (int)$this->exam->exam_per_question_mark;
                        } else {
                            $this->questionOption = QuestionOption::whereId($answer['answer'])->select('id', 'is_correct')->first();
                            if ($this->questionOption->is_correct == 1)
                            {
                                $this->resultNumber += (int)$this->exam->exam_per_question_mark;
                            } else {
                                $this->resultNumber -= $this->exam->exam_negative_mark;
                            }
                        }
                    }
                }
                $this->examResult = [
                    'exam_id'       => $examId,
                    'user_id'       => ViewHelper::loggedUser()->id,
                    'xm_type'       => $this->exam->xm_type,
//                    'written_xm_file'       => fileUpload($request->file('written_xm_file'), 'xm-files/'.$this->exam->id.'/', 'file-'.ViewHelper::loggedUser()->id.'-'),
                    'provided_ans'      => json_encode($this->questionJson),
                    'result_mark'       => $this->resultNumber ?? 0,
                    'is_reviewed'       => 0,
                    'status'        => $this->exam->xm_type == 'MCQ' ? ($this->resultNumber >= $this->exam->xm_pass_mark ? 'pass' : 'fail') : 'pending',
                ];
            } elseif ($this->exam->xm_type == 'Written')
            {
                $imageUrl = '';
                $this->pdfFilePath = '';
                if (!empty($request->file('ans_files')))
                {
                    foreach ($request->file('ans_files') as $ans_file)
                    {
                        $imageUrl = imageUpload($ans_file, 'xm-temp-file-upload/', 'tmp-', 600, 800);
                        array_push($this->fileSessionPaths, $imageUrl);
                        $this->filePathString .= public_path($imageUrl).' ';
                    }
                    $this->pdfFilePath = 'backend/assets/uploaded-files/written-xm-ans-files/'.rand(10000,99999).time().'.pdf';
                    shell_exec('magick convert '. $this->filePathString.public_path($this->pdfFilePath));
                    foreach ($this->fileSessionPaths as $fileSessionPath)
                    {
                        if (file_exists($fileSessionPath))
                        {
                            unlink($fileSessionPath);
                        }
                    }
                }

                $this->examResult = [
                    'exam_id'       => $examId,
                    'user_id'       => ViewHelper::loggedUser()->id,
                    'xm_type'       => $this->exam->xm_type,
                    'written_xm_file'       => $this->pdfFilePath,
//                    'provided_ans'      => json_encode($this->questionJson),
//                    'result_mark'       => $this->resultNumber ?? 0,
                    'is_reviewed'       => 0,
                    'status'        =>  'pending',
                ];
            }
            ExamResult::storeExamResult($this->examResult);
            return redirect()->route('front.student.show-exam-result', ['xm_id' => $examId])->with('success', 'You Successfully finished your exam.');
        }
        return back()->with('error', 'Exam Not Found.');
    }

    public function getCourseExamResult(Request $request, $contentId, $slug = null)
    {
        try {
            $this->resultNumber = 0;
            $this->totalRightAns = 0;
            $this->totalWrongAns = 0;
            $this->totalProvidedAns = 0;
            $this->exam = CourseSectionContent::whereId($contentId)->first();
            if ($this->exam)
            {
                if ($this->exam->content_type == 'exam')
                {
                    if (!empty($request->question))
                    {
                        $this->questionJson = $request->question;
                        foreach ($request->question as $question_id => $answer)
                        {
                            if (!is_array($answer))
                            {
                                unset($this->questionJson[$question_id]);
                            }
                            $this->question = QuestionStore::whereId($question_id)->select('id', 'question_type', 'question_mark', 'negative_mark', 'has_all_wrong_ans', 'status')->first();
                            if (is_array($answer))
                            {
                                ++$this->totalProvidedAns;
                                if ($this->question->has_all_wrong_ans == 1)
                                {
//                                    $this->resultNumber -= (int)$this->question->negative_mark;
                                    $this->resultNumber -= $this->exam->exam_negative_mark;
                                    ++$this->totalWrongAns;
                                } else {
                                    $this->questionOption = QuestionOption::whereId($answer['answer'])->select('id', 'is_correct')->first();
                                    if ($this->questionOption->is_correct == 1)
                                    {
                                        $this->resultNumber += (int)$this->exam->exam_per_question_mark;
                                        ++$this->totalRightAns;
                                    } else {
                                        $this->resultNumber -= $this->exam->exam_negative_mark;
                                        ++$this->totalWrongAns;
                                    }
                                }
                            }
                        }
                    }
                    $this->examResult = [
                        'course_section_content_id'       => $contentId,
                        'user_id'       => ViewHelper::loggedUser()->id,
                        'xm_type'       => $this->exam->content_type,
//                    'written_xm_file'       => fileUpload($request->file('written_xm_file'), 'xm-files/'.$this->exam->id.'/', 'file-'.ViewHelper::loggedUser()->id.'-'),
                        'provided_ans'      => json_encode($this->questionJson),
                        'total_right_ans'       => $this->totalRightAns ?? 0,
                        'total_wrong_ans'       => $this->totalWrongAns ?? 0,
                        'total_provided_ans'    => $this->totalProvidedAns ?? 0,
                        'result_mark'       => $this->resultNumber ?? 0,
                        'is_reviewed'       => 0,
                        'required_time'       => $request->required_time,
                        'status'        => $this->exam->content_type == 'exam' ? ($this->resultNumber >= $this->exam->exam_pass_mark ? 'pass' : 'fail') : 'pending',
                    ];

                } elseif ($this->exam->content_type == 'written_exam')
                {
                    $imageUrl = '';
                    $this->pdfFilePath = '';
                    if (!empty($request->file('ans_files')))
                    {
                        foreach ($request->file('ans_files') as $ans_file)
                        {
                            $imageUrl = imageUpload($ans_file, 'course-xm-temp-file-upload/', 'tmp-', 600, 800);
                            array_push($this->fileSessionPaths, $imageUrl);
                            $this->filePathString .= public_path($imageUrl).' ';
                        }
                        $this->pdfFilePath = 'backend/assets/uploaded-files/course-written-xm-ans-files/'.rand(10000,99999).time().'.pdf';
                        if (!File::isDirectory(public_path('backend/assets/uploaded-files/course-written-xm-ans-files')))
                        {
                            File::makeDirectory(public_path('backend/assets/uploaded-files/course-written-xm-ans-files'), 0777, true, true);
                        }
                        shell_exec('magick convert '. $this->filePathString.public_path($this->pdfFilePath));
                        foreach ($this->fileSessionPaths as $fileSessionPath)
                        {
                            if (file_exists($fileSessionPath))
                            {
                                unlink($fileSessionPath);
                            }
                        }
                    }

                    $this->examResult = [
                        'course_section_content_id'       => $contentId,
                        'user_id'       => ViewHelper::loggedUser()->id,
                        'xm_type'       => $this->exam->content_type,
                        'written_xm_file'       => $this->pdfFilePath,
//                    'provided_ans'      => json_encode($this->questionJson),
//                    'result_mark'       => $this->resultNumber ?? 0,
                        'is_reviewed'       => 0,
                        'required_time'       => $request->required_time,
                        'status'        =>  'pending',
                    ];
                }
                $courseExamId = CourseExamResult::storeExamResult($this->examResult);
                if (str()->contains(url()->current(), '/api/'))
                {
                    return response()->json(['status' => 'success', 'message' => 'Exam Data Saved Successfully.', 'exam_id' => $this->exam->id]);
                } else {
                    return redirect()->route('front.student.show-course-exam-result', ['xm_id' => $contentId, 'xm_result_id' => $courseExamId->id])->with('success', 'You Successfully finished your exam.');
                }
            }
            return ViewHelper::returEexceptionError('Exam Not Found.');
        } catch (\Exception $exception)
        {
            return ViewHelper::returEexceptionError($exception->getMessage());
        }

    }
    public function getCourseClassExamResult(Request $request, $contentId, $slug = null)
    {
        try {
            $this->resultNumber = 0;
            $this->totalRightAns = 0;
            $this->totalWrongAns = 0;
            $this->totalProvidedAns = 0;
            $this->exam = CourseSectionContent::whereId($contentId)->first();
            if ($this->exam)
            {
                if (!empty($request->question))
                {
                    $this->questionJson = $request->question;
                    foreach ($request->question as $question_id => $answer)
                    {
                        if (!is_array($answer))
                        {
                            unset($this->questionJson[$question_id]);
                        }
                        $this->question = QuestionStore::whereId($question_id)->select('id', 'question_type', 'question_mark', 'negative_mark', 'has_all_wrong_ans', 'status')->first();
                        if (is_array($answer))
                        {
                            ++$this->totalProvidedAns;
                            if ($this->question->has_all_wrong_ans == 1)
                            {
                                $this->resultNumber -= 1;
                                ++$this->totalWrongAns;
                            } else {
                                $this->questionOption = QuestionOption::whereId($answer['answer'])->select('id', 'is_correct')->first();
                                if ($this->questionOption->is_correct == 1)
                                {
                                    $this->resultNumber += 1;
                                    ++$this->totalRightAns;
                                } else {
                                    ++$this->totalWrongAns;
                                }
                            }
                        }
                    }
                }
                $this->examResult = [
                    'course_section_content_id'       => $contentId,
                    'user_id'       => ViewHelper::loggedUser()->id,
//                'xm_type'       => $this->exam->content_type,
//                    'written_xm_file'       => fileUpload($request->file('written_xm_file'), 'xm-files/'.$this->exam->id.'/', 'file-'.ViewHelper::loggedUser()->id.'-'),
                    'provided_ans'      => json_encode($this->questionJson),
                    'total_right_ans'       => $this->totalRightAns ?? 0,
                    'total_wrong_ans'       => $this->totalWrongAns ?? 0,
                    'total_provided_ans'    => $this->totalProvidedAns ?? 0,
                    'result_mark'       => $this->resultNumber ?? 0,
                    'is_reviewed'       => 0,
                    'required_time'     => $request->required_time,
//                'status'        => $this->resultNumber >= $this->exam->exam_pass_mark ? 'pass' : 'fail',
                    'status'            => 'pass',
                ];
                $courseClassExamResult = CourseClassExamResult::storeExamResult($this->examResult);
                if (str()->contains(url()->current(), '/api/'))
                {
                    return response()->json(['status' => 'success', 'message' => 'Exam Data Saved Successfully.', 'exam_id' => $this->exam->id]);
                } else {
                    return redirect()->route('front.student.show-course-class-exam-result', ['xm_id' => $contentId, 'xm_result_id' => $courseClassExamResult->id])->with('success', 'You Successfully finished your exam.');
                }
            }
            return ViewHelper::returEexceptionError('Exam Not Found.');
        } catch (\Exception $exception)
        {
            return ViewHelper::returEexceptionError($exception->getMessage());
        }

    }

    public function getBatchExamResult(Request $request, $contentId, $slug = null)
    {
        try {
            $this->resultNumber = 0;
            $this->totalRightAns = 0;
            $this->totalWrongAns = 0;
            $this->totalProvidedAns = 0;
            $this->exam = BatchExamSectionContent::whereId($contentId)->first();
            if ($this->exam)
            {
                if ($this->exam->content_type == 'exam')
                {
                    if (!empty($request->question))
                    {
                        $this->questionJson = $request->question;
                        foreach ($request->question as $question_id => $answer)
                        {
                            if (!is_array($answer))
                            {
                                unset($this->questionJson[$question_id]);
                            }
                            $this->question = QuestionStore::whereId($question_id)->select('id', 'question_type', 'question_mark', 'negative_mark', 'has_all_wrong_ans', 'status')->first();
                            if (is_array($answer))
                            {
                                if ($this->question->has_all_wrong_ans == 1)
                                {
//                                $this->resultNumber -= (int)$this->question->negative_mark;
                                    $this->resultNumber -= (int)$this->exam->exam_per_question_mark;
                                    ++$this->totalWrongAns;
                                } else {
                                    $this->questionOption = QuestionOption::whereId($answer['answer'])->select('id', 'is_correct')->first();
                                    if ($this->questionOption->is_correct == 1)
                                    {
                                        ++$this->totalRightAns;
                                        $this->resultNumber += (int)$this->exam->exam_per_question_mark;
                                    } else {
                                        $this->resultNumber -= $this->exam->exam_negative_mark;
                                        ++$this->totalWrongAns;
                                    }
                                }
                            }
                        }
                    }
                    $this->examResult = [
                        'batch_exam_section_content_id'       => $contentId,
                        'user_id'       => ViewHelper::loggedUser()->id,
                        'xm_type'       => $this->exam->content_type,
//                    'written_xm_file'       => fileUpload($request->file('written_xm_file'), 'xm-files/'.$this->exam->id.'/', 'file-'.ViewHelper::loggedUser()->id.'-'),
                        'provided_ans'      => json_encode($this->questionJson),
                        'total_right_ans'       => $this->totalRightAns ?? 0,
                        'total_wrong_ans'       => $this->totalWrongAns ?? 0,
                        'total_provided_ans'    => $this->totalProvidedAns ?? 0,
                        'result_mark'       => $this->resultNumber ?? 0,
                        'is_reviewed'       => 0,
                        'required_time'       => $request->required_time,
                        'status'        => $this->exam->content_type == 'exam' ? ($this->resultNumber >= $this->exam->exam_pass_mark ? 'pass' : 'fail') : 'pending',
                    ];

                } elseif ($this->exam->content_type == 'written_exam')
                {
                    $imageUrl = '';
                    $this->pdfFilePath = '';
                    if (!empty($request->file('ans_files')))
                    {
                        foreach ($request->file('ans_files') as $ans_file)
                        {
                            $imageUrl = imageUpload($ans_file, 'batch-xm-temp-file-upload/', 'tmp-', 600, 800);
                            array_push($this->fileSessionPaths, $imageUrl);
                            $this->filePathString .= public_path($imageUrl).' ';
                        }
                        $this->pdfFilePath = 'backend/assets/uploaded-files/batch-written-xm-ans-files/'.rand(10000,99999).time().'.pdf';
                        shell_exec('magick convert '. $this->filePathString.public_path($this->pdfFilePath));
                        foreach ($this->fileSessionPaths as $fileSessionPath)
                        {
                            if (file_exists($fileSessionPath))
                            {
                                unlink($fileSessionPath);
                            }
                        }
                    }

                    $this->examResult = [
                        'batch_exam_section_content_id'       => $contentId,
                        'user_id'       => ViewHelper::loggedUser()->id,
                        'xm_type'       => $this->exam->content_type,
                        'written_xm_file'       => $this->pdfFilePath,
//                    'provided_ans'      => json_encode($this->questionJson),
//                    'result_mark'       => $this->resultNumber ?? 0,
                        'is_reviewed'       => 0,
                        'required_time'       => $request->required_time,
                        'status'        =>  'pending',
                    ];
                }
                $batchExamResult = BatchExamResult::storeExamResult($this->examResult);
                if (str()->contains(url()->current(), '/api/'))
                {
                    return response()->json(['status' => 'success', 'message' => 'Exam Data Saved Successfully.', 'exam_id' => $this->exam->id]);
                } else {
                    return redirect()->route('front.student.show-batch-exam-result', ['xm_id' => $contentId, 'xm_result_id' => $batchExamResult->id])->with('success', 'You Successfully finished your exam.');
                }
            }
            return ViewHelper::returEexceptionError('Exam Not Found.');
        } catch (\Exception $exception)
        {
            return ViewHelper::returEexceptionError($exception->getMessage());
        }
    }

    public function showExamResult ($xmId, $xmResultId = null)
    {
        $this->exam = Exam::whereId($xmId)->select('id', 'title', 'xm_type', 'total_mark', 'xm_pass_mark', 'xm_duration')->first();
        if (isset($xmResultId))
        {
            $this->xmResult = ExamResult::find($xmResultId);
        } else {
            $this->xmResult = ExamResult::where('exam_id', $xmId)->latest()->first();
        }

        return view('frontend.exams.practice.result', [
            'exam'  => $this->exam,
            'examResult'    => $this->xmResult
        ]);
    }

    public function showCourseExamResult ($xmId, $xmResultId = null)
    {
//        $this->exam = CourseSectionContent::whereId($xmId)->select('id', 'title', 'content_type', 'total_mark', 'xm_pass_mark', 'xm_duration')->first();
        $this->exam = CourseSectionContent::whereId($xmId)->first();
        if (isset($xmResultId))
        {
            $this->xmResult = CourseExamResult::find($xmResultId);
        } else {
            $this->xmResult = CourseExamResult::where('course_section_content_id', $xmId)->latest()->first();
        }
        $this->data = [
            'exam'  => $this->exam,
            'examResult'    => $this->xmResult,
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.course.result');
    }

    public function showCourseClassExamResult ($xmId, $xmResultId = null)
    {
        $this->exam = CourseSectionContent::whereId($xmId)->first();
        if (isset($xmResultId))
        {
            $this->xmResult = CourseClassExamResult::find($xmResultId);
        } else {
            $this->xmResult = CourseClassExamResult::where('course_section_content_id', $xmId)->latest()->first();
        }
        $this->data = [
            'exam'  => $this->exam,
            'examResult'    => $this->xmResult
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.course.class.result');
    }

    public function showBatchExamResult ($xmId, $xmResultId = null)
    {
//        $this->exam = CourseSectionContent::whereId($xmId)->select('id', 'title', 'content_type', 'total_mark', 'xm_pass_mark', 'xm_duration')->first();
        $this->exam = BatchExamSectionContent::whereId($xmId)->first();
        if (isset($xmResultId))
        {
            $this->xmResult = BatchExamResult::find($xmResultId);
        } else {
            $this->xmResult = BatchExamResult::where('batch_exam_section_content_id', $xmId)->latest()->first();
        }
        $this->data = [
            'exam'  => $this->exam,
            'examResult'    => $this->xmResult
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.batch-exam.result');
    }

    public function showAllExams ()
    {
        $masterExam = BatchExam::whereIsMasterExam(1)->first();
        if (isset($masterExam))
        {
            $masterExam->purchase_status = ViewHelper::checkUserBatchExamIsEnrollment(ViewHelper::loggedUser(), $masterExam);
        }

        $this->examCategories = BatchExamCategory::where(['status' => 1])->whereHas('batchExams')->with(['batchExams' => function($batchExams) {
            $batchExams->where(['status' => 1, 'is_master_exam' => 0, 'is_paid' => 1])->select('id', 'title', 'banner', 'slug')->get();
        }])->get();

        foreach ($this->examCategories as $examCategory)
        {
            foreach ($examCategory->batchExams as $batchExam)
            {
                if (isset($batchExam))
                {
                    $batchExam->purchase_status  = ViewHelper::checkUserBatchExamIsEnrollment(ViewHelper::loggedUser(), $batchExam);
                }
            }
        }

        $allBatchExams = BatchExam::where(['status' => 1, 'is_master_exam' => 0, 'is_paid' => 1])->select('id', 'title', 'banner', 'slug')->get();
        foreach ($allBatchExams as $singleBatchExam)
        {
            if (isset($singleBatchExam))
            {
                $singleBatchExam->purchase_status  = ViewHelper::checkUserBatchExamIsEnrollment(ViewHelper::loggedUser(), $singleBatchExam);
            }
        }

        $this->data = [
//            'exams'     => $this->exams,
            'examCategories'     => $this->examCategories,
            'masterExam'    => $masterExam,
            'allExams'      => $allBatchExams
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.xm.all-exams');
    }

    public function categoryExams ($id, $name = null)
    {
        $this->exam = BatchExam::whereId($id)->select('id', 'title', 'description', 'banner',  'status', 'is_paid')->with(['batchExamSubscriptions' => function ($package) {
            $package->whereStatus(1)->select('id', 'batch_exam_id', 'price', 'package_duration_in_days', 'package_title', 'discount_amount', 'discount_start_date', 'discount_end_date')->get();
        }])->first();
//        $this->examCategory->validity = Carbon::parse($this->examCategory->valid_from)->format('d-m-Y').' - '. Carbon::parse($this->examCategory->valid_to)->format('d-m-Y');
        return response()->json([
            'exam' => $this->exam,
            'enrollStatus'  => ViewHelper::authCheck() ? ViewHelper::checkIfBatchExamIsEnrollmentAndHasValidity(ViewHelper::loggedUser(),$this->exam) : 'false',
        ]);
//        $this->data = [
//            'examCategories'    => ExamCategory::where(['exam_category_id' => $id, 'status' => 1])->select('id', 'name', 'image', 'status')->get(),
//            'exams'    => Exam::where(['exam_category_id' => $id, 'status' => 1])->select('id', 'slug', 'title', 'image', 'xm_duration')->get(),
//        ];
//        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.xm.category-exams');
    }

    public function viewExamDetails($id, $slug = null)
    {
        $this->exam = Exam::find($id);
        $this->data = [
            'exam'  => $this->exam,
            'enrollStatus'  => ViewHelper::checkUserBatchExamIsEnrollment(ViewHelper::loggedUser(),$this->exam)
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.xm.details');
    }

    public function orderXm (Request $request, $id)
    {
        if (ViewHelper::authCheck())
        {
            $validator = Validator::make($request->all(), [
                'paid_to'   => 'required',
                'paid_from'   => 'required',
                'txt_id'   => 'required',
                'vendor'   => 'required',
                'batch_exam_subscription_id'   => 'required',
            ]);
            if ($validator->fails())
            {
                return ViewHelper::returEexceptionError($validator->errors());
//                return back()->withErrors($validator);
            }
            ParentOrder::storeXmOrderInfo($request, $id);
            return ViewHelper::returnSuccessMessage('You successfully purchased this exam');
//            return back()->with('success', 'You successfully purchased this exam');
        } else {
            return back()->with('error','Please Login First.');
        }
    }

    public function showCourseExamAnswers($contentId)
    {
        $this->sectionContent = CourseSectionContent::whereId($contentId)->select('id', 'course_section_id', 'parent_id', 'content_type', 'title', 'status')->with(['questionStores' => function($questionStores){
            $questionStores->select('id', 'question_type', 'question', 'question_description', 'question_image', 'question_video_link', 'written_que_ans', 'written_que_ans_description', 'has_all_wrong_ans', 'status')->with('questionOptions')->get();
        }])->first();
        $providedAnswers = (array) json_decode(CourseExamResult::where(['course_section_content_id' => $contentId, 'user_id' => ViewHelper::loggedUser()->id])->first()->provided_ans);
        $this->ansLoop($this->sectionContent, $providedAnswers);
//        foreach ($this->sectionContent->questionStores as $questionStore)
//        {
//            foreach ($questionStore->questionOptions as $questionOption)
//            {
//                foreach ($providedAnswers as $questionId => $providedAnswer)
//                {
//                    if ($questionId == $questionStore->id && $questionOption->is_correct == 1 && $questionOption->id == $providedAnswer->answer)
//                    {
//                        $questionOption->my_ans = 1;
//                        break;
//                    } elseif ($questionId == $questionStore->id && $questionOption->is_correct == 0 && $questionOption->id == $providedAnswer->answer)
//                    {
//                        $questionOption->my_ans = 0;
//                        break;
//                    } else {
//                        $questionOption->my_ans = 'x';
//                    }
//                }
//            }
//        }
        $this->data = [
            'content'   => $this->sectionContent,
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.course.show-ans');
    }
    public function showBatchExamAnswers($contentId)
    {
        $this->sectionContent = BatchExamSectionContent::whereId($contentId)->select('id', 'batch_exam_section_id', 'parent_id', 'content_type', 'title', 'status')->with(['questionStores' => function($questionStores){
            $questionStores->select('id', 'question_type', 'question', 'question_description', 'question_image', 'question_video_link', 'written_que_ans', 'written_que_ans_description', 'has_all_wrong_ans', 'status')->with('questionOptions')->get();
        }])->first();
        $providedAnswers = (array) json_decode(BatchExamResult::where(['batch_exam_section_content_id' => $contentId, 'user_id' => ViewHelper::loggedUser()->id])->first()->provided_ans);
        $this->ansLoop($this->sectionContent, $providedAnswers);
        $this->data = [
            'content'   => $this->sectionContent
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.batch-exam.show-ans');
    }

    public function ansLoop($sectionContent, $providedAnswers)
    {
        foreach ($sectionContent->questionStores as $questionStore)
        {
            foreach ($questionStore->questionOptions as $questionOption)
            {
                foreach ($providedAnswers as $questionId => $providedAnswer)
                {
                    if ($questionId == $questionStore->id && $questionOption->is_correct == 1 && $questionOption->id == $providedAnswer->answer)
                    {
                        $questionOption->my_ans = 1;
                        break;
                    } elseif ($questionId == $questionStore->id && $questionOption->is_correct == 0 && $questionOption->id == $providedAnswer->answer)
                    {
                        $questionOption->my_ans = 0;
                        break;
                    } else {
                        $questionOption->my_ans = 'x';
                    }
                }
            }
        }
    }
    public function showCourseExamRanking($contentId)
    {
        $this->courseExamResults = CourseExamResult::where(['course_section_content_id' => $contentId])->orderBy('result_mark', 'DESC')->orderBy('required_time', 'ASC')->with(['courseSectionContent' => function($courseSectionContent) {
            $courseSectionContent->select('id',  'course_section_id', 'exam_total_questions','exam_per_question_mark', 'written_total_questions')->first();
        },
            'user'])->get();
        $myRank = [];
        foreach ($this->courseExamResults as $index => $courseExamResult)
        {
            if ($courseExamResult->user_id == ViewHelper::loggedUser()->id)
            {
                $myRank = $courseExamResult;
                $myRank['position'] = ++$index;
            }
        }
        $this->data = [
            'courseExamResults'     => $this->courseExamResults,
            'myPosition'    => $myRank
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.course.show-ranking');
    }
    public function showBatchExamRanking($contentId)
    {
        $this->courseExamResults = BatchExamResult::where(['batch_exam_section_content_id' => $contentId])->orderBy('result_mark', 'DESC')->orderBy('required_time', 'ASC')->with(['batchExamSectionContent' => function($batchExamSectionContent) {
            $batchExamSectionContent->select('id',  'course_section_id', 'exam_total_questions','exam_per_question_mark', 'written_total_questions')->first();
        },
            'user'])->get();
        $myRank = [];
        foreach ($this->courseExamResults as $index => $courseExamResult)
        {
            if ($courseExamResult->user_id == ViewHelper::loggedUser()->id)
            {
                $myRank = $courseExamResult;
                $myRank['position'] = ++$index;
            }
        }
        $this->data = [
            'courseExamResults'     => $this->courseExamResults,
            'myPosition'    => $myRank
        ];
        return ViewHelper::checkViewForApi($this->data, 'frontend.exams.batch-exam.show-ranking');
    }

    public function pdfViewTest ()
    {
//        return Response::make(file_get_contents('assets/pdf-demo.pdf'), 200, [
//            'content-type'=>'application/pdf',
//        ]);
//        return view('backend.exam-management.xm-sheets.view-pdf-test');
    }
}
