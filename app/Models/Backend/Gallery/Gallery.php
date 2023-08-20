<?php

namespace App\Models\Backend\Gallery;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'sub_title',
        'banner',
        'description',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $gallery;

    public static function createOrUpdateGallery($request, $id = null)
    {
        Gallery::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'banner'    => imageUpload($request->file('banner'), 'gallery/gallery/', 'gallery-', 600, 600, isset($id) ? static::find($id)->banner : null),
            'description'   => $request->description,
            'status'    => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
