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
}
