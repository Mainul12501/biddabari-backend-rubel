<?php

namespace App\Http\Controllers\Backend\RolePermissionManagement\Permission;

use App\Http\Controllers\Controller;
use App\Models\Backend\RoleManagement\Permission;
use App\Models\Backend\RoleManagement\PermissionCategory;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //    permission seed done
    private $permissionRoles, $permission, $permissions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.role-management.permissions.index', [
            'permissions'   => Permission::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.role-management.permissions.create', [
            'permissionCategories'    => PermissionCategory::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permission::updateOrCreatePermission($request);
        return back()->with('success', 'Permission created successfully.');
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
        return view('backend.role-management.permissions.create', [
            'permissionCategories'    => PermissionCategory::where('status', 1)->get(),
            'permission'              => Permission::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Permission::updateOrCreatePermission($request, $id);
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->permission = Permission::find($id);
//        if (!empty($this->permission->roles))
//        {
//            echo 'has permission';
//        }
        if ($this->permission->is_default == 1)
        {
            return back()->with('customError', 'Default Role can not be deleted. Please contact your developer for help');
        }
        $this->permission->delete();
        return back()->with('success', 'Permission deleted successfully.');
    }
}
