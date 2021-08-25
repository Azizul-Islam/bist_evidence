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
        return view('admin.consumer-request',compact('consumer_requests'));
    }
}
