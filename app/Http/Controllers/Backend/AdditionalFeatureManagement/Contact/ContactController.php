<?php

namespace App\Http\Controllers\Backend\AdditionalFeatureManagement\Contact;

use App\Http\Controllers\Controller;
use App\Models\Frontend\AdditionalFeature\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $contactMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.additional-features-management.contact.index', ['contacts' => ContactMessage::latest()->orderBy('is_seen', 'ASC')->get()]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->contactMessage = ContactMessage::find($id);
        if ($this->contactMessage->is_seen == 0)
        {
            $this->contactMessage->update(['is_seen' => 1]);
        } elseif ($this->contactMessage->is_seen == 1)
        {
            $this->contactMessage->update(['is_seen' => 0]);
        }
        return response()->json($this->contactMessage);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ContactMessage::find($id)->delete();
        return back()->with('success', 'Contact Info Deleted successfully.');
    }
}
