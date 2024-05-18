<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class FetchCartInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && session('prefix') == 'agent') {
            $user_id = Auth::user()->id;
            $cart = Cart::where('user_id', $user_id)->first();
            $cart_info = isset($cart->more_info) ? json_decode($cart->more_info, true) : [];
            view()->share('cart_info', $cart_info);
        }
        return $next($request);
    }
}
