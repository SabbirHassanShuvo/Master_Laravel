<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
      public function edit()
    {
        $user = auth()->user();
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

        // Update basic info
        $user->name = $validated['name'] ?? $user->name;
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? $user->phone;

        // Update Photo
        if ($request->hasFile('photo')) {

            // Delete old image
            if ($user->photo && file_exists(public_path('uploads/users/' . $user->photo))) {
                unlink(public_path('uploads/users/' . $user->photo));
            }

            // Upload new
            $user->photo = Helper::handlePhoto($request, 'photo', 'uploads/users');
        }

        // Update Password
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('settings.profile.edit')->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'          => 'required',
            'new_password'              => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Current password check
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }


}
