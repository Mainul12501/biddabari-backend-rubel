<?php

namespace App\Models\Backend\CircularManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CircularCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'parent_id',
        'title',
        'image',
        'order',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'circular_categories';

    protected static $circularCategory;

    public static function saveOrUpdateCircularCategory ($request, $id = null)
    {
        CircularCategory::updateOrCreate(['id' => $id], [
            'parent_id' => !empty($request->parent_id) ? $request->parent_id : (isset($id) ? static::find($id)->parent_id :  0),
            'title'      => $request->title,
            'slug'      => str_replace(' ', '-', $request->title),
            'image'     => imageUpload($request->file('image'), 'circular-management/circular-categories/', 'circular-category', '400', '400', (isset($id) ? static::find($id)->image : null)),
            'order'     => !empty($request->order) ? $request->order : 1,
            'status'    => $request->status == 'on' ? 1 : 0
        ]);
    }

    public function circularCategory()
    {
        return $this->belongsTo(CircularCategory::class, 'parent_id');
    }

    public function circularCategories()
    {
        return $this->hasMany(CircularCategory::class, 'parent_id');
    }

    public function circulars()
    {
        return $this->hasMany(Circular::class);
    }
}
