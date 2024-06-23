<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\Cache;

class GlobalSettingsController extends Controller
{
    public function index()
    {
        $settings = Cache::remember('global_settings', 60, function() {
            return GlobalSetting::first();
        });

        return response()->json($settings);
    }

    public function store(Request $request)
    {
        $settings = GlobalSetting::first();

        $settings->website_name = $request->input('website_name');
        if ($request->hasFile('website_logo')) {
            $logoPath = $request->file('website_logo')->store('logos', 'public');
            $settings->website_logo = $logoPath;
        }
        if ($request->hasFile('website_icon')) {
            $iconPath = $request->file('website_icon')->store('icons', 'public');
            $settings->website_icon = $iconPath;
        }
        $settings->website_phone_number = $request->input('website_phone_number');
        $settings->website_domain = $request->input('website_domain');
        $settings->website_contact_address = $request->input('website_contact_address');
        $settings->website_facebook = $request->input('website_facebook');
        $settings->website_instagram = $request->input('website_instagram');
        $settings->website_linkedin = $request->input('website_linkedin');
        $settings->website_twitter = $request->input('website_twitter');
        $settings->website_email = $request->input('website_email');
        $settings->website_theme_color = $request->input('website_theme_color');

        $settings->save();

        // Update cache
        Cache::put('global_settings', $settings, 60);

        return response()->json($settings);
    }
}
