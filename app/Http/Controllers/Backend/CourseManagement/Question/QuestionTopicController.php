<?php

namespace App\Http\Controllers\Backend\CourseManagement\Question;

use App\Http\Controllers\Controller;
use App\Models\Backend\QuestionManagement\QuestionTopic;
use Illuminate\Http\Request;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

class QuestionTopicController extends Controller
{
    protected $questionTopic, $questionTopics = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['topic_id']))
        {
            $this->questionTopics = QuestionTopic::where('question_topic_id', $_GET['topic_id'])->whereType($_GET['q-type'])->get();
        } else {
            $this->questionTopics = QuestionTopic::where('question_topic_id', 0)->whereType($_GET['q-type'])->get();
        }
        return view('backend.question-management.question-topics.index', [
            'questionTopics'    => $this->questionTopics,
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
        $request->validate(['name' => 'required']);
        QuestionTopic::createOrUpdateQuestionTopic($request);
        return back()->with('success', 'Question Topic Created Successfully.');
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
        return response()->json(QuestionTopic::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        QuestionTopic::createOrUpdateQuestionTopic($request, $id);
        if ($request->ajax())
        {
            return response()->json('Question Topic Updated Successfully.');
        }
        return back()->with('success', 'Question Topic Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->deleteNestedQuestionTopic(QuestionTopic::find($id));
        return back()->with('success', 'Question Topic deleted Successfully.');
    }

    protected function deleteNestedQuestionTopic ($questionTopic)
    {
//        if (file_exists($questionTopic->image))
//        {
//            unlink($questionTopic->image);
//        }
//        if (file_exists($questionTopic->icon))
//        {
//            unlink($questionTopic->icon);
//        }
        if (!empty($questionTopic->courseCategories))
        {
            foreach ($questionTopic->questionTopics as $subCategory)
            {
                $this->deleteNestedQuestionTopic($subCategory);
            }
        }
        $questionTopic->delete();
    }
}
