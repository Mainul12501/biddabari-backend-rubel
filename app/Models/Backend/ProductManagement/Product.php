<?php

namespace App\Models\Backend\ProductManagement;

use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_author_id',
        'title',
        'image',
        'featured_pdf',
        'price',
        'discount_amount',
        'discount_duration',
        'about',
        'description',
        'specification',
        'other_details',
        'stock_amount',
        'slug',
        'is_featured',
        'status',
        'discount_type',
        'discount_start_date',
        'discount_start_date_timestamp',
        'discount_end_date',
        'discount_end_date_timestamp',
    ];

    protected $searchableFields = ['*'];

    public static function saveOrUpdateProduct($request, $id = null){
        return Product::updateOrCreate(['id' => $id], [
//            'product_category_id'   => $request->product_category_id,
            'product_author_id'     => $request->product_author_id,
            'title'                 => $request->title,
            'slug'                  => str_replace(' ', '-', $request->title),
            'image'                 => imageUpload($request->file('image'), 'product-management/product/', 'product-category', '400', '400', (isset($id) ? Product::find($id)->image : null)),
            'featured_pdf'          => fileUpload($request->file('featured_pdf'), 'product-management/product-pdf', 'product-pdf', (isset($id) ? Product::find($id)->featured_pdf : null)),
            'price'                 => $request->price,
            'discount_type'         => $request->discount_type,
            'discount_amount'       => $request->discount_amount,
            'discount_start_date'   => $request->discount_start_date,
            'discount_start_date_timestamp'       => strtotime($request->discount_start_date),
            'discount_end_date'     => $request->discount_end_date,
            'discount_end_date_timestamp'       => strtotime($request->discount_end_date),
            'discount_duration'     => $request->discount_duration,
            'about'                 => $request->about,
            'description'           => $request->description,
            'specification'         => $request->specification,
            'other_details'         => $request->other_details,
            'stock_amount'          => $request->stock_amount,
            'is_featured'           => $request->is_featured == 'on' ? 1 : 0,
            'status'                => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function productAuthor()
    {
        return $this->belongsTo(ProductAuthor::class);
    }

    public function parentOrders()
    {
        return $this->hasMany(ParentOrder::class, 'parent_model_id');
    }

    public function productCategories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }
}
