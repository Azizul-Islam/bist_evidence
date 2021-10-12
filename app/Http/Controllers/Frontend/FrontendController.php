<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Category;
use App\Models\FrontendProperty;
use App\Models\Property;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $properties = Property::where('status','active')->latest()->paginate(9);
        return view('welcome',compact('properties'));
    }

    public function addPropertyIndex()
    {
        $data = Category::getCategories(true);
        $categories = Category::generateCategories($data);
        $areas = Area::whereNull('parent_id')->latest()->get();
        return view('frontend.add-property',compact('categories','areas'));
    }

    public function getChildAreaByParent(Request $request,$id)
    {
       $area = Area::findOrFail($id);
       if($area){
        $area_id = Area::getChildAreaByParentId($id);
        if(count($area_id)<=0){
            return response()->json(['status'=>false,'date'=>null,'msg'=>'']);
        }
        return response()->json(['status'=>true,'data'=>$area_id,'msg'=>'']);
    }else{
        return response()->json(['status'=>false,'data'=>null,'msg'=>'']);
    }
    }

    public function addPropertyStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'purpose' => 'required',
            'consumer' => 'required',
            'category_id' => 'required',
            'area_id' => 'required',
            'sub_area_id' => 'nullable',
        ]);

        FrontendProperty::create($data);
        return redirect()->back()->with('success','Your response submited');
    }

    public function propertyDetails($slug)
    {
        $property = Property::where('slug',$slug)->first();
        return view('frontend.property-details',compact('property'));
    }

    public function property()
    {
        return view('frontend.pages.property-details');
    }
}
