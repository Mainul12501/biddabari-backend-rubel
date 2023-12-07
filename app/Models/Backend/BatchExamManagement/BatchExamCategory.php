<?php

namespace App\Models\Backend\BatchExamManagement;

use App\Models\Backend\AdditionalFeatureManagement\SiteSeo;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatchExamCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'parent_id',
        'note',
        'image',
        'slug',
        'order',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'batch_exam_categories';

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function ($batchExamCategory){
            if (!empty($batchExamCategory->batchExams))
            {
                $batchExamCategory->batchExams()->detach();
            }
            if (!empty($batchExamCategory->siteSeos))
            {
                $batchExamCategory->siteSeos->each->delete();
            }
        });
    }

    public static function createOrUpdateCourseCategory($request, $id = null)
    {
        BatchExamCategory::updateOrCreate(['id' => $id], [
            'name'          => $request->name,
            'parent_id'     => !empty($request->parent_id) ? $request->parent_id : (isset($id) ? static::find($id)->parent_id :  0),
            'note'          => $request->note,
            'image'         => isset($id) ? imageUpload($request->file('image'), 'batch-exam/batch-exam-category-images/', 'batch-exam-category', '300', '300', static::find($id)->image) : imageUpload($request->file('image'), 'batch-exam/batch-exam-category-images/', 'batch-exam-category', '300', '300'),
            'slug'          => str_replace(' ', '-', $request->name),
            'order'         => isset($id) ? static::find($id)->order : 1,
            'status'        => $request->status == 'on' ? 1 : 0,
        ]);

    }

    public function batchExamCategory()
    {
        return $this->belongsTo(BatchExamCategory::class, 'parent_id');
    }

    public function batchExamCategories()
    {
        return $this->hasMany(BatchExamCategory::class, 'parent_id');
    }

    public function batchExams()
    {
        return $this->belongsToMany(BatchExam::class);
    }
    public function batchExamsDescOrder()
    {
        return $this->belongsToMany(BatchExam::class)->orderBy('id', 'DESC');
    }

    public function siteSeos()
    {
        return $this->hasMany(SiteSeo::class, 'parent_model_id')->where('model_type', 'batch_exam_category');
    }
}
