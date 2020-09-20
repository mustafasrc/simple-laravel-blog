<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index() {
        $settings = Setting::find(1);
        return view('Back.settings', compact('settings'));
    }

    public function indexPost (Request $request) {
        $settings = Setting::find(1);
        $settings->name = $request->name;
        $settings->instagram = $request->instagram;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->github = $request->github;
        $settings->linkedin = $request->linkedin;
        $settings->youtube = $request->youtube;
        if ($request->hasFile('logo')) {
            $logo= Str::slug($request->name) . rand(0,100) .  '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads'), $logo);
            $settings->logo = '/uploads/'.$logo;
        }
        $settings->save();
        return  redirect()->route('admin.setting');
    }
}
