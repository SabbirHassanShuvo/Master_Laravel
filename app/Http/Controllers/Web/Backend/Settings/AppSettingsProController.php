<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Models\AppSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppSettingsProController extends Controller
{
     public function edit()
        {
            $setting = AppSetting::first() ?? new AppSetting();
            return view('backend.layouts.settings.appSetting', compact('setting'));
        }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'theme' => 'required|string|in:light,dark',
            'push_notification' => 'required|boolean',
            'app_version' => 'nullable|string|max:50',
        ]);

        $setting = AppSetting::first() ?? new AppSetting();

        $setting->theme = $validated['theme'];
        $setting->push_notification = $validated['push_notification'];
        $setting->app_version = $validated['app_version'] ?? null;

        $setting->save();

        return redirect()->back()->with('success', 'App Setting updated successfully');
    }
}