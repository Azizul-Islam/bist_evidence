<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentDashboardController extends Controller
{
    public function myProperties()
    {
        return view('agent.profile.my-properties');
    }

    public function favorite()
    {
        return view('agent.profile.favorite');
    }

    public function submitProperty()
    {
        return view('agent.profile.submit-property');
    }

    public function compare()
    {
        return view('agent.profile.compare');
    }
}
