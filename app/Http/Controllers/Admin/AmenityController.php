<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenity = null;
        if(!blank(request()->amenity_id)){
            $amenity = Amenity::findOrFail(request()->amenity_id);
        }
        $amenities = Amenity::latest()->get();
        return view('admin.amenity.index',compact('amenities','amenity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amenity_name' => 'required|string|max:255|unique:amenities,name'
        ]);

        Amenity::create(['name'=>$request->amenity_name]);
        return redirect()->back()->with('success','Amenity created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function show(Amenity $amenity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenity $amenity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenity $amenity)
    {
        $request->validate([
            'amenity_name' => 'required|string|max:255|unique:amenities,name,'.$amenity->id
        ]);

        $amenity->update(['name'=>$request->amenity_name]);
        return redirect()->route('admin.amenities.index')->with('info','Amenity updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return back()->with('info','Amenity deleted success');
    }
}
