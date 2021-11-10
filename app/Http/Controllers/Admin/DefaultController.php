<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function agentProperty()
    {
        $properties = Property::where(['consumer'=>'agent'])->latest()->get();
        return view('admin.properties.agent-property',compact('properties'));
    }
}
