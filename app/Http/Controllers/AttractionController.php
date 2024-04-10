<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttractionController extends Controller
{
    //
    public function index(){
        return view('attraction.allattraction');
    }
    public function view_attraction(){
        return view('attraction.Viewallattraction');
    }
}
