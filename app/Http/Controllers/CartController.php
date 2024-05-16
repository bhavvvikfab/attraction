<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Attraction;
use App\Models\AttractionTicket;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        // Fetch all carts
        // $carts = Cart::all();
        // $carts=1;
        $user_id=Auth::user()->id;
        $carts=Cart::where('user_id',$user_id)->first();
        $cart_info= isset($carts->more_info) ? json_decode($carts->more_info,true) : array();
        // echo"<pre>";
        // print_r($cart_info);
        // die;
        // dd($cart_info);
        // $cart_info=json_decode($carts->more_info,true);
        // $attractionids = array_column($cart_info ?? [], 'attraction_id');
        // dd($cart_info);

        // $all=Attraction::with('attraction_ticket')->whereIn('id',$attractionids)->get();
// dd($all);
        return view('cart.cart', compact('cart_info'));
    }

    public function store(Request $request)
    {
        $request->merge([
            "options" => json_encode($request->options),
        ]);

        Cart::create($request->all());

        return response()->json([
            'message' => 'Cart created successfully',
            'cart' => $request,
        ], 200);
    }

    public function destroy(Cart $cart)
    {

        $cart->delete();
        return redirect()->route('carts.index');
    }

    public function updateCartQTY(Request $request){
        try{
            $response = ['status'=>false,'msg'=>'error'];

            $rules = [
                'attraction_id' => 'required', // example rule
                'option_id' => 'required', // example rule
                'ticket_id' => 'required', // example rule
                'qty' => 'required|integer|min:1', // example rule: qty must be an integer and at least 1
            ];
    
            // Define custom error messages if needed
            $messages = [
                'qty.min' => 'Quantity must be at least :min.', // example custom message
            ];
    
            // Run validation
            $validator = Validator::make($request->all(), $rules, $messages);
    
            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['status' => false, 'msg' => $validator->errors()->first()], 400);
            }

            $attraction_id = $request['attraction_id'] ?? '';
            $option_id = $request['option_id'] ?? '';
            $ticket_id = $request['ticket_id'] ?? '';
            $qty = $request['qty'] ?? 1;


            $user_id=Auth::user()->id;
            $carts=Cart::where('user_id',$user_id)->first();
            $cart_info= isset($carts->more_info) ? json_decode($carts->more_info,true) : array();

            $updatedArray = array_map(function ($attraction) use ($attraction_id,$option_id,$ticket_id,$qty){
                if($attraction['attraction_id'] == $attraction_id){
                    $tmp = $attraction;
                    $optionData = $attraction['options'] ?? array();
                    if(!empty($optionData)){
                        $tmpOptionarray = array_map(function ($option) use ($option_id,$ticket_id,$qty){
                            $tmp_option = $option;
                                if($option['option_id'] == $option_id){
                                    $ticketsData = $option['tickets'] ?? array();
                                    $updatedArrayt = array_map(function ($ticket) use ($ticket_id,$qty){
                                        if ($ticket['ticket_id'] == $ticket_id) {
                                            $ticket['count'] = $qty;
                                        }
                                        return $ticket;
                                    }, $ticketsData);
                                    $tmp_option['tickets'] = $updatedArrayt;
                                }
                                return $tmp_option;
                            },$optionData);
                        $tmp['options'] = $tmpOptionarray;
                    }
                    return $tmp;
                }else{
                    return $attraction;
                }
            },$cart_info);

            $carts->more_info = $updatedArray ?? array();
            if($carts->save()){
                $response = ['status'=>true,'msg'=>'Cart updted successfully', 200];
            }

        } catch (\Exception $e) {
            $response = ['status'=>false,'msg'=>$e->getMessage(), 400];
        }
        return $response;
    }
}
