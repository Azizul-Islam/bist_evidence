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
use Image;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('property_status','approve')->latest()->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Category::getCategories(true);
        $data['categories'] = Category::whereNull('parent_id')->latest()->get();
        $data['areas'] = Area::whereNull('parent_id')->latest()->get();
        $data['amenities'] = Amenity::latest()->get();
        return view('admin.properties.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $data['property_status'] = 'approve';

        

        if($request->has('featured_image')){
            $file = $request->file('featured_image');
            $name_gen = rand().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(1366,768)->save(public_path('backend/properties/banner/'.$name_gen));
            $data['featured_image'] = $name_gen;
        }

        $property = Property::create($data);
        // request has photos
        if ($request->has('photos') && !blank($request->photos)) {
            foreach ($request->photos as $photo) {
                $name_gen = rand() . "." . $photo->getClientOriginalExtension();
                Image::make($photo)->resize(390,293)->save(public_path('backend/properties/'.$name_gen));
                $property->images()->create([
                    'path' => $name_gen,
                    'alt' => $property->title
                ]);
            }
        }

        //property amenity part herer
        $amenities = $request->amenity_id;
        if (!empty(array_filter($amenities))) {
            foreach ($amenities as $i => $item) {
                $amenity = new PropertyAmenity();
                $amenity->property_id = $property->id;
                $amenity->amenity_id = $request->amenity_id[$i];
                $amenity->save();
            }
        }

        //property floor plan here
        // $floors = $request->floor_name;
        // if (!empty(array_filter($floors))) {
        //     foreach ($floors as $i => $item) {
        //         $floor = new PropertyFloorPlan();
        //         $floor->property_id = $property->id;
        //         $floor->floor_name = $request->floor_name[$i];
        //         $floor->floor_description = $request->floor_description[$i];
        //         $floor->floor_size = $request->floor_size[$i];
        //         $floor->floor_room = $request->floor_room[$i];
        //         $floor->floor_bath = $request->floor_bath[$i];
        //         if (!empty($request->floor_photo)) {
        //             $file = $request->floor_photo[$i];
        //             $name_gen = rand() . "." . $file->getClientOriginalExtension();
        //             $file->move(public_path('backend/properties/floor'), $name_gen);
        //             $floor->floor_photo = $name_gen;
        //         }
        //         $floor->save();
        //     }
        // }

        //property feature part here
        // $features = $request->feature_name;
        // if (!empty(array_filter($features))) {
        //     foreach ($features as $i => $item) {
        //         $feature = new PropertyFeature();
        //         $feature->property_id = $property->id;
        //         $feature->feature_name = $request->feature_name[$i];
        //         $feature->feature_value = $request->feature_value[$i];
        //         $feature->save();
        //     }
        // }
        return redirect()->route('admin.properties.index')->with('success', 'Property created success');
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
        $amenities = Amenity::latest()->get();
        $categories = Category::whereNull('parent_id')->latest()->get();
        $subCategories = Category::whereNotNull('parent_id')->latest()->get();
        $areas = Area::whereNull('parent_id')->latest()->get();
        $sub_areas = Area::WhereNotNull('parent_id')->get();
        $propertyAmenities = $property->amenities->pluck('id')->toArray();
        return view('admin.properties.edit', compact('property', 'categories', 'areas', 'sub_areas', 'amenities', 'subCategories', 'propertyAmenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        // dd($request->floor_id[0]);
        $data = $request->validated();
        if ($request->is_featured == 'on') {
            $data['is_featured'] = 1;
        } else {
            $data['is_featured'] = 0;
        }
        if($request->has('featured_image')){
            $path = public_path('/backend/properties/banner/'.$property->featured_image);
            if(file_exists($path) && $property->featured_image != null){
                unlink($path);
            }
            $file = $request->file('featured_image');
            $name_gen = rand().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(1366,768)->save(public_path('backend/properties/banner/'.$name_gen));
            $data['featured_image'] = $name_gen;
        }
        $property->update($data);
        // request has photo
        if ($request->has('photos') && !blank($request->photos)) {
            if (!blank($property->images)) {
                foreach ($property->images as $photo) {
                    unlink(public_path('backend/properties/' . $photo->path));
                    $photo->delete();
                }
            }
            foreach ($request->photos as $photo) {
                $name_gen = rand() . "." . $photo->getClientOriginalExtension();
                Image::make($photo)->resize(390,293)->save(public_path('backend/properties/'.$name_gen));
                $property->images()->create([
                    'path' => $name_gen,
                    'alt' => $property->title
                ]);
            }
        }
        if($request->has('amenity_id') && !blank($request->amenity_id)){
            $property->amenities()->sync($request->amenity_id);
        }

        //property floor plan here
        // $floors = $request->floor_name;
        // if ($request->has('floor_name') && !blank($request->floor_name)) {
        //     foreach ($floors as $i => $item) {
        //         if(!empty($request->floor_id[$i])){
        //             $floor = PropertyFloorPlan::findOrFail($request->floor_id[$i]);
        //         }
        //         else{
        //             $floor = new PropertyFloorPlan();
        //         }
        //         $floor->property_id = $property->id;
        //         $floor->floor_name = $request->floor_name[$i];
        //         $floor->floor_description = $request->floor_description[$i];
        //         $floor->floor_size = $request->floor_size[$i];
        //         $floor->floor_room = $request->floor_room[$i];
        //         $floor->floor_bath = $request->floor_bath[$i];

        //         if (!empty($request->floor_photo)) {
        //             $file = $request->file('floor_photo');
        //             $name_gen = rand() . "." . $file->getClientOriginalExtension();
        //             $file->move(public_path('backend/properties/floor'), $name_gen);
        //             $floor->floor_photo = $name_gen;
        //         }

        //         $floor->save();
        //     }
        // }

        // property feature part here
        // $features = $request->feature_name;
        // if ($request->has('feature_name') && !blank($request->feature_name)) {
        //     foreach ($features as $i => $item) {
        //         // dd($request->feature_id[$i]);
        //         if(!empty($request->feature_id[$i])) {
        //             $feature = PropertyFeature::findOrFail($request->feature_id[$i]);
        //         }
        //         else{
        //             $feature = new PropertyFeature();
        //         } 
        //         $feature->property_id = $property->id;
        //         $feature->feature_name = $request->feature_name[$i];
        //         $feature->feature_value = $request->feature_value[$i];
        //         $feature->save();
        //     }
        // }

        return redirect()->route('admin.properties.index')->with('info', 'Property has been updated');
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
        return redirect()->back()->with('info', 'Property deleted successfully');
    }

    //update property status
    public function propertyStatus(Request $request)
    {
        $property = Property::findOrFail($request->id);
        if ($request->mode == 'true') {
            $property->update(['status' => 'active']);
        } else {
            $property->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Status has been updated!', 'status' => true]);
    }

    public function propertyApprove(Request $request, Property $property)
    {
        $property->update([
            'property_status' => 'approve',
            'status' => 'active'
        ]);

        return back()->with('success','Property status updated');
    }

    public function floorDestroy($id)
    {
        $floor = PropertyFloorPlan::findOrFail($id);
        $floor->delete();
        return response()->json(['msg'=>'Floor plan has been deleted']);
    }
    public function featureDestroy($id)
    {
        $feature = PropertyFeature::findOrFail($id);
        $feature->delete();
        return response()->json(['msg'=>'Floor plan has been deleted']);
    }

    public function floorPhotoUpdate(Request $request)
    {
        dd($request->all());
    }
}
