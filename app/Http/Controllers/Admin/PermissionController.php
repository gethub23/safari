<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('dashboard.permissions.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.permissions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|min:2|max:190'
        ]);

        $role = new Role;
        $role->role = $request->role;
        $role->save();


        $permissions = $request->permissions ?? [];
        foreach ($permissions as $permission) {
            $per = new Permission();
            $per->permissions = $permission;
            $per->role_id = $role->id;
            $per->save();
        }


        return redirect(route('permissions_list'))->with('success', 'تم الحفظ');
    }

    public function edit($id)
    {
        $role = Role::with('Permissions')->findOrFail($id);
        return view('dashboard.permissions.update', compact('role', $role));
    }

    public function update(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $role->role = $request->role;
        $role->save();

        Permission::where('role_id', $request->id)->delete();
        $permissions = $request->permissions ?? [];
        foreach ($permissions as $per) {
            $permission = new Permission;
            $permission->permissions = $per;
            $permission->role_id = $role->id;
            $permission->save();
        }


        return redirect(route('permissions_list'))->with('success', 'تم حفظ التعديلات');
    }

    public function destroy(Request $request)
    {
        if ($request->id != 1 && Auth::user()->role != $request->id) {
            Role::findOrFail($request->id)->delete();
            return back()->with('success', 'تم الحذف بنجاح');
        } else
            return back()->with('danger', 'لا يمكن حذف هذه الصلاحيه ! ..... يمكنك تعديل الاسم فقط ');
    }
}
