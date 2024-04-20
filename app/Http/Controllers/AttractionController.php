<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use Illuminate\Support\Facades\Auth;

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

    public function view_attraction(Request $request)
    {
        $query = Attraction::query();

        if ($request->has('country_code')) {
            $query->where('country', $request->input('country_code'));
        }else{ 
            if(isset(Auth::user()->country) && !empty(Auth::user()->country)){
                $query->where('country', Auth::user()->country);
            }
        }

        // Filter by attraction name if provided
        if ($request->has('keyword')) {
            $query->where('name', 'like', '%' . $request->input('keyword') . '%');
        }

        $attractions = $query->paginate(10);
        $countryCode = $request->input('country_code');
        $keyword = $request->input('keyword');

        return view('attraction.Viewallattraction', compact('attractions','countryCode','keyword'));
    }


    public function add_attraction(){
        return view('attraction.addattraction');
    }
}
