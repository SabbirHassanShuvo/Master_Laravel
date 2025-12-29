<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Models\WebSetting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class WebSettingController extends Controller
{

    public function edit()
    {
        $setting = WebSetting::firstOrCreate([]);

        return view('backend.layouts.settings.webSetting', compact('setting'));
    }


    public function update(Request $request)
    {
        $setting = WebSetting::firstOrCreate([]);

        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'seo_meta_title' => 'nullable|string|max:255',
            'seo_meta_description' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'social_links' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            'favicon' => 'nullable|image|mimes:ico,png'
        ]);

        $setting->fill($validated);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/websetting';
            $file->move(public_path($path), $filename);
            $setting->logo = $path . '/' . $filename;
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/websetting';
            $file->move(public_path($path), $filename);
            $setting->favicon = $path . '/' . $filename;
        }

        $setting->save();

        return back()->with('success', 'Settings updated successfully.');
    }
}