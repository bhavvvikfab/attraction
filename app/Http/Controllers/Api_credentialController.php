<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Api_credential;

use App\Helpers\HelperClass;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Api_credentialController extends Controller
{
    public function index(Request $request){
        try{
            $helper = new HelperClass();
            $response = $helper->globaltixlogin($request);
            if($response){
                $result = json_decode($response);
                $responseData = $result->data;
                $token = $responseData->access_token;
                $data = Api_credential::first();

                if ($data) {
                    $data->update([
                        'password' => $request->password,
                        'email' => $request->email,
                        'api_login_auth_key' => $token
                    ]);
                    $responseData =[
                        'status' => true,
                        'message' => 'Updated successfully!'
                    ];
                    return response()->json($responseData, 200);
                } else {
                    Api_credential::create([
                        'password' => $request->password,
                        'email' => $request->email,
                        'api_login_auth_key' => $token
                    ]);
                    $responseData =[
                        'status' => true,
                        'message' => 'Inserted successfully!'
                    ];
                    return response()->json($responseData, 200);
                }

            }else{
                $responseData =[
                    'status' => false,
                    'message' => 'Invalid Credential of Your globaltix Account.'
                ];
                return response()->json($responseData, 200);
            }
            
        }catch (Exception $e) {
            $responseData =[
                'status' => false,
                'message' => $e->getMessage()
            ];
            return response()->json($responseData, 401);
            // return redirect(route(session('prefix', 'agent') . '.register'))->with('message', $e->getMessage())->setStatusCode(401);
        }

    }
}
