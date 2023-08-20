<?php

namespace App\Http\Controllers\Backend\AdditionalFeatureManagement\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Backend\Gallery\Gallery;
use App\Models\Backend\Gallery\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $gallery;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.additional-features-management.gallery.index', ['galleries' => Gallery::latest()->get()]);
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
        $request->validate(['title' => 'required']);
        Gallery::createOrUpdateGallery($request);
        if ($request->ajax())
        {
            return response()->json('Gallery Created Successfully.');
        }else{
            return back()->with('success', 'Gallery Created Successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Gallery::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(Gallery::find($id));
//        return view('backend.additional-features-management.advertisement.edit', ['advertisement' => Advertisement::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['title' => 'required']);
        Gallery::createOrUpdateGallery($request, $id);
        return back()->with('success', 'Gallery Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->gallery = Gallery::find($id);
        if (file_exists($this->gallery->banner))
        {
            unlink($this->gallery->image);
        }
        $this->gallery->delete();
        return back()->with('success', 'Gallery Deleted Successfully.');
    }

    public function addImages (Request $request)
    {
        $request->validate(['images' => 'required']);
        try {
            GalleryImage::addGalleryImages($request);
            return back()->with('success', 'Gallery Images Added Successfully.');
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
    }

    public function getImages ($galleryId)
    {
        return view('backend.additional-features-management.gallery.get-images', ['galleryImages' => Gallery::find($galleryId)->galleryImages]);
    }

    public function deleteImage ($galleryImageId)
    {
        $galleryImage = GalleryImage::find($galleryImageId);
        $galleryId = $galleryImage->gallery->id;
        if (file_exists($galleryImage->banner))
        {
            unlink($galleryImage->banner);
        }
        $galleryImage->delete();
        return view('backend.additional-features-management.gallery.get-images', ['galleryImages' => Gallery::find($galleryId)->galleryImages]);
    }
}
