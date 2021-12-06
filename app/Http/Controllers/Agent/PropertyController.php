<?php

namespace App\Http\Controllers\Agent;

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

class PropertyController extends Controller
{
    public function store(PropertyRequest $request)
    {
        
        $data = $request->validated();
        //make slug form title
        $slug = Str::slug($data['title']);
        $slug_count = Property::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = rand() . "-" . $slug;
        }
        $data['slug'] = $slug;
        if ($request->is_featured == 'on') {
            $data['is_featured'] = 1;
        } else {
            $data['is_featured'] = 0;
        }
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'inactive';
        $data['consumer'] = 'agent';
        $data['property_status'] = 'pending';
        $property = Property::create($data);

        // request has photo
        if ($request->has('photos') && !blank($request->photos)) {
            foreach ($request->photos as $photo) {
                $name_gen = rand() . "." . $photo->getClientOriginalExtension();
                $photo->move(public_path('backend/properties'), $name_gen);
                $property->images()->create([
                    'path' => $name_gen,
                    'alt' => $property->title
                ]);
            }
        }

        $amenities = $request->amenity_id;
        //property amenity part herer
        if (!empty(array_filter($amenities))) {
            foreach ($amenities as $i => $item) {
                $amenity = new PropertyAmenity();
                $amenity->property_id = $property->id;
                $amenity->amenity_id = $request->amenity_id[$i];
                $amenity->save();
            }
        }

        $floors = $request->floor_name;
        //property floor plan here
        if (!empty(array_filter($floors))) {
            foreach ($floors as $i => $item) {
                $floor = new PropertyFloorPlan();
                $floor->property_id = $property->id;
                $floor->floor_name = $request->floor_name[$i];
                $floor->floor_description = $request->floor_description[$i];
                $floor->floor_size = $request->floor_size[$i];
                $floor->floor_room = $request->floor_room[$i];
                $floor->floor_bath = $request->floor_bath[$i];
                if (!empty($request->floor_photo)) {
                    $file = $request->floor_photo[$i];
                    $name_gen = rand() . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('backend/properties/floor'), $name_gen);
                    $floor->floor_photo = $name_gen;
                }
                $floor->save();
            }
        }

        $features = $request->feature_name;
        //property feature part here
        if (!empty(array_filter($features))) {
            foreach ($features as $i => $item) {
                $feature = new PropertyFeature();
                $feature->property_id = $property->id;
                $feature->feature_name = $request->feature_name[$i];
                $feature->feature_value = $request->feature_value[$i];
                $feature->save();
            }
        }
        return redirect()->route('agent.my-properties')->with('success', 'Property created success');
    }

    public function edit(Property $property)
    {
        $data['property'] = $property;
        $data['amenities'] = Amenity::latest()->get();
        $data['categories'] = Category::whereNull('parent_id')->latest()->get();
        $data['subCategories'] = Category::whereNotNull('parent_id')->latest()->get();
        $data['areas'] = Area::whereNull('parent_id')->latest()->get();
        $data['sub_areas'] = Area::WhereNotNull('parent_id')->get();
        $data['propertyAmenities'] = $property->amenities->pluck('id')->toArray();

        return view('agent.profile.edit-property',$data);
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $data = $request->validated();
        if ($request->is_featured == 'on') {
            $data['is_featured'] = 1;
        } else {
            $data['is_featured'] = 0;
        }
        $property->update($data);
        // request has photo
        if ($request->has('photos') && !blank($request->photos)) {
            if (!blank($property->photos)) {
                foreach ($property->photos as $photo) {
                    unlink(public_path('backend/properties/' . $photo->path));
                    $photo->delete();
                }
            }
            foreach ($request->photos as $photo) {
                $name_gen = rand() . "." . $photo->getClientOriginalExtension();
                $photo->move(public_path('backend/properties'), $name_gen);
                $property->images()->create([
                    'path' => $name_gen,
                    'alt' => $property->title
                ]);
            }
        }
        if($request->has('amenity_id') && !blank($request->amenity_id)){
            $property->amenities()->sync($request->amenity_id);
        }

        $floors = $request->floor_name;
        //property floor plan here
        if ($request->has('floor_name') && !blank($request->floor_name)) {
            foreach ($floors as $i => $item) {
                if(!empty($request->floor_id[$i])){
                    $floor = PropertyFloorPlan::findOrFail($request->floor_id[$i]);
                }
                else{
                    $floor = new PropertyFloorPlan();
                }
                $floor->property_id = $property->id;
                $floor->floor_name = $request->floor_name[$i];
                $floor->floor_description = $request->floor_description[$i];
                $floor->floor_size = $request->floor_size[$i];
                $floor->floor_room = $request->floor_room[$i];
                $floor->floor_bath = $request->floor_bath[$i];

                // if (!empty($request->floor_photo)) {
                //     $file = $request->file('floor_photo');
                //     $name_gen = rand() . "." . $file->getClientOriginalExtension();
                //     $file->move(public_path('backend/properties/floor'), $name_gen);
                //     $floor->floor_photo = $name_gen;
                // }

                $floor->save();
            }
        }

        $features = $request->feature_name;
        // property feature part here
        if ($request->has('feature_name') && !blank($request->feature_name)) {
            foreach ($features as $i => $item) {
                // dd($request->feature_id[$i]);
                if(!empty($request->feature_id[$i])) {
                    $feature = PropertyFeature::findOrFail($request->feature_id[$i]);
                }
                else{
                    $feature = new PropertyFeature();
                } 
                $feature->property_id = $property->id;
                $feature->feature_name = $request->feature_name[$i];
                $feature->feature_value = $request->feature_value[$i];
                $feature->save();
            }
        }

        return redirect()->route('agent.my-properties')->with('info', 'Property updated success');
    }

    public function destroy($id)
    {
        $property = Property::findOrfail($id);
        // $property->amenities()->delete();
        $property->floorPlans()->delete();
        $property->features()->delete();
        $property->delete();
        if(request()->ajax()) {
            $properties = Property::where(['user_id'=>auth()->guard('agent')->id()])->latest()->paginate(5);
            $html = view('agent.partials._property_data',compact('properties'))->render();
            return response()->json(['status'=>1,'msg'=>'Property deleted success','html'=>$html]);

        }
    }
}
