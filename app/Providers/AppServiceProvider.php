<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['*'],function($view){
            
            // $pages = Page::where('status','active')->limit(7)->orderBy('id','ASC')->get();
            $data = Setting::first();
            $global = new \stdClass;
            $global->company_name = $data && $data->company_name ? $data->company_name:"Thikana Properties Development LTD";
            $global->company_website = $data && $data->company_webiste ? $data->company_website : "https://tpropertiesd.com/";
            $global->logo = $data && $data->company_logo ? $data->company_logo:"https://tpropertiesd.com/wp-content/uploads/2021/06/Logo.png";
            $global->footer_logo = $data && $data->footer_logo ? $data->footer_logo:"https://tpropertiesd.com/wp-content/uploads/2021/06/Logo.png";
            $global->footer_description = $data && $data->footer_description ? $data->footer_description:"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum perspiciatis cupiditate numquam odio explicabo accusantium deserunt incidunt.";
            $global->on_of_time = $data && $data->on_of_time ? $data->on_of_time:"Mon - Sun / 9:00AM - 8:00PM";
            $global->favicon = $data && $data->favicon ? $data->favicon:"";
            $global->email = $data && $data->email ? $data->email:"info@tpropertiesd.com";
            $global->email1 = $data && $data->email1 ? $data->email1:"";
            $global->phone = $data && $data->phone ? $data->phone:'+8801908-909090';
            $global->phone1 = $data && $data->phone1 ? $data->phone1:'';
            $global->address = $data && $data->address ? $data->address:"Wireless Gate, T&T Road, Gazipur (Abdul Hakim Super Market)";
            $global->get_in_touch_photo = $data && $data->get_in_touch_photo ? $data->get_in_touch_photo : '';
            $global->get_in_touch_title = $data && $data->get_in_touch_title ? $data->get_in_touch_title : 'LOOKING TO SELL YOUR HOME?';
            $global->get_in_touch_description = $data && $data->get_in_touch_description ? $data->get_in_touch_description : 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.';
            $global->copyright = $data && $data->copyright ? $data->copyright:'';
            
            $global->twitter = $data && $data->twitter ? $data->twitter: '#';
            $global->facebook = $data && $data->facebook ? $data->facebook: '#';
            $global->instagram = $data && $data->instagram ? $data->instagram: '#';
            $global->linkedin = $data && $data->linkedin ? $data->linkedin: '#';
            $global->gmail = $data && $data->gmail ? $data->gmail: '#';
            $global->youtube = $data && $data->youtube ? $data->youtube: '#';
            $global->money_sign = "TK";
            $view->with(['global'=>$global]);
        });
    }
}
