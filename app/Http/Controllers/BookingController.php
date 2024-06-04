<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Booking;
use App\Models\Attraction;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Helpers\HelperClass;

use Illuminate\Http\Request;
class BookingController extends Controller
{
    public function index()
    {
        if(Auth::user()->role==1){
            $booking_data=Booking::with('user','attraction')->get();
        }else{
            $booking_data=Booking::where('customer_id', Auth::user()->id)->with('user','attraction')->get();

        }
        return view('booking.Allbooking',compact('booking_data'));
    }    

    public function create(Request $request)
    {
        $customerName = Auth::user()->name;
        $customerEmail = Auth::user()->email;
        $customerID = Auth::user()->id;
        
        $cart = Cart::where('user_id', $customerID)->first();
        if (!$cart) {
            return response()->json(['status' => false, 'message' => 'Cart not found'], 404);
        }

        [$ticketFromCart, $localTotal] = $this->processTickets($cart->more_info);
        $user = User::find($customerID);
        if((int)$user->credit_balance < $localTotal) {
            return response()->json(['status' => false, 'message' => 'Insufficient balance to checkout!'], 404);
        }

        $alternateEmail = $request->input('alternateEmail');
        $helper = new HelperClass();

        $reserveBooking = $helper->reserveBooking($customerName, $customerEmail, $ticketFromCart);
        $reserveBookingData = json_decode($reserveBooking);

        if (isset($reserveBookingData->data)) {
            return $this->handleBookingConfirmation($reserveBookingData->data, $customerID, $localTotal, $alternateEmail, $helper, $user);
        } else {
            $messageError = $reserveBookingData->error->message ?? "";
            $responseData = ['status' => false, 'message' => "Failed To booking your tickets", "error" => $messageError];
            return response()->json($responseData, 401);
        }        
    }

    private function processTickets($moreInfo)
    {
        $ticketsInfo = json_decode($moreInfo);
        $ticketFromCart = [];
        $localTotal = 0;

        foreach ($ticketsInfo as $info) {
            $options = $info->options;
            foreach ($options as $option) {
                $tickets = $option->tickets;
                foreach ($tickets as $ticket) {
                    $localTotal += $ticket->agent_price;
                    $ticketFromCart[] = [
                        'id' => $ticket->ticket_id,
                        'quantity' => (int)$ticket->count,
                        "visitDate" => null,
                        "index" => 0,
                        "questionList" => [],
                        "event_id" => null,
                        "packageItems" => [],
                        "visitDateSettings" => []
                    ];
                }
            }
        }

        return [$ticketFromCart, $localTotal];
    }

    private function handleBookingConfirmation($bookingData, $customerID, $localTotal, $alternateEmail, $helper, $user)
    {
        $booking = new Booking();         
        $booking->customer_id = $customerID;
        $booking->attraction_id = 1;
        $booking->reference_no = $bookingData->referenceNumber;
        $booking->booking_time = $bookingData->bookingTime;
        $booking->confirm_time = null;
        $booking->alternate_email = $alternateEmail;
        $booking->local_amt = $localTotal;
        $booking->amount = $bookingData->amount;
        $booking->status = 1;

        $booking->save();

        $confirmBooking = $helper->confirmBooking($bookingData->referenceNumber, "This is a test");
        $confirmBookingData = json_decode($confirmBooking);

        if (isset($confirmBookingData->data)) {
            $booking->confirm_time = $confirmBookingData->data->confirmTime;
            $booking->status = 2;
            $booking->save();
            Cart::where('user_id', $customerID)->delete();
            $user->credit_balance = (double)$user->credit_balance - $localTotal;
            $user->save();
            $responseData = ['status' => true, 'message' => "Successfully Booking"];
        } else {
            $booking->status = 3;
            $booking->save();
            $responseData = ['status' => false, 'message' => "Booking Not Confirmed!"];
        }

        return response()->json($responseData, 200);
    }
    
    public function view_booking($id)
    {
        $booking_data=Booking::with('user','attraction','attraction.attraction_ticket')->find($id);

        return view('booking.viewbookingdetail',compact('booking_data'));
    }
    public function booking(){
        $user_id=Auth::user()->id;
        $carts=Cart::where('user_id',$user_id)->first();
        $cart_info= isset($carts->more_info) ? json_decode($carts->more_info,true) : array();
      
        $subtotal = 0;

        foreach ($cart_info as $attraction) {
            foreach ($attraction['options'] as $option) {
                foreach ($option['tickets'] as $ticket) {
                    $agent_price = !empty($ticket['agent_price']) ? floatval($ticket['agent_price']) : 0;
                    $subtotal += $agent_price * $ticket['count'];
                }
            }
        }

        return view('booking.booking',compact('cart_info','subtotal'));
    }



}
