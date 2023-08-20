<?php

namespace App\Http\Controllers\Backend\NoticeManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\NoticeManagement\NoticeCategory;
use Illuminate\Http\Request;

class NoticeCategoryController extends Controller
{
    protected $noticeCategory, $noticeSubCategories;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.notice-management.notice-category.index', ['noticeCategories' => NoticeCategory::orderBy('name', 'asc')->whereNoticeCategoryId(0)->get()]);
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
            'name' => 'required',
            'image' => 'image'
        ]);
        NoticeCategory::createOrUpdateNoticeCategory($request);
        return back()->with('success', 'Notice Category Created Successfully.');
    }

    public function addSubCategory($id)
    {
        return view('backend.notice-management.notice-category.child-category', ['noticeCategory' => NoticeCategory::find($id)]);
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
        return view('backend.notice-management.notice-category.edit', ['noticeCategory' => NoticeCategory::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image'
        ]);
        NoticeCategory::createOrUpdateNoticeCategory($request, $id);
        return back()->with('success', 'Notice Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->noticeCategory       = NoticeCategory::find($id)->delete();
        return back()->with('success', 'Notice Category Deleted Successfully.');
    }
}
