<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;



class AgentController extends Controller
{
    //
    public function index(){
        $agent_data = User::where('role', 2)->get();
        
        return view('agent.allagent',compact('agent_data'));
    }
    public function add_agent(){
        return view('agent.addagent');
    }
    public function view_agent(){
        return view('agent.viewagentdetail');
    }

    public function store(Request $request){
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
            
            $imageName="";
            $image = $request->file('image');
            // dd($image);
            if(isset($request->image) && !empty($request->image)){
                $imageName = time().'.'. $image->extension();
                $image->move(public_path('assets/img'), $imageName);
            }

            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone_number;
            $user->country = $request->countryCode;
            $user->status = isset($request->status)? $request->status:0;
            $user->role = 2;
            $user->profile = $imageName;
            $user->credit_balance = isset($request->credit_balance)? $request->credit_balance:0.00;


            $user->save();
            $responseData =[
                'status' => true,
                'message' => 'Register successfully!'
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
    public function editagent($id){
        $agent= User::find($id);



        return view('agent.editagent',compact('agent'));
    }
    public function updateAgent(Request $request){

        try{
            $validator = Validator::make($request->all(), [
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($request->agent_id),
                ],
            ]);
        
            if ($validator->fails()) {
                $responseData = [
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(), 
                ];
                
                return response()->json($responseData, 200);
            }
            
            $imageName="";
            $image = $request->file('image');
            // dd($image);
            if(isset($request->image) && !empty($request->image)){
                $imageName = time().'.'. $image->extension();
                $image->move(public_path('assets/img'), $imageName);
            }else{
                $imageName=$request->old_img;
            }

            $user =User::find($request->agent_id);
            $user->name = $request->name;
            // $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone_number;
            $user->country = $request->countryCode;
            $user->status = isset($request->status)? $request->status:0;
            $user->role = 2;
            $user->profile = $imageName;
            $user->credit_balance = isset($request->credit_balance)? $request->credit_balance:0.00;


            $user->save();
            $responseData =[
                'status' => true,
                'message' => 'Register successfully!'
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

    public function deleteagent(Request $request){
        try{
        $agent_id=$request->agent_id;
        $agent_delete= User::find($agent_id)->delete();

        $responseData =[
            'status' => true,
            'message' => 'Register successfully!'
        ];
        return response()->json($responseData, 200);

    }catch (Exception $e) {
        $responseData =[
            'status' => false,
            'message' => $e->getMessage()
        ];
        return response()->json($responseData, 401);
        // return redirect(route(session('prefix', 'agent') . '.register'))->with('message', $e->getMessage())->setStatusCode(401);
    }

    }

    public function viewagent($id){

        $agent_data= User::find($id);
        return view('agent.viewagentdetail',compact('agent_data'));
    }
    public function agent_status_change(Request $request){
        $agent_id=$request->agent_id;
        $selectedValue=$request->selectedValue;
       
        $agent= User::find($agent_id);
        $agent->status=$selectedValue;
        $agent->save();

        $responseData =[
            'status' => true,
            'message' => 'Status Change successfully!'
        ];
        return response()->json($responseData, 200);

    }
}
