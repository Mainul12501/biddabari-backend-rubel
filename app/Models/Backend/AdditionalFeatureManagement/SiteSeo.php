<?php

namespace App\Models\Backend\AdditionalFeatureManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSeo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'model_type',
        'parent_model_id',
        'header_code',
        'footer_code',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'site_seos';

    public function course()
    {
        return $this->belongsTo(Course::class, 'parent_model_id');
    }

    public function batchExam()
    {
        return $this->belongsTo(BatchExam::class, 'parent_model_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'parent_model_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'parent_model_id');
    }

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'parent_model_id');
    }

    public function batchExamCategory()
    {
        return $this->belongsTo(BatchExamCategory::class, 'parent_model_id');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_model_id');
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_model_id');
    }
}
