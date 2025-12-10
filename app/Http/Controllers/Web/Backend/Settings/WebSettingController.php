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
        $setting = WebSetting::first();
        return view('backend.layouts.settings.webSetting', compact('setting'));
    }


public function update(Request $request)
{
    $setting = WebSetting::first();
 
    $validated = $request->validate([
        'site_name' => 'nullable|string|max:255',
        'seo_meta_title' => 'nullable|string|max:255',
        'seo_meta_description' => 'nullable|string',
        'contact_email' => 'nullable|email',
        'social_links' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
        'favicon' => 'nullable|image|mimes:ico,png'
    ]);
     
    
    $setting->site_name = $validated['site_name'] ?? $setting->site_name;
    $setting->seo_meta_title = $validated['seo_meta_title'] ?? $setting->seo_meta_title;
    $setting->seo_meta_description = $validated['seo_meta_description'] ?? $setting->seo_meta_description;
    $setting->contact_email = $validated['contact_email'] ?? $setting->contact_email;
    $setting->social_links = $validated['social_links'] ?? $setting->social_links;
  


    if ($request->hasFile('logo')) {
        // dd($request->file('logo'));
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalExtension();
            $path='uploads/websetting';
            $file->move($path, $filename);
            $filepath = $path . '/' . $filename;
            $setting->logo = $filepath;
        }


          if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = time() . '_' . $file->getClientOriginalExtension();
            $path='uploads/websetting';
            $file->move($path, $filename);
            $filepath = $path . '/' . $filename;
            $setting->favicon = $filepath;
        }
    

    $setting->save();

    return redirect()->back()->with('success', 'Settings updated successfully.');
}

}
