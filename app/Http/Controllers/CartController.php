<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Attraction;
use App\Models\AttractionTicket;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Fetch all carts
        // $carts = Cart::all();
        // $carts=1;
        $user_id=Auth::user()->id;
        $carts=Cart::where('user_id',$user_id)->first();
        $cart_info=json_decode($carts->more_info);
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
}
