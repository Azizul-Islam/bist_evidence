<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required|min:6'
        ],[
            'email.exists' => 'This email is not exists in admin table'
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home')->with('success','Successfully login');
        }
        else{
            return redirect()->route('admin.login')->with('error','Invalid Creadentials!');
        }
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    
}
