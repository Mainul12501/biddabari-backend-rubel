<?php

namespace App\Http\Controllers\Backend\PdfManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\PdfManagement\PdfStoreCategory;
use App\Models\Backend\PdfManagement\PdfStore;
use Illuminate\Http\Request;

class PdfStoreController extends Controller
{
    protected $pdfStore;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pdf-management.pdf-store.index', [
            'pdfStoreCategories'    => PdfStoreCategory::whereStatus(1)->select('id', 'title', 'parent_id')->whereParentId(0)->get(),
            'pdfStores'             => PdfStore::all(),
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
            'title' => 'required',
            'pdf_store_category_id' => 'required',
            'file' => 'required',
        ]);
        PdfStore::saveOrUpdatePdfStore($request);
        if ($request->ajax())
        {
            return response()->json('Pdf Created Successfully.');
        }
        return back()->with('success', 'Pdf Created Successfully.');
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
        return view('backend.pdf-management.pdf-store.edit', [
            'pdfStoreCategories'    => PdfStoreCategory::whereStatus(1)->select('id', 'title')->get(),
            'pdfStore'             => PdfStore::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'pdf_store_category_id' => 'required',
        ]);
        PdfStore::saveOrUpdatePdfStore($request, $id);
        if ($request->ajax())
        {
            return response()->json('Pdf Created Successfully.');
        }
        return back()->with('success', 'Pdf Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->blog = PdfStore::find($id)->delete();
        return back()->with('success', 'Pdf Deleted Successfully.');
    }

    public function getPdfStoreFile($id)
    {
        return response()->json(PdfStore::find($id));
    }
}
