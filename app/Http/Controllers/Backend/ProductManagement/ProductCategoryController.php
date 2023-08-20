<?php

namespace App\Http\Controllers\Backend\ProductManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductManagement\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $productCategory;
    public function index()
    {
        return view('backend.product-management.product-category.index', [
            'productCategories'    => ProductCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request;
        $request->validate([
            'name'  => 'required',
            'image' => 'image',
        ]);
        ProductCategory::saveOrUpdateProductCategory($request);
        return back()->with('success', 'Product Category Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(ProductCategory::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required',
            'image' => 'image',
        ]);
        ProductCategory::saveOrUpdateProductCategory($request, $id);
        return back()->with('success', 'Product Category Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productCategory = ProductCategory::find($id);
        if (file_exists($this->productCategory->image))
        {
            unlink($this->productCategory->image);
        }
        $this->productCategory->delete();
        return back()->with('success', 'product Category Deleted Successfully.');
    }
}
