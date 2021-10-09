<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Amenity;
use App\Models\Area;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyFeature;
use App\Models\PropertyFloorPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Prophecy\Prophet;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::latest()->paginate(10);
        return view('admin.properties.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Category::getCategories(true);
        $data['categories'] = Category::generateCategories($result);
        $data['areas'] = Area::whereNull('parent_id')->latest()->get();
        $data['amenities'] = Amenity::latest()->get();
        return view('admin.properties.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        //make slug form title
        $slug = Str::slug($data['title']);
        $slug_count = Property::where('slug',$slug)->count();
        if($slug_count > 0){
            $slug = time()."_".$slug;
        }
        $data['slug'] = $slug;
        if($request->is_featured == 'on'){
            $data['is_featured'] = 1;
        } 
        else {
            $data['is_featured'] = 0;
        }
       
        $property = Property::create($data);

         // request has photo
         if($request->has('photos') && !blank($request->photos)){
            foreach($request->photos as $photo) {
                $name_gen = date('YmdHis').".".$photo->getClientOriginalExtension();
                $photo->move(public_path('backend/properties'),$name_gen);
                $property->images()->create([
                    'path' => $name_gen,
                    'alt' => $property->title
                ]);
            }
        }

        //property amenity part herer
        if($request->amenity_id != null){
            $amenities = $request->amenity_id;
            foreach($amenities as $i=>$item) {
                $amenity = new PropertyAmenity();
                $amenity->property_id = $property->id;
                $amenity->amenity_id = $request->amenity_id[$i];
                $amenity->save();
            }
        }

        //property floor plan here
        if($request->floor_name != null){
            $floors = $request->floor_name;
            foreach($floors as $i=>$item) {
                $floor = new PropertyFloorPlan();
                $floor->property_id = $property->id;
                $floor->floor_name = $request->floor_name[$i];
                $floor->floor_description = $request->floor_description[$i];
                $floor->floor_size = $request->floor_size[$i];
                $floor->floor_room = $request->floor_room[$i];
                $floor->floor_bath = $request->floor_bath[$i];
                if(!blank($request->floor_photo[$i])){
                    $file = $request->floor_photo[$i];
                    $name_gen = date('YmdHis').".".$file->getClientOriginalExtension();
                    $file->move(public_path('backend/properties/floor'),$name_gen);
                    $floor->floor_photo = $name_gen;
                }
                $floor->save();
            }
        }
        //property feature part here
        if($request->feature_name != null) {
            $features = $request->feature_name;
            foreach ($features as $i=>$item) {
                $feature = new PropertyFeature();
                $feature->property_id = $property->id;
                $feature->feature_name = $request->feature_name[$i];
                $feature->feature_value = $request->feature_value[$i];
                $feature->save();
            }
        }
        return redirect()->route('admin.properties.index')->with('success','Property created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $result = Category::getCategories(true);
        $categories = Category::generateCategories($result);
        $areas = Area::whereNull('parent_id')->latest()->get();
        $sub_areas = Area::WhereNotNull('parent_id')->get();
        return view('admin.properties.edit',compact('property','categories','areas','sub_areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'size' => 'required',
            'purpose' => 'nullable',
            'description' => 'nullable|string',
            'category_id' => 'required',
            'sub_category_id' => 'nullable',
            'area_id' => 'required',
            'sub_area_id' => 'nullable',
            'consumer' => 'nullable',
            'status' => 'nullable',
            'photo' => 'nullable'
        ]);

        //request has photo
        if($request->has('photo')){
            $file = $request->file('photo');
            $name_gen = $file->getClientOriginalName();
            $file->move(public_path('backend/assets/images/properties'),$name_gen);
            $data['photo'] = $name_gen;
        }

        $property->update($data);
        return redirect()->route('properties.index')->with('info','Property has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->back()->with('info','Property deleted successfully');
    }

    //update property status
    public function propertyStatus(Request $request)
    {
        $property = Property::findOrFail($request->id);
        if($request->mode == 'true'){
            $property->update(['status'=>'active']);
        }else{
            $property->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Status has been updated!','status'=>true]);
    }
}
