<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Booking;
use App\Models\Attraction;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function index(){
        if(Auth::user()->role==1){
            $booking_data=Booking::with('user','attraction')->get();
        }else{
            $booking_data=Booking::where('customer_id', Auth::user()->id)->with('user','attraction')->get();

        }
        
        // dd($data); 


        return view('booking.Allbooking',compact('booking_data'));
    }
}
