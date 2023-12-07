<?php

namespace App\Models\Backend\BatchExamManagement;

use App\Models\Backend\AdditionalFeatureManagement\Affiliation\AffiliationHistory;
use App\Models\Backend\AdditionalFeatureManagement\SiteSeo;
use App\Models\Backend\ExamManagement\ExamResult;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use App\Models\Frontend\AdditionalFeature\ContactMessage;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatchExam extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'slug',
        'sub_title',
        'price',
        'banner',
        'description',
        'featured_video_url',
        'package_duration_in_days',
        'discount_type',
        'discount_amount',
        'discount_start_date',
        'discount_start_date_timestamp',
        'discount_end_date',
        'discount_end_date_timestamp',
        'is_paid',
        'is_featured',
        'is_approved',
        'status',
        'affiliate_amount',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'batch_exams';

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($batchExam){
            if (!empty($batchExam->batchExamRoutines))
            {
                $batchExam->batchExamRoutines->each->delete();
            }
            if (!empty($batchExam->batchExamSections))
            {
                $batchExam->batchExamSections->each->delete();
            }
            if (!empty($batchExam->parentOrders))
            {
                $batchExam->parentOrders->each->delete();
            }
//            if (!empty($batchExam->examResults))
//            {
//                $batchExam->examResults->each->delete();
//            }
            if (!empty($batchExam->teachers))
            {
                $batchExam->teachers()->detach();
            }
            if (!empty($batchExam->students))
            {
                $batchExam->students()->detach();
            }
            if (count($batchExam->batchExamSubscriptions) > 0)
            {
                $batchExam->batchExamSubscriptions->each->delete();
            }
            if (count($batchExam->contactMessages) > 0)
            {
                $batchExam->contactMessages->each->delete();
            }
            if (count($batchExam->parentComments) > 0)
            {
                $batchExam->parentComments->each->delete();
            }
            if (count($batchExam->siteSeos) > 0)
            {
                $batchExam->siteSeos->each->delete();
            }
            if (count($batchExam->affiliationHistories) > 0)
            {
                $batchExam->affiliationHistories->each->delete();
            }
            if (!empty($batchExam->batchExamCategories))
            {
                $batchExam->batchExamCategories()->detach();
            }
            if (file_exists($batchExam->image))
            {
                unlink($batchExam->image);
            }
        });
    }

    protected static $batchExam;

    public static function createOrUpdateCourse ($request, $id = null)
    {
        if (isset($id))
        {
            self::$batchExam = BatchExam::find($id);
        } else {
            self::$batchExam = new BatchExam();
        }
        self::$batchExam->title                    = $request->title;
        self::$batchExam->slug                     = str_replace(' ', '-', $request->title);
        self::$batchExam->sub_title                = $request->sub_title;
//        self::$batchExam->price                    = $request->price;
        self::$batchExam->banner                   = isset($id) ? imageUpload($request->file('banner'), 'batch-exam/batch-exam-banners/', 'batch-exams', '1000', '600', static::find($id)->banner) : imageUpload($request->file('banner'), 'batch-exam/batch-exam-banners/', 'batch-exams', '1000', '600');
        self::$batchExam->description              = $request->description;
//        self::$batchExam->package_duration_in_days = $request->package_duration_in_days;
//        self::$batchExam->discount_type            = $request->discount_type;
//        self::$batchExam->discount_amount          = $request->discount_amount;
//        self::$batchExam->discount_start_date      = $request->discount_start_date;
//        self::$batchExam->discount_start_date_timestamp   = strtotime($request->discount_start_date);
//        self::$batchExam->discount_end_date        = $request->discount_end_date;
//        self::$batchExam->discount_end_date_timestamp     = strtotime($request->discount_end_date);
        if (!empty($request->featured_video_url))
        {
            $vidUrlString = explode('https://youtu.be/', $request->featured_video_url)[1];
        }
        self::$batchExam->featured_video_url       = isset($vidUrlString) ? $vidUrlString : (isset($id) ? self::$batchExam->featured_video_url : null);
//        self::$batchExam->featured_video_vendor    = $request->featured_video_vendor;
        self::$batchExam->status                   = $request->status == 'on' ? 1 : 0;
        self::$batchExam->is_paid                  = $request->is_paid == 'on' ? 1 : 0;
        self::$batchExam->is_approved              = $request->is_approved == 'on' ? 1 : 0;
        self::$batchExam->is_featured              = $request->is_featured == 'on' ? 1 : 0;
        self::$batchExam->is_master_exam           = empty(static::first()) || $id == 1 ? 1 : 0;
        self::$batchExam->affiliate_amount         = $request->affiliate_amount;
        self::$batchExam->save();

//        self::$batchExam->teachers()->sync($request->teachers_id);

        if (empty(static::first()) || $id != 1)
        {
            self::$batchExam->batchExamCategories()->sync(explode(',', $request->batch_exam_categories[0]));
        }
        return self::$batchExam;
    }

    public static function importBatchExamJson($request)
    {
        self::$batchExam                            = new BatchExam();
        self::$batchExam->title                    = $request->title;
        self::$batchExam->slug                     = $request->slug;
        self::$batchExam->sub_title                = $request->sub_title;
        self::$batchExam->banner                   = $request->banner;
        self::$batchExam->description              = $request->description;
        self::$batchExam->featured_video_url       = $request->featured_video_url;
        self::$batchExam->status                   = $request->status;
        self::$batchExam->is_paid                  = $request->is_paid;
        self::$batchExam->is_approved              = $request->is_approved;
        self::$batchExam->is_featured              = $request->is_featured;
        self::$batchExam->is_master_exam           = $request->is_master_exam;
        self::$batchExam->save();
        return self::$batchExam;
    }

    public function batchExamRoutines()
    {
        return $this->hasMany(BatchExamRoutine::class);
    }

    public function batchExamSections()
    {
        return $this->hasMany(BatchExamSection::class);
    }

    public function parentOrders()
    {
        return $this->hasMany(ParentOrder::class, 'parent_model_id')->where('ordered_for', 'batch_exam');
    }

    public function batchExamCategories()
    {
        return $this->belongsToMany(BatchExamCategory::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function batchExamSubscriptions()
    {
        return $this->hasMany(BatchExamSubscription::class);
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function contactMessages()
    {
        return $this->hasMany(ContactMessage::class, 'parent_model_id')->where('type', 'batch_exam');
    }

    public function parentComments()
    {
        return $this->hasMany(ParentComment::class, 'parent_model_id');
    }

    public function siteSeos()
    {
        return $this->hasMany(SiteSeo::class, 'parent_model_id')->where('model_type', 'batch_exam');
    }

    public function affiliationHistories()
    {
        return $this->hasMany(AffiliationHistory::class, 'model_id')->where('model_type', 'batch_exam');
    }
}
