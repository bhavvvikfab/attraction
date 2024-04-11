<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function index(){
        return view('agent.allagent');
    }
    public function add_agent(){
        return view('agent.addagent');
    }
    public function view_agent(){
        return view('agent.viewagentdetail');
    }
}
