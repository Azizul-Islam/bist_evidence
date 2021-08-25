<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update_area = null;
        if(!blank(request()->area_id)){
            $update_area = Area::findOrFail(request()->area_id);
        }

        $areas = Area::latest()->paginate(10);
        $data = Area::getAreas(true);
        $parent_areas = Area::generateAreas($data);

        return view('admin.area.index',compact('update_area','areas','parent_areas'));
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
        $data = $request->validate([
            'area_name' => 'required|string|unique:areas,name',
            'parent_id' => 'nullable',
            'status' => 'nullable'
        ]);
        $data['name'] = $data['area_name'];
        $slug = Str::slug($data['name']);
        $slug_count = Area::where('slug',$slug)->count();
        if($slug_count > 0){
            $slug = time()."_".$data['name'];
        }
        $data['slug'] = $slug;

        Area::create($data);
        return redirect()->back()->with('success','Location created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $data = $request->validate([
            'area_name' => 'required|string|unique:areas,name,'.$area->id,
            'parent_id' => 'nullable',
            'status' => 'nullable'
        ]);
        $data['name'] = $data['area_name'];

        $area->update($data);
        return redirect()->route('areas.index')->with('info','Location updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
    }

    public function getChildAreaByParent($id)
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
}
