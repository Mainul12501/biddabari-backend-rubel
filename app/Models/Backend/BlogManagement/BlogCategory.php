<?php

namespace App\Models\Backend\BlogManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['parent_id', 'name', 'image', 'order', 'slug', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'blog_categories';

    protected static $blogCategory;

    public static function saveOrUpdateBlogCategory ($request, $id = null)
    {
        BlogCategory::updateOrCreate(['id' => $id], [
            'parent_id' => !empty($request->parent_id) ? $request->parent_id : (isset($id) ? static::find($id)->parent_id :  0),
            'name'      => $request->name,
            'slug'      => str_replace(' ', '-', $request->name),
            'image'     => imageUpload($request->file('image'), 'blog-management/blog-categories/', 'blog-category', '400', '400', (isset($id) ? BlogCategory::find($id)->image : null)),
            'order'     => !empty($request->order) ? $request->order : 1,
            'status'    => $request->status == 'on' ? 1 : 0
        ]);
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    public function blogCategories()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
