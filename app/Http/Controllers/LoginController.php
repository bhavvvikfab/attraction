<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Api_credential;
use App\Models\Attraction;
use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AgentController;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {  
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (($user->role == 1 && $request->prefix == 'admin') || ($user->role == 2 && $request->prefix == 'agent')) {
                if($user->role ==2 && $user->status == 1){
                    $token = $user->createToken('MyApp')->accessToken;
                    return response()->json(['token' => $token], 200);
                }else if($user->role == 1){
                    $token = $user->createToken('MyApp')->accessToken;
                    return response()->json(['token' => $token], 200);   
                                     
                }else{
                    Auth::logout();
                    return response()->json(['message' => 'Unauthorized user to login.'], 200);
                }
            } else {
                Auth::logout();
                return response()->json(['message' => 'Unauthorized user to login here.'], 200);
            }
        } else {
            return response()->json(['error' => 'Invalid email or password.'], 401);
        }
    }

    public function register(Request $request)
    {
        try{
            $agent = new AgentController();
            return $agent->store($request);
        }catch (Exception $e) {
            $responseData =[
                'status' => false,
                'message' => $e->getMessage()
            ];
            return response()->json($responseData, 401);
            // return redirect(route(session('prefix', 'agent') . '.register'))->with('message', $e->getMessage())->setStatusCode(401);
        }
    }
    public function deshborad_page(){

        $data['authUser'] = Auth::user();
        $data['attraction_count']=Attraction::count();
        $data['booking_chart'] = json_encode(array(0,0,0,0,0,0,0));
        $data['agent_chart'] = json_encode(array());
        $notifications = Notification::where('user_id',Auth::user()->id )
            ->latest()
            ->take(5)
            ->get();
        $data['notifications'] = $notifications;
        // print_r( $data['notifications']); die;

       if(Auth::user()->role== 1){
        $data['booking_count']=Booking::count();
        $data['agent_count']=User::where('role',2)->count();
        $data['booking_data']=Booking::with('user','attraction')->get();
        
        // Get the bookings for the past six days
                    $bookings = Booking::whereBetween('created_at', [now()->subDays(6)->startOfDay(), now()->endOfDay()])->get();

                    // Initialize an array to store the booking count for each day
                    $bookingCounts = [];

                    // Loop through the past six days
                    for ($i = 6; $i >= 0; $i--) {
                        // Get the date for the current iteration
                        $date = now()->subDays($i)->toDateString();

                        // Count the bookings for the current date
                        $count = $bookings->where('created_at', '>=', now()->subDays($i)->startOfDay())
                                        ->where('created_at', '<=', now()->subDays($i)->endOfDay())
                                        ->count();

                        // Store the booking count for the current date
                        $bookingCounts[] = $count;
                    }
                    $data['booking_chart'] = json_encode(array_values($bookingCounts));

                    $agents = User::whereBetween('created_at', [now()->subDays(6)->startOfDay(), now()->endOfDay()])->get();

                    // Initialize an array to store the agent count for each day
                    $agentCounts = [];
                    
                    // Loop through the past six days
                    for ($i = 6; $i >= 0; $i--) {
                        // Get the date for the current iteration
                        $date = now()->subDays($i)->toDateString();
                    
                        // Count the agents for the current date
                        $count = $agents->where('created_at', '>=', now()->subDays($i)->startOfDay())
                                        ->where('created_at', '<=', now()->subDays($i)->endOfDay())
                                        ->count();
                    
                        // Store the agent count for the current date
                        $agentCounts[] = $count;
                    }
                    
                    // Convert the array to JSON format and assign it to the 'agent_chart' key in the $data array
                    $data['agent_chart'] = json_encode(array_values($agentCounts));    
            

       }else{
        $data['booking_count']=Booking::where('customer_id',Auth::user()->id)->count();
        $data['booking_data']=Booking::with('user','attraction')->where('customer_id',Auth::user()->id)->get();

        // Get the bookings for the past six days
        $bookings = Booking::whereBetween('created_at', [now()->subDays(6)->startOfDay(), now()->endOfDay()])->where('customer_id',Auth::user()->id)->get();

        // Initialize an array to store the booking count for each day
        $bookingCounts = [];

        // Loop through the past six days
        for ($i = 6; $i >= 0; $i--) {
            // Get the date for the current iteration
            $date = now()->subDays($i)->toDateString();

            // Count the bookings for the current date
            $count = $bookings->where('created_at', '>=', now()->subDays($i)->startOfDay())
                            ->where('created_at', '<=', now()->subDays($i)->endOfDay())
                            ->count();

            // Store the booking count for the current date
            $bookingCounts[] = $count;
        }
        $data['booking_chart'] = json_encode(array_values($bookingCounts));
        // print_r($data['booking_chart']); die;
       }
        return view('index', $data);
    }

    public function addAgent(){
        try{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email',
            ]);
        
            if ($validator->fails()) {
                $responseData = [
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(), 
                ];
                
                return response()->json($responseData, 200);
            }

            return $this->storeUser($request);
        }catch (Exception $e) {
            $responseData =[
                'status' => false,
                'message' => $e->getMessage()
            ];
            return response()->json($responseData, 401);
            // return redirect(route(session('prefix', 'agent') . '.register'))->with('message', $e->getMessage())->setStatusCode(401);
        }
    }

    public function index(Request $request){
        $data['prefix'] = explode('/', $request->getPathInfo())[1] ?? 'agent';
        return view('login',$data);
    }

    public function register_page(){
        return view('register');
    }

    public function profile()
    {
      
        $userdata= Auth::user();
        
        return view('users-profile',compact('userdata'));
    }
    public function update_profile(Request $request){
    
        // Validate the request data
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) use ($request) {
                    // Retrieve the user's original email from the database
                    $originalEmail = Auth::user()->email;
        
                    // Check if the email has been changed
                    if ($value !== $originalEmail) {
                        // If changed, validate for uniqueness
                        $request->validate([
                            'email' => 'unique:users,email',
                        ], [
                            'email.unique' => 'The email has already been taken.',
                        ]);
                    }
                },
            ],
        ]);
        
        $imageName="";
        $image = $request->file('new_img');
        // dd($image);
        if(isset($request->new_img) && !empty($request->new_img)){
            $imageName = time().'.'. $image->extension();
            $image->move(public_path('assets/img'), $imageName);
        }else{
            $imageName=$request->old_img;
        }
         

        


        $user = User::find(Auth::user()->id);
        $user->name = $request['fullName'];
        $user->email = $request['email'];
        $user->country = $request['country'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];
        $user->profile = $imageName;
        $user->save();

        // return redirect(session('prefix') . '/users-profile')->with('success', 'Profile Update successfully!');
        return redirect(route(session('prefix', 'agent') . '.profile'))->with('success', 'Profile Update successfully!');
 
    }

    

    public function change_password(Request $request) {

       $current_pass=$request->currentPassword;
       $new_pass=$request['newpassword'];

       $user = Auth::user();
       
       $currentPasswordStatus = Hash::check($current_pass, $user->password);
       if ($currentPasswordStatus) {
        //    $user_data= User::find($user->id);
        unset($user->prefix);
        $user->password = Hash::make($new_pass);
        $user->save();
        $this->logout($request);
        return 1;
            // return back()->withErrors(['currentPassword' => 'The current password is incorrect.']);
        }
        
        else{

            return 2;
        }

        
    }

   
    
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        $prefix = explode('/', $request->getPathInfo())[1] ?? 'agent';
        return redirect('/'.$prefix); // Redirect to the login page after logout
    }
    public function setting(){
        $credential_data=Api_credential::first();
        // dd( $credential_data);
        return view('setting',compact('credential_data'));
    }
}
