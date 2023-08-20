<?php

namespace App\Http\Controllers\Backend\BlogManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\BlogManagement\Blog;
use App\Models\Backend\BlogManagement\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blog;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.blog-management.blogs.index', [
            'blogCategories'    => BlogCategory::whereStatus(1)->get(),
            'blogs'             => Blog::all(),
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
            'blog_category_id' => 'required',
            'title' => 'required',
            'image' => 'image',
            'body'  => 'required',
        ]);
        Blog::saveOrUpdateBlog($request);
        return back()->with('success', 'Blog Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.blog-management.blogs.show', [
            'blogCategories'    => BlogCategory::whereStatus(1)->get(),
            'blog'             => Blog::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.blog-management.blogs.edit', [
            'blogCategories'    => BlogCategory::whereStatus(1)->get(),
            'blog'             => Blog::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'image' => 'image',
            'body'  => 'required',
        ]);
        Blog::saveOrUpdateBlog($request, $id);
        return back()->with('success', 'Blog Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->blog = Blog::find($id);
        if (file_exists($this->blog->image))
        {
            unlink($this->blog->image);
        }
        $this->blog->delete();
        return back()->with('success', 'Blog Deleted Successfully.');
    }
}
