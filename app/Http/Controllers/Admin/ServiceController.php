<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.index');
    }

    public function allService()
    {
        $services = Service::latest()->get();
        return response()->json($services);
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
        $data = Validator::make($request->all(),[
            'icon' => 'required|string',
            'title' => 'required|string|unique:services,title',
            'description' => 'required|string'
        ]);

        if(!$data->passes()){
            return response()->json(['status'=>0,'errors'=>$data->errors()->toArray()]);
        }
        else {
            Service::create($request->all());
            return response()->json(['status'=>1,'msg'=>'Service added success']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $data = Validator::make($request->all(),[
            'icon' => 'required|string',
            'title' => 'required|string|unique:services,title,'.$service->id,
            'description' => 'required|string'
        ]);
        

        if(!$data->passes()){
            return response()->json(['status'=>0,'errors'=>$data->errors()->toArray()]);
        }
        else {
            $service->update($request->all());
            return response()->json(['status'=>1,'msg'=>'Service updated success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['status'=>1,'msg'=>'Service deleted success']);
    }
}
