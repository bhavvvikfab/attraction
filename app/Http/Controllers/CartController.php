<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Fetch all carts
        $carts = Cart::all();
        return view('carts.index', compact('carts'));
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
