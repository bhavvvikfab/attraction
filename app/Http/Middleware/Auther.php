<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Auther
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedPrefixes = ['admin', 'agent'];

        // Extract the prefix from the request URL
        $prefix = explode('/', $request->getPathInfo())[1] ?? 'agent';
    
        // Check if the prefix is one of the allowed prefixes
        if (in_array($prefix, $allowedPrefixes)) {
            if ($request->is($prefix.'/login') || $request->is($prefix.'/register') || $request->is($prefix.'/loginporcess')){
                if (Auth::check()) {
                    return redirect("/$prefix");
                }
            }else{
                if(!Auth::check()){
                    return redirect($prefix.'/login');
                }
                $userRole = Auth::user()->role;
                if($userRole == 2 && $prefix != 'agent'){
                    return redirect('agent/login');
                }else if($userRole == 1 && $prefix != 'admin'){
                    return redirect('admin/login');
                }
                Auth::user()->prefix = $prefix;
            }
        } else {
            if (!Auth::check()) {
                return redirect("$prefix/login");
            }
            $userRole = Auth::user()->role;
            if($userRole == 2 && $prefix != 'agent'){
                return redirect('agent/login');
            }else if($userRole == 1 && $prefix != 'admin'){
                return redirect('admin/login');
            }
            Auth::user()->prefix = $prefix;
        }
        // if ($request->is('admin/login') || $request->is('admin/register') || $request->is('admin/loginporcess')) {
        //     if(Auth::check()){
        //         return redirect('/admin');
        //     }
        // }else{
            // if(!Auth::check()){
            //     return redirect('admin/login');
            // }
        // }
        return $next($request);
    }
}
