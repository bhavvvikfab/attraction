<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Attraction;
use App\Models\Booking_item;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\UserTransaction;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Helpers\HelperClass;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        if(Auth::user()->role==1){
            $booking_data=Booking::with('user', 'attraction', 'bookingItems')->whereNotNull('confirm_time')->get();
        }else{
            $booking_data=Booking::where('customer_id', Auth::user()->id)->whereNotNull('confirm_time')->with('user','attraction', 'bookingItems')->get();
        }
        foreach($booking_data as &$booking){
            $bookingCartInfoAttID = json_decode($booking->bookingItems->items)[0]->attraction_id;
            $attraction = Attraction::find($bookingCartInfoAttID);
            if($attraction){
                $booking->attrName = $attraction->name;
            }else{
                $booking->attrName = "N/A";
            }            
        }
        return view('booking.Allbooking',compact('booking_data'));
    }    

    public function create(Request $request)
    {
        $requestData = $request->all();
        $convertedData = json_decode(json_encode($requestData), true);
        $jsonBookingInfoData = json_encode($convertedData);

        $customerName = Auth::user()->name;
        $customerEmail = Auth::user()->email;
        $customerID = Auth::user()->id;
        
        $cart = Cart::where('user_id', $customerID)->first();
        if (!$cart) {
            return response()->json(['status' => false, 'message' => 'Cart not found']);
        }

        [$ticketFromCart, $localTotal] = $this->processTickets($cart->more_info);
        $user = User::find($customerID);
        if((int)$user->credit_balance < $localTotal) {
            return response()->json(['status' => false, 'message' => 'Insufficient balance to checkout!']);
        }
        // dd($ticketFromCart);
        $alternateEmail = $request->input('alternateEmail');
        $helper = new HelperClass();

        $reserveBooking = $helper->reserveBooking($customerName, $customerEmail, $ticketFromCart);
        $reserveBookingData = json_decode($reserveBooking);

        if (isset($reserveBookingData->data)) {
            return $this->handleBookingConfirmation($cart->more_info, $reserveBookingData->data, $customerID, $localTotal, $alternateEmail, $helper, $user, $jsonBookingInfoData);
        } else {
            // dd($reserveBooking);
            $messageError = $reserveBookingData->error->message ?? "";
            $responseData = ['status' => false, 'message' => "Failed To booking your tickets", "error" => $messageError];
            return response()->json($responseData);
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
                    for($Q=1; $Q <= (int)$ticket->count; $Q++){
                        $localTotal += $ticket->agent_price;
                        $ticketFromCart[] = [
                            'id' => $ticket->ticket_id,
                            'quantity' => 1,
                            "visitDate" => $ticket->visitDate,
                            "index" => 0,
                            "questionList" => $ticket->questionList ? $ticket->questionList->$Q : [],
                            "event_id" => null,
                            "packageItems" => [],
                            "visitDateSettings" => []
                        ];
                    }
                    
                }
            }
        }

        return [$ticketFromCart, $localTotal];
    }

    private function handleBookingConfirmation($cartInfo, $bookingData, $customerID, $localTotal, $alternateEmail, $helper, $user, $jsonBookingInfoData)
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
        $booking->customer_info = $jsonBookingInfoData;        
        $booking->status = 1;

        $booking->save();

        $confirmBooking = $helper->confirmBooking($bookingData->referenceNumber, "This is a test");
        $confirmBookingData = json_decode($confirmBooking);

        if (isset($confirmBookingData->data)) {
            $bookingSuccessDetails = $helper->getBookingDetails($bookingData->referenceNumber);
            if($bookingSuccessDetails){
                $bookingItems = new Booking_item;
                $bookingItems->booking_id = $booking->id;
                $bookingItems->items = $cartInfo;
                $bookingItems->save();

                $booking->booking_info = json_encode($bookingSuccessDetails);
                $booking->confirm_time = $confirmBookingData->data->confirmTime;
                $booking->status = 2;
                $booking->save();

                Cart::where('user_id', $customerID)->delete();

                $user->credit_balance = (double)$user->credit_balance - $localTotal;
                $user->save();

                $invoiceId = rand(100000, 999999);
                $invoice = new Invoice([
                    'agent_id' => $customerID,
                    'invoice_no' => $invoiceId,
                    'booking_id' => $booking->id,
                    'invoice_status' => 1
                ]);
                $invoice->save();

                $transactionId = 'TX' . now()->timestamp . Str::random(6); 
                $transaction = new UserTransaction([
                    'user_id' => $customerID,
                    'transaction_id' => $transactionId,
                    'amount' => $localTotal,
                    'type' => "debit",
                    'status' => "completed",
                    'balance' => $user->credit_balance,
                ]);            
                $transaction->save();

                $responseData = ['status' => true, 'message' => "Successfully Booking"];
            }else{
                $booking->status = 3;
                $booking->save();
                $responseData = ['status' => false, 'message' => "Booking Not Confirmed!"];
            }           
            
        } else {
            $booking->status = 3;
            $booking->save();
            $responseData = ['status' => false, 'message' => "Booking Not Confirmed!"];
        }

        return response()->json($responseData, 200);
    }
    
    public function view_booking($id)
    {
        $booking_data=Booking::with('user','attraction','attraction.attraction_ticket','bookingItems')->find($id);       

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
