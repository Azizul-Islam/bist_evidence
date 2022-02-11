<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('admin.user.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|min:8',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'photo' => 'nullable',
        ]);
        $data['password'] = Hash::make($request->password);
        if($request->has('photo')){
            $file = $request->file('photo');
            $name_gen = rand().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(200,200)->save(public_path('backend/assets/images/user/'.$name_gen));
            $data['photo'] = $name_gen;
        }
        Admin::create($data);
        return redirect()->route('admin.users.index')->with('success','Admin user created success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.user.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'phone' => 'required|min:8',
            'password' => 'nullable|confirmed|min:6',
            'password_confirmation' => 'nullable',
            'photo' => 'nullable',
        ]);
        if($request->has('password')){
            $data['password'] = Hash::make($request->password);
        }else {
            $data['password'] = $admin->password;
        }
        if($request->has('photo')){
            $path = public_path('backend/assets/images/user/'.$admin->photo);
            if(file_exists($path) && $admin->photo != null){
                unlink($path);
            }
            $file = $request->file('photo');
            $name_gen = rand().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(200,200)->save(public_path('backend/assets/images/user/'.$name_gen));
            $data['photo'] = $name_gen;
        }
        $admin->update($data);
        return redirect()->route('admin.users.index')->with('success','Admin user update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $path = public_path('backend/assets/images/user/'.$admin->photo);
        if(file_exists($path) && $admin->photo != null){
            unlink($path);
        }
        $admin->delete();
        return back()->with('info','Admin user deleted success');
    }
}
