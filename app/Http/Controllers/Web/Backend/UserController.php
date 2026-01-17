<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function userList()
    {
        return view('backend.layouts.user.index');
    }

    public function getUsers(Request $request)
    {
        $users = User::with('roles')->select('users.*');
        $start = (int) $request->input('start', 0);

        return DataTables::of($users)
            ->addColumn('sl_no', function($row) use ($request) {
                static $counter = 0;
                $start = (int) $request->input('start', 0);
                $counter++;
                return $start + $counter;
            })
            ->addColumn('role', function($row) {
                $role = $row->roles->first();
                return $role ? $role->name : '<span class="text-muted">-</span>';
            })
            ->addColumn('action', function($row){
                $editUrl = route('user.edit', $row->id);
                $deleteUrl = route('user.delete', $row->id);
                return '<div class="btn-group btn-group-sm" role="group">
                            <a href="'.$editUrl.'" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Edit User">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button data-url="'.$deleteUrl.'" class="btn btn-outline-danger btn-delete" data-bs-toggle="tooltip" title="Delete User">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>';
            })
            ->rawColumns(['action', 'role'])
            ->make(true);
    }

    public function createUser()
    {
        $roles = Role::all();
        return view('backend.layouts.user.form', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
            'role' => 'nullable|exists:roles,id',
        ]);

        // User create
        $user = new User();
        $user->name = $validated['name'] ?? null;
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->phone = $validated['phone'] ?? null;

         // Photo handle using class-based helper
        $user->photo = Helper::handlePhoto($request, 'photo', 'uploads/users');

        $user->save();

        // Assign role if provided
        if ($request->filled('role')) {
            $role = Role::find($request->role);
            if ($role) {
                $user->assignRole($role);
            }
        }

        return redirect()->route('createUser')->with('success', 'User created successfully!');
    }

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRole = $user->roles->first(); // Get first role (assuming user has one role)
        return view('backend.layouts.user.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validation
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
            'role' => 'nullable|exists:roles,id',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? $user->phone;

        // Photo update with old image deletion
        if ($request->hasFile('photo')) {
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
            $user->photo = Helper::handlePhoto($request, 'photo', 'uploads/users');
        }

        $user->save();

        // Update role if provided
        if ($request->filled('role')) {
            $role = Role::find($request->role);
            if ($role) {
                // Remove all existing roles and assign new one
                $user->syncRoles([$role]);
            }
        } else {
            // If no role selected, remove all roles
            $user->syncRoles([]);
        }

        return redirect()->route('user.edit', $user->id)
                        ->with('success', 'User updated successfully!');
    }



    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Delete user photo from storage if exists
        if ($user->photo && file_exists(public_path($user->photo))) {
            unlink(public_path($user->photo));
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

}
