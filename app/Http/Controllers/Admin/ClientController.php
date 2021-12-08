<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
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
            'photo' => 'required',
            'link' => 'nullable|string',
            'status' => 'nullable',
            'type' => 'nullable'
        ]);
        if($request->has('photo')) {
            $file = $request->file('photo');
            $name_gen = rand().".".$file->getClientOriginalExtension();
            $file->move(public_path('frontend/assets/images/clients'),$name_gen);
            $data['photo'] = $name_gen;
        }
       $success =  Client::create($data);
       if($success){
           return redirect()->route('admin.clients.index')->with('success','Client created successfull');
       }else{
           return back()->with('error','Something went wrong!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'photo' => 'nullable',
            'link' => 'nullable|string',
            'status' => 'nullable',
            'type' => 'nullable',
        ]);
        $path = public_path('frontend/assets/images/clients/'.$client->photo);
        if($request->has('photo')) {
            if(file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('photo');
            $name_gen = rand().".".$file->getClientOriginalExtension();
            $file->move(public_path('frontend/assets/images/clients'),$name_gen);
            $data['photo'] = $name_gen;
        }
        $success = $client->update($data);
        if($success){
            return redirect()->route('admin.clients.index')->with('success','Client updated successfull');
        }else{
            return back()->with('error','Something went wrong!');
        }
    }


    //update client status
    public function clientStatus(Request $request)
    {
        $brand = Client::findOrFail($request->id);
        if($request->mode == 'true'){
            $brand->update(['status'=>'active']);
        }else{
            $brand->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Status has been updated!','status'=>true]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $path = public_path('frontend/assets/images/clients/'.$client->photo);
        if(file_exists($path)) {
            unlink($path);
        }
        $client->delete();
        return back()->with('info','Deleted success');
        // return response()->json(['status'=>1,'msg'=>'Client deleted success']);
    }
}
