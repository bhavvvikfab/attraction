<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    { 
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function register(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->role = 1;
        $user->email = $request->email;

        $user->save();
    }

    public function index(Request $request){
        $data['prefix'] = explode('/', $request->getPathInfo())[1] ?? 'agent';
        return view('login',$data);
    }

    public function register_page(){
        return view('register');
    }

    public function admin_profile()
    {
        return view('users-profile');
    }
    
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        $prefix = explode('/', $request->getPathInfo())[1] ?? 'agent';
        return redirect('/'.$prefix); // Redirect to the login page after logout
    }
}
