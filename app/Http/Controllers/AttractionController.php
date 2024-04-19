<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{
    //
    public function index(){

        $attraction_data= Attraction::all();
        // echo"<pre>";
        // print_r($attraction_data); die;
        // dd($attraction_data);
        return view('attraction.allattraction',compact('attraction_data'));
    }
    public function view_attraction(){
        return view('attraction.Viewallattraction');
    }
    public function add_attraction(){
        return view('attraction.addattraction');
    }
}
