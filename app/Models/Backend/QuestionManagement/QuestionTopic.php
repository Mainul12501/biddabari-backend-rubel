<?php

namespace App\Models\Backend\QuestionManagement;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionTopic extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'question_topic_id',
        'created_by',
        'name',
        'icon',
        'image',
        'meta_title',
        'meta_description',
        'order',
        'slug',
        'status',
        'type',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'question_topics';

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($questionTopic){
            if (file_exists($questionTopic->image))
            {
                unlink($questionTopic->image);
            }
            if (file_exists($questionTopic->icon))
            {
                unlink($questionTopic->icon);
            }
        });
    }

    private static $questionTopics, $questionTopic;

    public static function createOrUpdateQuestionTopic ($request, $id = null)
    {
        QuestionTopic::updateOrCreate(['id' => $id], [
            'question_topic_id'     => !empty($request->question_topic_id) ? $request->question_topic_id : 0,
            'created_by'            => auth()->id(),
            'name'                  => $request->name,
            'icon'                  => isset($id) ? imageUpload($request->file('icon'), 'course/question-topics-icons/', 'question-topics', '40', '40', QuestionTopic::find($id)->icon) : imageUpload($request->file('image'), 'course/question-topics-icons/', 'question-topics', '40', '40'),
            'image'                 => isset($id) ? imageUpload($request->file('image'), 'course/question-topics-images/', 'question-topics', '300', '300', QuestionTopic::find($id)->image) : imageUpload($request->file('image'), 'course/question-topics-images/', 'question-topics', '300', '300'),
            'meta_title'            => $request->meta_title,
            'meta_description'      => $request->meta_description,
            'order'                 => 1,
            'slug'                  => str_replace(' ', '-', $request->name),
            'status'                => $request->status == 'on' ? 1 : 0,
            'type'                  => isset($_GET['q-type']) ? $_GET['q-type'] : null,
        ]);
    }

    public function questionTopic()
    {
        return $this->belongsTo(QuestionTopic::class);
    }

    public function questionTopics()
    {
        return $this->hasMany(QuestionTopic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function questionStores()
    {
        return $this->belongsToMany(QuestionStore::class)->orderBy('id', 'ASC');
    }
}
