<?php

namespace App\Models\Backend\QuestionManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionOption extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'question_store_id',
        'created_by',
        'option_title',
        'is_correct',
        'option_description',
        'option_image',
        'option_video_url',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'question_options';

    protected static $answer;

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::deleting(function ($questionOption) {
            if (file_exists($questionOption->option_image))
            {
                unlink($questionOption->option_image);
            };
        });
    }

    public static function saveQuestionOptions ($answer, $queStoreId)
    {
        self::$answer                       = new QuestionOption();
        self::$answer->question_store_id    = $queStoreId;
        self::$answer->created_by           = auth()->id();
        self::$answer->option_title         = $answer['option_title'];
        self::$answer->is_correct           = isset($answer['is_correct']) && $answer['is_correct'] == 'on' ? 1 : 0;
        self::$answer->option_description   = $answer['option_description'] ?? '';
        self::$answer->option_image         = isset($answer['option_image']) ? fileUpload($answer['option_image'], 'question-management/question-options', 'option') : null;
        self::$answer->option_video_url     = $answer['option_video_url'] ?? '';
        self::$answer->save();
    }

    public function questionStore()
    {
        return $this->belongsTo(QuestionStore::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
