<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Helper;

class ProfileController extends Controller
{
      public function edit()
    {
        $user = auth()->user();
        // dd($user);
        return view('backend.layouts.settings.profilesetting', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? $user->phone;

        if ($request->hasFile('photo')) {
            if ($user->photo && file_exists(public_path('uploads/users/' . $user->photo))) {
                unlink(public_path('uploads/users/' . $user->photo));
            }
            $user->photo = Helper::handlePhoto($request, 'photo', 'uploads/users');
        }

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('settings.profile.edit')->with('success', 'Profile updated successfully!');
    }

}
