<?php

namespace App\Http\Controllers\Backend\BatchExamManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BatchExam\BatchExamFormRequest;
use App\Models\Backend\BatchExamManagement\BatchExam;
use App\Models\Backend\BatchExamManagement\BatchExamCategory;
use App\Models\Backend\BatchExamManagement\BatchExamSubscription;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchExamController extends Controller
{
    protected $batchExam, $batchExams = [];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!empty($request->category_id))
        {
            $this->batchExams = BatchExamCategory::find($request->category_id)->batchExams;
        } else {
            $this->batchExams = BatchExam::whereIsMasterExam(0)->get();
        }
        return view('backend.batch-exam-management.batch-exams.index', [
            'batchExams'   => $this->batchExams,
            'batchExamCategories'  => BatchExamCategory::whereStatus(1)->where('parent_id', 0)->get(),
//            'teachers'  => Teacher::whereStatus(1)->get()
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
    public function store(BatchExamFormRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->batchExam = BatchExam::createOrUpdateCourse($request);
                BatchExamSubscription::createOrUpdateSubscription($request, $this->batchExam->id);
            });
            if ($request->ajax())
            {
                return response()->json('Batch Exam Created Successfully.');
            } else {
                return back()->with('success', 'Batch Exam Created Successfully.');
            }
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        if (isset($_GET['req_from']))
//        {
//            return response()->json(BatchExam::find($id));
//        }
        return view('backend.batch-exam-management.batch-exams.show', [
            'batchExam'    => BatchExam::where('id',$id)->with('batchExamCategories')->first(),
            'batchExamCategories'  => BatchExamCategory::whereStatus(1)->get(),
            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        return view('backend.batch-exam-management.batch-exams.edit', [
            'batchExam'    => BatchExam::where('id',$id)->with('batchExamCategories')->first(),
            'batchExamCategories'  => BatchExamCategory::whereStatus(1)->get(),
//            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BatchExamFormRequest $request, string $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $this->batchExam = BatchExam::createOrUpdateCourse($request, $id);
                if (isset($id))
                {
                    $this->batchExam->batchExamSubscriptions->each->delete();
                }
                BatchExamSubscription::createOrUpdateSubscription($request, $this->batchExam->id);
            });
//            $this->batchExam->batchExamCategories()->sync($request->batch_exam_categories);
//        $this->course->teachers()->sync($request->teachers_id);
            if ($request->ajax())
            {
                return response()->json('Batch Exam Updated Successfully.');
            } else {
                return back()->with('success', 'Batch Exam Updated Successfully.');
            }
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->batchExam = BatchExam::find($id);
//        if ($this->batchExam->id == 1)
//        {
//            return back()->with('error', 'Your can\'t delete a master exam');
//        }
        $this->batchExam->delete();
        return back()->with('success', 'Batch Exam deleted Successfully.');
    }

    public function assignTeacherToCourse ($batchExamId)
    {
        return view('backend.batch-exam-management.batch-exams.assign-teacher', [
            'batchExam'   => BatchExam::find($batchExamId),
            'teachers'  => Teacher::whereStatus(1)->get()
        ]);
    }

    public function assignTeacher (Request $request, $id)
    {
        $request->validate(['teachers' => 'required']);
        $this->batchExam = BatchExam::find($id);
        $this->batchExam->teachers()->sync($request->teachers);
        return back()->with('success', 'Trainer assigned to Batch Exam Successfully.');
    }
    public function detachTeacher (Request $request, $id)
    {
        $this->batchExam = BatchExam::find($id);
        if (count($this->batchExam->teachers) > 1)
        {
            $this->batchExam->teachers()->detach($request->teacher_id);
            return back()->with('success', 'Trainer assigned to Batch Exam Successfully.');
        }
        return back()->with('error', 'You must assign one teacher for this Batch Exam.');
    }

    public function assignStudentToCourse ($batchExamId)
    {
        return view('backend.batch-exam-management.batch-exams.assign-student', [
            'batchExam'   => BatchExam::find($batchExamId),
            'students'  => Student::whereStatus(1)->get()
        ]);
    }

    public function assignStudent (Request $request, $id)
    {
        $validator = $request->validate(['students' => 'required']);
        $this->batchExam = BatchExam::find($id);
        foreach ($this->batchExam->students as $student)
        {
            foreach ($request->students as $inputStudentId)
            {
                if ($student->id == $inputStudentId)
                {
                    return back()->with('error', 'Student Already assigned this Exam.');
                }
            }
        }
        $this->batchExam->students()->attach($request->students);
        return back()->with('success', 'Student assigned to Batch Exam Successfully.');
    }
    public function detachStudent (Request $request, $id)
    {
        $this->batchExam = BatchExam::find($id);
        $this->batchExam->students()->detach($request->student_id);
        return back()->with('success', 'Student assigned to Batch Exam Successfully.');
    }

    public function getBatchExamsByCategory($id)
    {
        return response()->json(BatchExamCategory::find($id)->batchExams);
    }

    public function showMasterExam ()
    {
        return view('backend.batch-exam-management.batch-exams.master-exam', [
            'masterExam'    => BatchExam::where('is_master_exam', 1)->first()
        ]);
    }
}
