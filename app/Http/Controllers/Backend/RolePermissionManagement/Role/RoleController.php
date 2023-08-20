<?php

namespace App\Http\Controllers\Backend\RolePermissionManagement\Role;

use App\Http\Controllers\Controller;
use App\Models\Backend\RoleManagement\Permission;
use App\Models\Backend\RoleManagement\PermissionCategory;
use App\Models\Backend\RoleManagement\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public $role;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.role-management.role.index',[
            'roles'   => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role-management.role.create',[
            'permissionCategories'  => PermissionCategory::whereStatus(1)->with('permissions')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::saveData($request);
        return back()->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.role-management.role.create',[
            'role'          => Role::findOrFail($id),
            'permissionCategories'  => PermissionCategory::where('status', 1)->with('permissions')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->role = Role::updateOrCreate(['id' => $id],[
            'title' => $request->title,
            'note' => $request->note,
            'slug' => str_replace(' ','-', Str::lower($request->title)),
            'status'    => $request->status == 'on' ? 1 : 0,
        ]);
        $this->role->permissions()->sync($request->permissions);
        return redirect(route('roles.index'))->with('success', 'Role Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->role = Role::find($id);
        if ($this->role->is_default == 1)
        {
            return back()->with('customError', 'Default Role can not be deleted. Please contact your developer for help');
        }
        $this->role->permissions()->detach();
        $this->role->delete();
        return back()->with('success', 'Role Deleted Successfully.');
    }
}
