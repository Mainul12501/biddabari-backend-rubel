<?php

namespace App\Http\Controllers\Backend\CourseManagement\Course;

use App\Http\Controllers\Controller;
use App\Models\Backend\Course\CourseSection;
use App\Models\Backend\Course\CourseSectionContent;
use App\Models\Backend\PdfManagement\PdfStoreCategory;
use App\Models\Backend\QuestionManagement\QuestionStore;
use App\Models\Backend\QuestionManagement\QuestionTopic;
use Illuminate\Http\Request;

class CourseSectionContentController extends Controller
{
    protected $sectionContent,$sectionContents;
    protected $questionTopics = [], $questionTopic, $questions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!empty(\request()->input('section_id')))
        {
            return view('backend.course-management.course.section-contents.index', [
                'sectionContents'   => CourseSectionContent::whereCourseSectionId(\request()->input('section_id'))->latest()->get(),
                'courseSections'   => CourseSection::whereCourseId(\request()->input('course_id'))->get(),
                'pdfStoreCategories'   => PdfStoreCategory::whereStatus(1)->select('id', 'title')->get(),
            ]);
        }
        return back()->with('error', 'Please Select a Course Section to get it\'s contents.');
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
            'content_type' => 'required',
            'title' => 'required',
            'available_at' => 'required',
        ]);
        CourseSectionContent::saveOrUpdateCourseSectionContent($request);
        if ($request->ajax())
        {
            return response()->json('Course Content saved successfully.');
        } else {
            return  back()->with('success', 'Course Content saved successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $this->sectionContent = CourseSectionContent::find($id);
            return view('backend.course-management.course.section-contents.show', [
                'sectionContent'    => $this->sectionContent,
                'sectionContents'    => CourseSectionContent::whereCourseSectionId($this->sectionContent->course_section_id)->latest()->get(),
                'pdfStoreCategories'   => PdfStoreCategory::whereStatus(1)->select('id', 'title')->get(),
            ]);
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $this->sectionContent = CourseSectionContent::find($id);
            return view('backend.course-management.course.section-contents.edit', [
                'sectionContent'    => $this->sectionContent,
                'sectionContents'    => CourseSectionContent::whereCourseSectionId($this->sectionContent->course_section_id)->latest()->get(),
                'pdfStoreCategories'   => PdfStoreCategory::whereStatus(1)->select('id', 'title')->get(),
            ]);
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        CourseSectionContent::saveOrUpdateCourseSectionContent($request, $id);
        if ($request->ajax())
        {
            return response()->json('Course Content saved successfully.');
        } else {
            return  back()->with('success', 'Course Content saved successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseSectionContent::find($id)->delete();
        return  back()->with('success', 'Course Content deleted successfully.');
    }

    public function getContentForAddQuestion (Request $request)
    {
        return view('backend.course-management.course.section-contents.include-add-que-to-contents', [
            'content'   => CourseSectionContent::find($request->section_content_id),
            'examType'  => $request->exam_type,
            'questionTopics'    => QuestionTopic::whereStatus(1)->whereType($request->exam_type == 'exam' ? 'mcq' : 'written')->select('id', 'question_topic_id', 'name')->get(),
        ]);
    }

    public function getContentForAddClassQuestion (Request $request)
    {
        return view('backend.course-management.course.section-contents.include-add-que-to-class-contents', [
            'content'   => CourseSectionContent::find($request->section_content_id),
            'examOf'  => $request->exam_of,
            'questionTopics'    => QuestionTopic::whereStatus(1)->whereType('mcq')->where('question_topic_id', 0)->select('id', 'question_topic_id', 'name')->get(),
        ]);
    }

    public function getQuesByTopic (Request $request)
    {
        foreach ($request->question_topic_ids as $question_topic_id)
        {
            $this->questionTopic = QuestionTopic::whereId($question_topic_id)->select('id', 'question_topic_id', 'name')->with(['questionStores' => function($questions) use($request){
                $questions->whereQuestionType($request->exam_type == 'exam' ? 'MCQ' : 'Written')->whereStatus(1)->select('id', 'question_type', 'question')->get();
            }])->first();
            array_push($this->questionTopics, $this->questionTopic);
        }
//        return response()->json($this->questionTopics);
        return view('backend.course-management.course.section-contents.include-questions', [
            'questionTopics'    => $this->questionTopics,
        ]);
    }

    public function assignQuestionToContent (Request $request)
    {
        $this->sectionContent = CourseSectionContent::find($request->section_content_id);
        $this->sectionContent->questionStores()->attach($request->question_ids);
        return back()->with('success', 'Questions Added to this exam successfully.');
    }
    public function assignQuestionToClassContent (Request $request)
    {
        $this->sectionContent = CourseSectionContent::find($request->section_content_id);
        $this->sectionContent->questionStoresForClassXm()->attach($request->question_ids);
        return back()->with('success', 'Questions Added to this exam successfully.');
    }

    public function detachQuestionFromCourseContent(Request $request)
    {
        try {
            CourseSectionContent::find($request->content_id)->questionStores()->detach($request->question_id);
            return response()->json(['status' => 'success']);
        } catch (\Exception $exception)
        {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    public function detachQuestionFromCourseClassContent(Request $request)
    {
        try {
            CourseSectionContent::find($request->content_id)->questionStoresForClassXm()->detach($request->question_id);
            return response()->json(['status' => 'success']);
        } catch (\Exception $exception)
        {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}
