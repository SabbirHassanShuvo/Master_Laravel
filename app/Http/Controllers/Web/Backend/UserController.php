<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Helpers\Helper;

class UserController extends Controller
{
    public function userList()
    {
        return view('backend.layouts.user.index');
    }

    public function getUsers(Request $request)
    {
        $users = User::query();

        return DataTables::of($users)
            ->addColumn('action', function($row){
                $editUrl = route('user.edit', $row->id);
                $deleteUrl = route('user.delete', $row->id);
                return '<a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a> 
                        <button data-url="'.$deleteUrl.'" class="btn btn-sm btn-danger btn-delete">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function createUser()
    {
        return view('backend.layouts.user.form');
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

        return redirect()->route('createUser')->with('success', 'User created successfully!');
    }

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.layouts.user.edit', compact('user'));
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
