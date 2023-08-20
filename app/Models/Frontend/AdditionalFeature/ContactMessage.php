<?php

namespace App\Models\Frontend\AdditionalFeature;

use App\Models\Backend\BatchExamManagement\BatchExam;
use App\Models\Backend\BatchExamManagement\BatchExamSectionContent;
use App\Models\Backend\Course\Course;
use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMessage extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'parent_model_id',
        'batch_exam_section_content_id',
        'type',
        'subject',
        'name',
        'email',
        'mobile',
        'message',
        'is_seen',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'contact_messages';

    public static function createOrUpdateContactMessage ($request, $contactId = null)
    {
        static::updateOrCreate(['id' => $contactId], [
            'user_id'   => auth()->id(),
            'parent_model_id'   => isset($request->parent_model_id) ? $request->parent_model_id : 0,
            'batch_exam_section_content_id' => isset($request->batch_exam_section_content_id) ? $request->batch_exam_section_content_id : null,
            'type'  => $request->type,
            'subject'   => $request->subject,
            'name'  => $request->name,
            'email' => $request->email,
            'mobile'    => $request->mobile,
            'message'   => $request->message,
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'parent_model_id');
    }

    public function batchExam()
    {
        return $this->belongsTo(BatchExam::class, 'parent_model_id');
    }

    public function batchExamSectionContent()
    {
        return $this->belongsTo(BatchExamSectionContent::class);
    }
}
