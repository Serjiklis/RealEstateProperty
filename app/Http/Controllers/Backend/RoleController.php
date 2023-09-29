<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }

    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,


        ]);

        $notification = [
            'message' => 'Permission Create Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }

    public function UpdatePermission(Request $request)
    {
        $per_id = $request->id;
        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,


        ]);

        $notification = [
            'message' => 'Permission Update Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id)
    {
        $type=Permission::findOrFail($id);
        $type->delete();

        $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
