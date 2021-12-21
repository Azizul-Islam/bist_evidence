<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('agent.index',compact('user'));
    }
    public function login()
    {
        return view('agent.auth.login');
    }

    public function register()
    {
        return view('agent.auth.register');
    }

    public function registerStore(Request $request)
    {
        $data = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|string|unique:agents,email',
            'phone' => 'required|min:8|unique:agents,phone',
            'user_type' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        if(!$data->passes()){
            return response()->json(['status'=>0,'errors'=>$data->errors()->toArray()]);
        }

        Agent::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['status'=>1,'msg'=>'Account created success']);
    }

    public function loginSubmit(Request $request)
    {
        $data = Validator::make($request->all(),[
            'email' => 'required|email|exists:agents,email',
            'password' => 'required|min:6',
        ],[
            'email.exists' => 'This email is not exists in agent table'
        ]);

        if(!$data->passes()){
            return response()->json(['status'=>0,'errors'=>$data->errors()->toArray()]);
        }

        // $creds = $request->only('email','password');
        if(Auth::guard('agent')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password'),'status'=>'active'])) {
            return response()->json(['status'=>1,'msg'=>'Login successfully']);
            // return route('agent.home');
        }
        else {
            return response()->json(['status'=>0,'msg'=>'Invalid Creadentials!']);
            
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('agent')->logout();
        return redirect()->route('agent.login')->with('success','Logout success');
    }
    
}
