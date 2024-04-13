<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        try{
            // dd($request->all());

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

            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone_number;
            $user->country = $request->country;
            $user->status = isset($request->status)? $request->status:0;
            $user->role = 2;


            $user->save();
            $responseData =[
                'status' => true,
                'message' => 'Rgister successfully!'
            ];
            if(isset($request->redirecturl)){
                $responseData['redirecturl'] = $request->redirecturl;
            }
            return response()->json($responseData, 200);
            // return redirect(route(session('prefix', 'agent') . '.register'))->with('message', 'Rgister successfully!')->setStatusCode(200);
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
}
