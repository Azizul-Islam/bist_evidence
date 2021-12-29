<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
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
            'price_start' => 'required|numeric',
            'price_end' => 'nullable|numeric',
            'photo' => 'required',
            'address' => 'required|string',
            'project_status' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'nullable',
        ]);
        //make slug form title
        $slug = Str::slug($data['title']);
        $slug_count = Project::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = rand() . "-" . $slug;
        }
        $data['slug'] = $slug;
        if($request->has('photo')) {
            $file = $request->file('photo');
            $name_gen = rand().".".$file->getClientOriginalExtension();
            $file->move(public_path('backend/projects'),$name_gen);
            $data['photo'] = $name_gen;
        }

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success','Project added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price_start' => 'required|numeric',
            'price_end' => 'nullable|numeric',
            'photo' => 'nullable',
            'address' => 'required|string',
            'project_status' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'nullable',
        ]);
        //make slug form title
       $path = public_path('backend/projects/'.$project->photo);
        if($request->has('photo')) {
            if(file_exists($path)){
                unlink($path);
            }
            $file = $request->file('photo');
            $name_gen = rand().".".$file->getClientOriginalExtension();
            $file->move(public_path('backend/projects'),$name_gen);
            $data['photo'] = $name_gen;
        }

        $project->update($data);
        return redirect()->route('admin.projects.index')->with('info','Project updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $path = public_path('backend/projects/'.$project->photo);
        if(file_exists($path)){
            unlink($path);
        }
        $project->delete();
        return back()->with('info','Project deleted success');
    }

     //update property status
     public function projectStatus(Request $request)
     {
         $project = Project::findOrFail($request->id);
         if ($request->mode == 'true') {
             $project->update(['status' => 'active']);
         } else {
             $project->update(['status' => 'inactive']);
         }
         return response()->json(['msg' => 'Status has been updated!', 'status' => true]);
     }
}
