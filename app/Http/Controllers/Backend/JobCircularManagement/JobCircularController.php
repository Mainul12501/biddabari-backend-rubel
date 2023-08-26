<?php

namespace App\Http\Controllers\Backend\JobCircularManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\CircularManagement\Circular;
use App\Models\Backend\CircularManagement\CircularCategory;
use Illuminate\Http\Request;

class JobCircularController extends Controller
{
    protected $circular;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.circular-management.circulars.index', [
            'circularCategories'    => CircularCategory::whereStatus(1)->where('parent_id', 0)->get(),
            'circulars'             => Circular::all(),
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
        Circular::saveOrUpdateCircular($request);
        return back()->with('success', 'Circular Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.circular-management.circulars.show', [
            'circularCategories'    => CircularCategory::whereStatus(1)->get(),
            'circular'             => Circular::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.circular-management.circulars.edit', [
            'circularCategories'    => CircularCategory::whereStatus(1)->where('parent_id', 0)->get(),
            'circular'             => Circular::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Circular::saveOrUpdateCircular($request, $id);
        return back()->with('success', 'Circular Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->circular = Circular::find($id);
        if (file_exists($this->circular->image))
        {
            unlink($this->circular->image);
        }
        $this->circular->delete();
        return back()->with('success', 'Circular Deleted Successfully.');
    }
}
