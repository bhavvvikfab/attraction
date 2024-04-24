<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Api_credential;
use App\Models\Attraction;
class SettingController extends Controller
{
    public function setting(){
        $credential_data=Api_credential::first();
        // dd( $credential_data);
        $markup_data=Setting::first();
        // echo"<pre>";
        // print_r($markup_data); die;
        return view('setting',compact('credential_data','markup_data'));
    }

    public function update_markup(Request $request){
        try {
            // Get the first record from the Setting model
            $data = Setting::first();
        
            // Define your setting data array
            $settingsData = array(
                "price_markup" => array(
                    "value" => $request->attraction_mark_up,
                    "type" => $request->attraction_mark_up_type
                )
            );
        // dd($settingsData);
        // print_r($settingsData); die;
            // If $data exists, update it with the request data
            if ($data) {
                // dd('hh');
                $data->update([
                    'settings' => $settingsData,
                    // Add more fields as needed
                ]);
                $responseData = [
                    'status' => true,
                    'message' => 'Updated successfully!'
                ];
                return response()->json($responseData, 200);
            } else {
                // dd('hh');
                // If $data doesn't exist, create a new record with the request data
                Setting::create([
                    'settings' => json_encode($settingsData),
                    // Add more fields as needed
                ]);
                 // dd('hh');
                $responseData = [
                    'status' => true,
                    'message' => 'Inserted successfully!'
                ];
                return response()->json($responseData, 200);
            }
        } catch (Exception $e) {
            $responseData = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            return response()->json($responseData, 401);
        }

    }

    public function update_attraction_markup(Request $request){
    //   dd($request->all());
    $markup_value=$request->markup_value;
    $markup_style=$request->markup_style;
    $attraction_id=$request->attraction_id;

    $attraction= Attraction::find($attraction_id);

    $orignal_price=$attraction->original_price;
    if($markup_style== 2){
        $display_price=$orignal_price+($orignal_price*$markup_value)/100;
    }else{
        $display_price=$orignal_price+$markup_value;
    }

    // dd($display_price); 
    $attraction->display_price=$display_price;
    $attraction->markup_value=$markup_value;
    $attraction->markup_type=$markup_style;
    $attraction->save();

    $responseData = [
        'status' => true,
        'message' => 'Updated successfully!'
    ];
    return response()->json($responseData, 200);

    }





}
