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

        return view('booking.Allbooking',compact('booking_data'));
    }

    public function create(Request $request){
        $customerName = Auth::user()->name;
        $customerEmail = Auth::user()->email;
        $customerID = Auth::user()->id;
        $attractionID = $request->attraction_id;
        $ticketFromCart = $request->ticket_from_cart;
        $alternateEmail = $request->alternateEmail;
        $reserveBooking = reserveBooking(Auth::user()->name,Auth::user()->email, $ticketFromCart);
        $reserveBookingData = json_decode($reserveBooking);
        if(isset($reserveBookingData->data)){
            $bookinData = $reserveBookingData->data;
            $booking = new Booking();
            $booking->customer_id = $customerID;
            $booking->attraction_id = $attractionID;
            $booking->reference_no = $bookinData->referenceNumber;
            $booking->booking_time = $bookinData->bookingTime;
            $booking->confirm_time = null;
            $booking->alternate_email = $alternateEmail;
            $booking->local_amt = $bookinData->referenceNumber;
            $booking->amount = $bookinData->amount;
            $booking->status = 1;           
        }

        $responseData =[
            'status' => false,
            'message' => "Failed To booking your tickets"
        ];
        if($booking->save()){
            $responseData =[
                'status' => true,
                'message' => "Successfully Booking"
            ];
            return response()->json($responseData, 200);
        }else {
            return response()->json($responseData, 401);
        }        
    }
    
    public function view_booking($id){

        $booking_data=Booking::with('user','attraction','attraction.attraction_ticket')->find($id);
        // dd($booking_data);

        return view('booking.viewbookingdetail',compact('booking_data'));

    }



}
