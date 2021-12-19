<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'company_logo' => 'sometimes|mimes:png,jpg,jpeg,svg,gif|max:500',
            'footer_logo' => 'sometimes|mimes:png,jpg,jpeg,svg,gif|max:500',
            'get_in_touch_photo' => 'sometimes|mimes:png,jpg,jpeg,svg,gif|max:500',
            'get_in_touch_title' => 'sometimes|string',
            'get_in_touch_description' => 'sometimes|string',
            'favicon' => 'sometimes|mimes:png,jpg,jpeg,svg,gif|max:100',
            'company_name' => 'required|string',
            'address' => 'required',
            'phone' => 'required',
            'phone1' => 'nullable',
            'email' => 'required|email',
            'email1' => 'nullable|email',
            'footer_description' => 'nullable|string',
            'website' => 'sometimes|nullable',
        ]);
        //get previous settings if exists 
        $settings = Setting::first();
        $settings = !blank($settings) ? $settings : new Setting();

        //if request has any company logo then it move to public directory and save it database
        if($request->has('company_logo')){
            $logo_name = "company_logo.".$request->file('company_logo')->getClientOriginalExtension();
            $request->file('company_logo')->move(public_path(),$logo_name);
            $settings->company_logo = $logo_name;
        }

        //if request has any footer logo then it move to public directory and save it database
        if($request->has('footer_logo')){
            $footer = "footer_logo.".$request->file('footer_logo')->getClientOriginalExtension();
            $request->file('footer_logo')->move(public_path(),$footer);
            $settings->footer_logo = $footer;
        }

        //if request has favicon then it move to public path and save database
        if($request->has('favicon')){
            $favicon = 'favicon.'.$request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->move(public_path(),$favicon);
            $settings->favicon = $favicon;
        }

        //if request has get in touch photo then it move to public path and save database
        if($request->has('get_in_touch_photo')){
            $get_in_touch_photo = 'get_in_touch_photo.'.$request->file('get_in_touch_photo')->getClientOriginalExtension();
            $request->file('get_in_touch_photo')->move(public_path(),$get_in_touch_photo);
            $settings->get_in_touch_photo = $get_in_touch_photo;
        }

        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->email1 = $request->email1;
        $settings->company_name = $request->company_name;
        $settings->company_website = $request->company_website;
        $settings->address = $request->address;
        $settings->phone1 = $request->phone1;
        $settings->address = $request->address;
        $settings->footer_description = $request->footer_description;
        $settings->get_in_touch_title = $request->get_in_touch_title;
        $settings->get_in_touch_description = $request->get_in_touch_description;
        // $settings->copyright = $request->copyright;
        $success = $settings->save();

        if($success){
            return redirect()->back()->with('success','Settings updated successfully');
        }else{
            return back()->with('error','Something went wrong!');
        }

    }

    public function socialStore(Request $request)
    {
        $settings = Setting::first();
        $settings = !blank($settings) ? $settings : new Setting();
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->linkedin = $request->linkedin;
        $settings->gmail = $request->gmail;
        $settings->youtube = $request->youtube;
        $success = $settings->save();

        if($success){
            return redirect()->back()->with('success','Settings updated successfully');
        }else{
            return back()->with('error','Something went wrong!');
        }
    }
}
