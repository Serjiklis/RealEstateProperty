<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;

class RoleController extends Controller
{
//    CRUD Permission Methods
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }//End Method

    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    }//End Method

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
    }//End Method

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }//End Method

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
    }//End Method

    public function DeletePermission($id)
    {
        $type=Permission::findOrFail($id);
        $type->delete();

        $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }//End Method

//    Import and Export Method
    public function ImportPermission()
    {
        return view('backend.pages.permission.import_permission');
    }//End Method

    public function Import(Request $request)
    {
        Excel::import(new PermissionImport(), $request->file('import_file'));

        $notification = [
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.permission')->with($notification);
    }//End Method

    public function ExportPermission()
    {
      return Excel::download(new PermissionExport(),'permissions.xlsx' );
    }//End Method

//    Role All Method
    public function AllRoles()
    {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }//End Method

    public function AddRoles()
    {
        return view('backend.pages.roles.add_roles');
    }

    public function StoreRoles(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Role Create Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRole($id)
    {
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_role',compact('role'));
    }

    public function UpdateRole(Request $request)
    {
        $role_id = $request->id;
       Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Role Update Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles')->with($notification);
    }//End Method

    public function DeleteRole($id)
    {
        $role=Role::findOrFail($id);
        $role->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }//End Method

    //Add Role Permission all Method
    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permission = Permission::all();
        $permission_groups = User::getParmissionGroup();
        return view('backend.pages.rolesetup.add_roles_permission',
                    compact('roles', 'permission', 'permission_groups'));
    }

    public function RolePermissionStore(Request $request)
    {
        $data = [];
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }


        $notification = [
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));
    }

    public function AdminEditRoles($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        $permission_groups = User::getParmissionGroup();
        return view('backend.pages.rolesetup.edit_roles_permission',
            compact('role', 'permission', 'permission_groups'));
    }

    public function AdminRolesUpdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permission = $request->permission;

        if(!empty($permission)){
            $role->syncPermissions($permission);
        }

        $notification = [
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }

}
