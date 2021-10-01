<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontendProperty;
use Illuminate\Http\Request;

class ConsumerRequestController extends Controller
{
    public function index()
    {
        $consumer_requests = FrontendProperty::latest()->paginate(10);
        return view('admin.property-request.index',compact('consumer_requests'));
    }

    public function show($id)
    {
        $frontendProperty = FrontendProperty::findOrFail($id);
        $req_count = FrontendProperty::where('phone',$frontendProperty->phone)->count();
        return view('admin.property-request.show',compact('frontendProperty','req_count'));
    }
}
