<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\FrontendProperty;
use App\Models\Property;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function agentProperty()
    {
        $properties = Property::where(['consumer'=>'agent'])->latest()->get();
        return view('admin.properties.agent-property',compact('properties'));
    }

    public function agent()
    {
        $agents = Agent::latest()->get();
        return view('admin.agent.index',compact('agents'));
    }

    public function agentStatus(Request $request)
    {
        $agent = Agent::findOrFail($request->id);
        if($request->mode == 'true') {
            $agent->update(['status'=>'active']);
        }
        else {
            $agent->update(['status'=>'inactive']);
        }
        return response()->json(['status'=>1,'msg'=>'Status has been updated!']);
    }

    public function frontendProperty()
    {
        $frontendProperties = FrontendProperty::latest()->get();
        return view('admin.properties.frontend-property',compact('frontendProperties'));
    }

    public function frontendPropertyStatys(Request $request, FrontendProperty $frontendProperty)
    {
        // dd($frontendProperty);
        $frontendProperty->update([
            'status' => $request->status,
        ]);

        return back()->with('success','Status updated success');
    }
}
