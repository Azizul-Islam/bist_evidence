<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Amenity;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentDashboardController extends Controller
{
    public function myProperties()
    {
        $properties = Property::where('user_id',auth()->user()->id)->latest()->paginate(5);
        if(request()->ajax()) {
            $html = view('agent.partials._property_data',compact('properties'))->render();
            return response()->json($html);
        }
        else {
            return view('agent.profile.my-properties',compact('properties'));
        }
    }

    public function favorite()
    {
        $favorites = Favorite::where(['user_id'=>auth()->guard('agent')->id()])->latest()->paginate(5);
        if (request()->ajax()) {
            $html = view('agent.partials._favorite_data', compact('favorites'))->render();
            return response()->json($html);
        } else {
            return view('agent.profile.favorite',compact('favorites'));
        }
    }

    public function submitProperty()
    {
        $result = Category::getCategories(true);
        $data['categories'] = Category::whereNull('parent_id')->latest()->get();
        $data['areas'] = Area::whereNull('parent_id')->latest()->get();
        $data['amenities'] = Amenity::latest()->get();
        return view('agent.profile.submit-property',$data);
    }

    public function compare()
    {
        return view('agent.profile.compare');
    }

    public function lockScreen()
    {
        return view('agent.profile.lock-screen');
    }

    public function faqs()
    {
        return view('agent.profile.faqs');
    }

    public function agentProfileUpdate(Request $request)
    {
        $agent = Agent::findOrFail($request->user_id);
        $data = Validator::make($request->all(),[
            'name' => 'required|string',
            'phone' => 'required|min:8',
            'organization' => 'nullable|string',
            'address' => 'nullable|string',
            'photo' => 'nullable|mimes:jpg,png,jpeg',
        ]);

        if(!$data->passes()){
            return response()->json(['status'=>0,'errors'=>$data->errors()->toArray()]);
        }

        $agent->organization = $request->organization;
        $agent->address = $request->address;
        $agent->facebook = $request->facebook;
        $agent->twitter = $request->twitter;
        $agent->linkedin = $request->linkedin;
        $agent->instagram = $request->instagram;
        $agent->website = $request->website;
        $agent->save();
        return response()->json(['status'=>1,'msg'=>'Your account has been updated']);
    }

    public function agentPasswordUpdate(Request $request)
    {
        $agent = Agent::findOrFail($request->user_id);
        $data = Validator::make($request->all(),[
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        if(!$data->passes()){
            return response()->json(['status'=>0,'errors'=>$data->errors()->toArray()]);
        }
        $hashPassword = $agent->password;
        $password = Hash::make($request->password);
        if(Hash::check($request->oldpassword,$hashPassword)){
            $agent->password = $password;
            $agent->save();
            return response()->json(['status'=>1,'msg'=>'Your password has been updated']);
        }
        else {
            return response()->json(['status'=>0,'msg'=>'Your old password is not correct']);
        }


    }
}
