<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'title' => 'required|string',
            'description' => 'required|string',
            'photo' => 'nullable',
            'status' => 'nullable'
        ]);

        //make slug
        $slug = Str::slug($data['title']);
        $slug_count = Page::where('slug',$slug)->count();
        if($slug_count > 0){
            $slug = time()."-".$slug;
        }
        $data['slug'] = $slug;

        if ($request->has('photo')) {
            $file = $request->file('photo');
            $name_gen = rand() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('backend/pages/'), $name_gen);
            $data['photo'] = $name_gen;
        }
        if($request->has('is_service')) {
            $data['is_service'] = $request->is_service;
        }
        else {
            $data['is_service'] = 0;
        }
        if($request->has('is_about')) {
            $data['is_about'] = $request->is_about;
        }
        else {
            $data['is_about'] = 0;
        }
        $success = Page::create($data);
        if($success){
            return redirect()->route('admin.pages.index')->with('success','Page create successfully');
        }
        else{
            return back()->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'photo' => 'nullable',
            'status' => 'nullable'
        ]);
        $path = public_path('backend/pages/'.$page->photo);
        if ($request->has('photo')) {
            // if(file_exists($path)){
            //     unlink($path);
            // }
            $file = $request->file('photo');
            $name_gen = rand() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('backend/pages/'), $name_gen);
            $data['photo'] = $name_gen;
        }
        if($request->has('is_service')) {
            $data['is_service'] = $request->is_service;
        }
        else {
            $data['is_service'] = 0;
        }
        if($request->has('is_about')) {
            $data['is_about'] = $request->is_about;
        }
        else {
            $data['is_about'] = 0;
        }
        $success = $page->update($data);
        if($success){
            return redirect()->route('admin.pages.index')->with('success','Page updated successfully');
        }
        else{
            return back()->with('error','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        // $path = public_path('backend/pages/'.$page->photo);
        // if(file_exists($path)){
        //     unlink($path);
        // }
        $success = $page->delete();
        if($success){
            return redirect()->back()->with('info','Page deleted successfully');
        }
        else{
            return back()->with('error','Something went wrong!');
        }
    }

    public function pageStatus(Request $request)
    {
        
        $page = Page::findOrFail($request->id);
        if($request->mode == 'true'){
            $page->update(['status'=>'active']);
        }else{
            $page->update(['status'=>'inactive']);
        }
        
        return response()->json(['msg'=>'Page status updated','status'=>true]);
    }
}
