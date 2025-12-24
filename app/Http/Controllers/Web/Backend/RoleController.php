<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        // user must be logged in
        $this->middleware('auth');

        // permission-based protection (uncomment when permissions are seeded)
        $this->middleware('permission:roles.view')->only(['index']);
        $this->middleware('permission:roles.create')->only(['create', 'store']);
        $this->middleware('permission:roles.edit')->only(['edit', 'update']);
        $this->middleware('permission:roles.delete')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('backend.layouts.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('backend.layouts.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|unique:roles,name',
            'permissions'   => 'nullable|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->filled('permissions')) {
            // permissions[] contains permission names
            $role->syncPermissions($request->permissions);
        }

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role        = Role::findOrFail($id);
        $permissions = Permission::all();

        // use permission NAMES so it matches the checkboxes value + validation
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('backend.layouts.roles.edit', [
            'role'            => $role,
            'permissions'     => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|unique:roles,name,' . $role->id,
            'permissions'   => 'nullable|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $role->name = $request->name;
        $role->save();

        if ($request->filled('permissions')) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]); // remove all if none selected
        }

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if (strtolower($role->name) === 'admin') {
            return redirect()
                ->route('roles.index')
                ->with('error', 'Cannot delete the admin role.');
        }

        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role deleted successfully.');
    }
}
