<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'company_name' => 'nullable',
            'comment' => 'required',
            'photo' => 'nullable|mimes:jpg,jpeg,png'
        ]);

        if($request->has('photo')) {
            $file = $request->file('photo');
            $name_gen = time().".".$file->getClientOriginalExtension();
            $file->move(public_path('frontend/assets/images/testimonials'),$name_gen);
            $data['photo'] = $name_gen;
        }
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success','Testimonials added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'company_name' => 'nullable|string',
            'comment' => 'required',
            'photo' => 'nullable|mimes:jpg,jpeg,png'
        ]);

        $path = public_path('frontend/assets/images/testimonials/'.$testimonial->photo);
        if($request->has('photo')) {
            if($testimonial->photo != 'default_photo.png') {
                unlink($path);
            }
            $file = $request->file('photo');
            $name_gen = time().".".$file->getClientOriginalExtension();
            $file->move(public_path('frontend/assets/images/testimonials'),$name_gen);
            $data['photo'] = $name_gen;
        }
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('info','Testimonials updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $path = public_path('frontend/assets/images/testimonials/'.$testimonial->photo);
        if($testimonial->photo != 'default_photo.png') {
            unlink($path);
        }
        $testimonial->delete();
        return response()->json(['status'=>1,'msg'=>'Testimonial deleted success']);
    }
}
