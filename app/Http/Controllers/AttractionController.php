<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\AttractionTicket;
use Illuminate\Support\Facades\Auth;

class AttractionController extends Controller
{  
    public function index(){

        $attraction_data= Attraction::all();
        // echo"<pre>";
        // print_r($attraction_data); die;
        // dd($attraction_data);
        // dd($attraction_data[0]->display_final);
        return view('attraction.allattraction',compact('attraction_data'));
    }

    public function view_attraction(Request $request)
    {
        $query = Attraction::query();

        if ($request->has('country_code')) {
            $countryCode = $request->input('country_code');
            $query->where('country', $request->input('country_code'));
        }else{ 
            if(isset(Auth::user()->country) && !empty(Auth::user()->country)){
                $countryCode = Auth::user()->country;
                $query->where('country', Auth::user()->country);
            }
        }

        // Filter by attraction name if provided
        if ($request->has('keyword')) {
            $query->where('name', 'like', '%' . $request->input('keyword') . '%');
        }
        $attractionsForCity = $query->get();
        $citiesPage = [];
        foreach ($attractionsForCity as $key => $value) {
            $fields = json_decode($value->fields);
            if (isset($fields->city) && !in_array($fields->city,$citiesPage)) {
                $citiesPage[] = $fields->city;
            }
        }
        $citiesPage = array_unique($citiesPage);

        if ($request->has('city')) {
            $cities = explode(',', $request->input('city'));
            $query->where(function($query) use ($cities) {
                foreach ($cities as $city) {
                    $query->orWhereJsonContains('fields->city', $city);
                }
            });
        }
        

        $attractions = $query->paginate(9);
        $keyword = $request->input('keyword');

        return view('attraction.Viewallattraction', compact('attractions','countryCode','keyword','citiesPage'));
    }


    public function add_attraction(){
        return view('attraction.addattraction');
    }
    public function view_single_attraction($id){

      $all_data= $this->get_attraction_single_data($id);
    //   echo"<pre>";
    //   print_r ($all_data); die;
        $attraction_single=Attraction::with('attraction_ticket')->find($id);
        
        // echo "<pre>";
        // print_r(json_decode($attraction_single->fields)); die;
        // dd( $all_data);
        // $aa=json_decode($attraction_single->attraction_ticket->attraction_options);
        // foreach($aa->data as $key=>$sin){
        //  echo $sin->name;
        // }
        // die;
        $top_three_attractions = Attraction::latest()->take(3)->get();

        if(session('prefix')=='admin'){
           return view('attraction.viewattraction',compact('attraction_single','all_data'));
        }else{
           return view('attraction.singleatt',compact('attraction_single','top_three_attractions','all_data'));
        }
        
    }

     function get_attraction_single_data($id){
        $attraction_single=Attraction::find($id)->toArray();
        $attraction_single2=Attraction::with('attraction_ticket')->find($id)->toArray();
        $main_attraction_ticket=$attraction_single2['attraction_ticket'];
        if(!empty($main_attraction_ticket)){
            $attraction_option=json_decode($attraction_single2['attraction_ticket']['display_final_netprice'],true);
            $attraction_tickets=json_decode($attraction_single2['attraction_ticket']['attraction_tickets'],true);
        }else{
            $attraction_option=[];
            $attraction_tickets=[];
        }
    //    dd($attraction_option);

        return [
            "attraction_single" => $attraction_single,
            "main_attraction_ticket" => $main_attraction_ticket,
            "attraction_option" => $attraction_option ?? [],
            "attraction_tickets"=> $attraction_tickets
        ];

    }
}

