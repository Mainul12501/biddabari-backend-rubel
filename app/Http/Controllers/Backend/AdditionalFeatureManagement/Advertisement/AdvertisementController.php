<?php

namespace App\Http\Controllers\Backend\AdditionalFeatureManagement\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Backend\AdditionalFeatureManagement\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    protected $advertisement;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.additional-features-management.advertisement.index', ['advertisements' => Advertisement::all()]);
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
            'title' => 'required',
            'content_type'  => 'required',
            'link'  => 'required',
            'image' => 'image',
        ]);
        Advertisement::createOrUpdateAdvertisement($request);
        if ($request->ajax())
        {
            return response()->json('Advertisement Created Successfully.');
        }else{
            return back()->with('success', 'Advertisement Created Successfully.');
        }
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
        return view('backend.additional-features-management.advertisement.edit', ['advertisement' => Advertisement::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content_type'  => 'required',
            'link'  => 'required',
            'image' => 'image',
        ]);
        Advertisement::createOrUpdateAdvertisement($request, $id);
        return back()->with('success', 'Advertisement Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->advertisement = Advertisement::find($id);
        if (file_exists($this->advertisement->image))
        {
            unlink($this->advertisement->image);
        }
        $this->advertisement->delete();
        return back()->with('success', 'Advertisement Deleted Successfully.');
    }
}
