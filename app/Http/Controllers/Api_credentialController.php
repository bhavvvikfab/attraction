<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Api_credential;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Api_credentialController extends Controller
{
    //
    public function index(Request $request){
        try{
        $data=Api_credential::first();

        if ($data) {
            // If $data exists, update it with the request data
            $data->update([
                'password' => $request->password,
                'email' => $request->email,
                // Add more fields as needed
            ]);
            $responseData =[
                'status' => true,
                'message' => 'Updated successfully!'
            ];
            return response()->json($responseData, 200);


        } else {
            // If $data doesn't exist, create a new record with the request data
            Api_credential::create([
                'password' => $request->password,
                'email' => $request->email,
                // Add more fields as needed
            ]);
            $responseData =[
                'status' => true,
                'message' => 'Inserted successfully!'
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
