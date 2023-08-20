<?php

namespace App\Models\Backend\ProductManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAuthor extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'image', 'description', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'product_authors';


    public static function saveOrUpdateProductAuthors ($request, $id = null)
    {
        ProductAuthor::updateOrCreate(['id' => $id], [
            'name'          => $request->name,
            'description'     => $request->description,
            'image'         => imageUpload($request->file('image'), 'product-management/product-authors/', 'product-authors', '400', '400', (isset($id) ? ProductAuthor::find($id)->image : null)),
            'status'        => $request->status == 'on' ? 1 : 0
        ]);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
