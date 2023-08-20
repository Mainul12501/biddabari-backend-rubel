<?php

namespace App\Http\Controllers\Backend\AdditionalFeatureManagement\PopupNotification;

use App\Http\Controllers\Controller;
use App\Models\Backend\AdditionalFeatureManagement\PopupNotification;
use Illuminate\Http\Request;

class PopupNotificationsController extends Controller
{
    protected $popupNotification;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.additional-features-management.popup-notifications.index', [
            'popupNotifications'    => PopupNotification::all(),
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
        PopupNotification::saveOrUpdatePopupNotification($request);
        return back()->with('success', 'Popup Notification Created Successfully.');
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
        return response()->json(PopupNotification::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        PopupNotification::saveOrUpdatePopupNotification($request, $id);
        return back()->with('success', 'Popup Notification Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->popupNotification = PopupNotification::find($id);
        if (file_exists($this->popupNotification->image))
        {
            unlink($this->popupNotification->image);
        }
        $this->popupNotification->delete();
        return back()->with('success', 'Popup Notification Deleted Successfully.');
    }
}
