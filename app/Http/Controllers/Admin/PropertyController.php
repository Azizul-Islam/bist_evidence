<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Category;
use App\Models\Property;
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
        return view('admin.properties.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
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
        
        //make slug form title
        $slug = Str::slug($data['title']);
        $slug_count = Property::where('slug',$slug)->count();
        if($slug_count > 0){
            $slug = time()."_".$slug;
        }
        $data['slug'] = $slug;

        //request has photo
        if($request->has('photo')){
            $file = $request->file('photo');
            $name_gen = $file->getClientOriginalName();
            $file->move(public_path('backend/assets/images/properties'),$name_gen);
            $data['photo'] = $name_gen;
        }
        Property::create($data);
        return redirect()->route('properties.index')->with('success','Property created success');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
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
