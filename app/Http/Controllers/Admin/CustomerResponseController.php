<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerRespons;
use App\Models\FrontendProperty;
use Illuminate\Http\Request;

class CustomerResponseController extends Controller
{
    public function index()
    {
        $customerResponses = CustomerRespons::latest()->paginate(10);
        return view('admin.customer-response.index',compact('customerResponses'));
    }

    public function status(Request $request)
    {
        $property = CustomerRespons::findOrFail($request->id);
        if ($request->mode == 'true') {
            $property->update(['status' => 'read']);
        } else {
            $property->update(['status' => 'unread']);
        }
        return response()->json(['msg' => 'Status has been updated!', 'status' => true]);
    }

    public function show($id)
    {
        $customerResponse = CustomerRespons::findOrFail($id);
        return view('admin.customer-response.show',compact('customerResponse'));
    }
}
