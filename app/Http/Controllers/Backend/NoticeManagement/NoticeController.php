<?php

namespace App\Http\Controllers\Backend\NoticeManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\NoticeManagement\NoticeCategory;
use App\Models\Backend\NoticeManagement\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    protected $notice;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.notice-management.notice.index', [
            'noticeCategories'  => NoticeCategory::orderBy('name', 'asc')->where('status', 1)->get(),
            'notices'           => Notice::orderBy('id', 'desc')->get(),
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
            'notice_category_id'    => 'required',
            'type'                  => 'required',
            'title'                 => 'required',
            'image'                 => 'image'
        ]);
        Notice::createOrUpdateNotice($request);
        return back()->with('success', 'Notice Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.notice-management.notice.show', [
            'noticeCategories'  => NoticeCategory::orderBy('name', 'asc')->where('status', 1)->get(),
            'notice'            => Notice::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.notice-management.notice.edit', [
            'noticeCategories'  => NoticeCategory::orderBy('name', 'asc')->where('status', 1)->get(),
            'notice'            => Notice::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'notice_category_id'    => 'required',
            'type'                  => 'required',
            'title'                 => 'required',
            'image'                 => 'image'
        ]);
        Notice::createOrUpdateNotice($request, $id);
        return back()->with('success', 'Notice Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->notice = Notice::find($id);
        if (file_exists($this->notice->image))
        {
            unlink($this->notice->image);
        }
        $this->notice->delete();
        return back()->with('success', 'Notice Deleted Successfully');
    }
}
