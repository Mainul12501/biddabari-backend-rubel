<?php

namespace App\Models\Backend\BatchExamManagement;

use App\Models\Backend\ExamManagement\ExamResult;
use App\Models\Backend\QuestionManagement\QuestionStore;
use App\Models\Frontend\AdditionalFeature\ContactMessage;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatchExamSectionContent extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'batch_exam_section_id',
        'parent_id',
        'content_type',
        'title',
        'pdf_link',
        'pdf_file',
        'note_content',
        'exam_mode',
        'exam_duration_in_minutes',
        'exam_total_questions',
        'exam_per_question_mark',
        'exam_negative_mark',
        'exam_is_strict',
        'exam_start_time',
        'exam_start_time_timestamp',
        'exam_end_time',
        'exam_end_time_timestamp',
        'exam_result_publish_time',
        'exam_result_publish_time_timestamp',
        'exam_total_subject',
        'written_exam_duration_in_minutes',
        'written_total_questions',
        'written_description',
        'written_is_strict',
        'written_start_time',
        'written_start_time_timestamp',
        'written_end_time',
        'written_end_time_timestamp',
        'written_publish_time',
        'written_publish_time_timestamp',
        'written_total_subject',
        'is_paid',
        'order',
        'status',
        'available_at',
        'available_at_timestamp',

        'written_total_marks',
        'written_pass_mark',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'batch_exam_section_contents';

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($sectionContent){
            if (file_exists($sectionContent->pdf_file))
            {
                unlink($sectionContent->pdf_file);
            }
            if (!empty($sectionContent->batchExamSectionContents))
            {
                $sectionContent->batchExamSectionContents->each->delete();
            }
            if (!empty($sectionContent->batchExamResults))
            {
                $sectionContent->batchExamResults->each->delete();
            }
            if (!empty($sectionContent->examResults))
            {
                $sectionContent->examResults->each->delete();
            }
            if (!empty($sectionContent->contactMessages))
            {
                $sectionContent->contactMessages->each->delete();
            }
            if (!empty($sectionContent->questionStores))
            {
                $sectionContent->questionStores()->detach();
            }
        });
    }

    protected static $batchExamSectionContent;

    public static function saveOrUpdateCourseSectionContent ($request, $id = null)
    {
        $lastRecord = static::where('batch_exam_section_id', $request->batch_exam_section_id)->latest()->first();
        if (isset($id))
        {
            self::$batchExamSectionContent                                             = BatchExamSectionContent::find($id);
        } else {
            self::$batchExamSectionContent                                             = new BatchExamSectionContent();
        }
        self::$batchExamSectionContent->batch_exam_section_id                          = $request->batch_exam_section_id;
        self::$batchExamSectionContent->parent_id                                      = $request->parent_id;
        self::$batchExamSectionContent->content_type                                   = $request->content_type;
        self::$batchExamSectionContent->title                                          = $request->title;
        self::$batchExamSectionContent->available_at                                   = $request->available_at;
        self::$batchExamSectionContent->order                                          = isset($id) ? static::find($id)->order : (isset($lastRecord) ? $lastRecord->order+1 : 1);
        self::$batchExamSectionContent->available_at_timestamp                         = strtotime($request->available_at);

        self::$batchExamSectionContent->is_paid                                        = $request->is_paid == 'on' ? 1 : 0;
        self::$batchExamSectionContent->status                                         = $request->status == 'on' ? 1 : 0;
        if ($request->content_type == 'pdf')
        {
            self::$batchExamSectionContent->pdf_link                                   = $request->pdf_link;
            if ($request->pdf_select_form == 1)
            {
                self::$batchExamSectionContent->pdf_file                               = fileUpload($request->file('pdf_file'), 'batch-exam-section-content/pdf/', 'section-content', (isset($id) ? static::find($id)->pdf_file : ''));
            } elseif (!empty($request->pdf_store_url) && $request->pdf_select_form == 2)
            {
                self::$batchExamSectionContent->pdf_file                               = $request->pdf_store_url;
            }
        } elseif ($request->content_type == 'note')
        {
            self::$batchExamSectionContent->note_content                               = $request->note_content;
        } elseif ($request->content_type == 'exam')
        {
            self::$batchExamSectionContent->exam_mode  = $request->exam_mode;

            self::$batchExamSectionContent->exam_duration_in_minutes                   = $request->exam_duration_in_minutes;
            self::$batchExamSectionContent->exam_total_questions                       = $request->exam_total_questions;
            self::$batchExamSectionContent->exam_per_question_mark                     = $request->exam_per_question_mark;
            self::$batchExamSectionContent->exam_negative_mark                         = $request->exam_negative_mark;
            self::$batchExamSectionContent->exam_pass_mark                             = $request->exam_pass_mark;

            if ((self::$batchExamSectionContent->exam_mode == 'exam') || (self::$batchExamSectionContent->exam_mode == 'group') )
            {
                self::$batchExamSectionContent->exam_is_strict                         = $request->exam_is_strict == 'on' ? 1 : 0;
                self::$batchExamSectionContent->exam_start_time                        = $request->exam_start_time;
                self::$batchExamSectionContent->exam_start_time_timestamp              = strtotime($request->exam_start_time);
                self::$batchExamSectionContent->exam_end_time                          = $request->exam_end_time;
                self::$batchExamSectionContent->exam_end_time_timestamp                = strtotime($request->exam_end_time);
                self::$batchExamSectionContent->exam_result_publish_time               = $request->exam_result_publish_time;
                self::$batchExamSectionContent->exam_result_publish_time_timestamp     = strtotime($request->exam_result_publish_time);
            }
            if (self::$batchExamSectionContent->exam_mode == 'group')
            {
                self::$batchExamSectionContent->exam_total_subject                     = $request->exam_total_subject;
            }
        } elseif ($request->content_type == 'written_exam')
        {
            self::$batchExamSectionContent->written_exam_duration_in_minutes           = $request->written_exam_duration_in_minutes;
            self::$batchExamSectionContent->written_total_questions                    = $request->written_total_questions;
            self::$batchExamSectionContent->written_total_marks                    = $request->written_total_marks;
            self::$batchExamSectionContent->written_pass_mark                    = $request->written_pass_mark;
            self::$batchExamSectionContent->written_description                        = $request->written_description;
            self::$batchExamSectionContent->written_is_strict                          = $request->written_is_strict == 'on' ? 1 : 0;
            self::$batchExamSectionContent->written_start_time                         = $request->written_start_time;
            self::$batchExamSectionContent->written_start_time_timestamp               = strtotime($request->written_start_time);
            self::$batchExamSectionContent->written_end_time                           = $request->written_end_time;
            self::$batchExamSectionContent->written_end_time_timestamp                 = strtotime($request->written_end_time);
            self::$batchExamSectionContent->written_publish_time                       = $request->written_publish_time;
            self::$batchExamSectionContent->written_publish_time_timestamp             = strtotime($request->written_publish_time);
            self::$batchExamSectionContent->written_total_subject                      = $request->written_total_subject;
        }
        self::$batchExamSectionContent->save();
    }

    public static function importBatchExamSectionContentJson($batchExamSectionContents, $batchExamSectionId)
    {
        foreach ($batchExamSectionContents as $batchExamSectionContent)
        {
            self::$batchExamSectionContent                                             = new BatchExamSectionContent();

            self::$batchExamSectionContent->batch_exam_section_id                          = $batchExamSectionId;
            self::$batchExamSectionContent->parent_id                                      = $batchExamSectionContent->parent_id;
            self::$batchExamSectionContent->content_type                                   = $batchExamSectionContent->content_type;
            self::$batchExamSectionContent->title                                          = $batchExamSectionContent->title;
            self::$batchExamSectionContent->available_at                                   = $batchExamSectionContent->available_at;
            self::$batchExamSectionContent->available_at_timestamp                         = $batchExamSectionContent->available_at_timestamp;
            self::$batchExamSectionContent->is_paid                                        = $batchExamSectionContent->is_paid;
            self::$batchExamSectionContent->status                                         = $batchExamSectionContent->status;

            self::$batchExamSectionContent->pdf_link                                   = $batchExamSectionContent->pdf_link;

            self::$batchExamSectionContent->pdf_file                               = $batchExamSectionContent->pdf_file;

            self::$batchExamSectionContent->note_content                               = $batchExamSectionContent->note_content;

            self::$batchExamSectionContent->exam_mode                                   = $batchExamSectionContent->exam_mode;

            self::$batchExamSectionContent->exam_duration_in_minutes                   = $batchExamSectionContent->exam_duration_in_minutes;
            self::$batchExamSectionContent->exam_total_questions                       = $batchExamSectionContent->exam_total_questions;
            self::$batchExamSectionContent->exam_per_question_mark                     = $batchExamSectionContent->exam_per_question_mark;
            self::$batchExamSectionContent->exam_negative_mark                         = $batchExamSectionContent->exam_negative_mark;
            self::$batchExamSectionContent->exam_pass_mark                             = $batchExamSectionContent->exam_pass_mark;

            self::$batchExamSectionContent->exam_is_strict                         = $batchExamSectionContent->exam_is_strict == 'on' ? 1 : 0;
            self::$batchExamSectionContent->exam_start_time                        = $batchExamSectionContent->exam_start_time;
            self::$batchExamSectionContent->exam_start_time_timestamp              = $batchExamSectionContent->exam_start_time_timestamp;
            self::$batchExamSectionContent->exam_end_time                          = $batchExamSectionContent->exam_end_time;
            self::$batchExamSectionContent->exam_end_time_timestamp                = $batchExamSectionContent->exam_end_time_timestamp;
            self::$batchExamSectionContent->exam_result_publish_time               = $batchExamSectionContent->exam_result_publish_time;
            self::$batchExamSectionContent->exam_result_publish_time_timestamp     = $batchExamSectionContent->exam_result_publish_time_timestamp;

            self::$batchExamSectionContent->exam_total_subject                     = $batchExamSectionContent->exam_total_subject;

            self::$batchExamSectionContent->written_exam_duration_in_minutes           = $batchExamSectionContent->written_exam_duration_in_minutes;
            self::$batchExamSectionContent->written_total_questions                    = $batchExamSectionContent->written_total_questions;
            self::$batchExamSectionContent->written_total_marks                    = $batchExamSectionContent->written_total_marks;
            self::$batchExamSectionContent->written_pass_mark                    = $batchExamSectionContent->written_pass_mark;
            self::$batchExamSectionContent->written_description                        = $batchExamSectionContent->written_description;
            self::$batchExamSectionContent->written_is_strict                          = $batchExamSectionContent->written_is_strict;
            self::$batchExamSectionContent->written_start_time                         = $batchExamSectionContent->written_start_time;
            self::$batchExamSectionContent->written_start_time_timestamp               = $batchExamSectionContent->written_start_time_timestamp;
            self::$batchExamSectionContent->written_end_time                           = $batchExamSectionContent->written_end_time;
            self::$batchExamSectionContent->written_end_time_timestamp                 = $batchExamSectionContent->written_end_time_timestamp;
            self::$batchExamSectionContent->written_publish_time                       = $batchExamSectionContent->written_publish_time;
            self::$batchExamSectionContent->written_publish_time_timestamp             = $batchExamSectionContent->written_publish_time_timestamp;
            self::$batchExamSectionContent->written_total_subject                      = $batchExamSectionContent->written_total_subject;
            self::$batchExamSectionContent->order                                      = $batchExamSectionContent->order;

            self::$batchExamSectionContent->save();
        }
    }

    public function batchExamSection()
    {
        return $this->belongsTo(BatchExamSection::class);
    }

    public function batchExamSectionContent()
    {
        return $this->belongsTo(
            BatchExamSectionContent::class,
            'parent_id',
            'status'
        );
    }

    public function batchExamSectionContents()
    {
        return $this->hasMany(
            BatchExamSectionContent::class,
            'parent_id',
            'status'
        );
    }

    public function batchExamResults()
    {
        return $this->hasMany(BatchExamResult::class);
    }

    public function questionStores()
    {
        return $this->belongsToMany(QuestionStore::class);
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function contactMessages()
    {
        return $this->hasMany(ContactMessage::class, 'parent_model_id')->where('type', 'batch_exam_content');
    }
}
