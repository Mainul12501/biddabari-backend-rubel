<?php

namespace App\Http\Controllers\Backend\ProductManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductManagement\ProductAuthor;
use Illuminate\Http\Request;

class ProductAuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $productAuthor;
    public function index()
    {
        return view('backend.product-management.product-authors.index', [
            'productAuthors'    => ProductAuthor::all(),
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
        $request->validate([
            'name'  => 'required',
            'image' => 'image',
        ]);
        ProductAuthor::saveOrUpdateProductAuthors($request);
        return back()->with('success', 'Product Authors Created Successfully.');
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
        return response()->json(ProductAuthor::find($id));
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
        ProductAuthor::saveOrUpdateProductAuthors($request, $id);
        return back()->with('success', 'Product Authors Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productAuthor = ProductAuthor::find($id);
        if (file_exists($this->productAuthor->image))
        {
            unlink($this->productAuthor->image);
        }
        $this->productAuthor->delete();
        return back()->with('success', 'product Author Deleted Successfully.');
    }
}
