<?php
// app/Helpers/HelperClass.php

namespace App\Helpers;

use App\Models\Api_credential;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HelperClass
{
    protected $api_credential;
    protected $apiKey;

    public function __construct()
    {
        $this->api_credential = new Api_credential();
        $credential = $this->api_credential->first();

        if ($credential) {
            $this->apiKey = $credential->api_login_auth_key;
        } else {
            $this->apiKey = null;
        }
    }


    public static function greet($name)
    {
        return "Hello, $name!";
    }

    public function getToken() {
        $credential = new Api_credential();
        $credential = $credential->first();

        if ($credential) {
            $requestData = new Request;
            $requestData->email = $credential->email;
            $requestData->password = $credential->password;
            $response = $this->globaltixlogin($requestData);
            $result = json_decode($response);
            $responseData = $result->data;
            $token = $responseData->access_token;
            $credential->api_login_auth_key = $token;
            $credential->save();
            return $credential->api_login_auth_key;
        }

        return null;
    }

    public function callExternalApi($endpoint, $method = 'POST', $data = [], $token = null) 
    {
        $curl = curl_init();
        $url = env('API_BASE_URL') . $endpoint;
        
        $commonOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 240,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        ];

        $specificOptions = [
            CURLOPT_CUSTOMREQUEST => $method,
        ];

        if ($method === 'POST') {
            $specificOptions[CURLOPT_POSTFIELDS] = json_encode($data);
        }

        if ($token) {
            $specificOptions[CURLOPT_HTTPHEADER] = ['Content-Type: application/json', 'Authorization: Bearer ' . $token];
        } else {
            $specificOptions[CURLOPT_HTTPHEADER] = ['Content-Type: application/json'];
        }

        curl_setopt_array($curl, $commonOptions + $specificOptions);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function globaltixlogin($request) {
        $data = [
            'username' => $request->email,
            'password' => $request->password
        ];

        $response = $this->callExternalApi('auth/login', 'POST', $data, null);
        // dd($request);
        return $response;
    }

    public function countryList($token = null){

        $url = 'country/getAllCountries';

        $response = $this->callExternalApi($url, 'GET', array(), $token);
        
        return json_decode($response)->data;
    }

    function productList($token, $countryID, $pageNo = null){
        // https://uat-api.globaltix.com/api/product/list?categoryIds=2&page=11&countryId=10
        $pageNo = $pageNo ? $pageNo : 1;
        $url = 'product/list?categoryIds=2&page='.$pageNo.'&countryId='.$countryID;
        $response = $this->callExternalApi($url, 'GET', array(), $token);
        
        return json_decode($response);
    }

    function singleProductDetail($token, $productID){
        $url = 'product/info?id='.$productID;
        $response = $this->callExternalApi($url, 'GET', array(), $token);

        return json_decode($response);
    }

    function singleProductOption($token, $productID){
        $url = 'product/options?id='.$productID;
        $response = $this->callExternalApi($url, 'GET', array(), $token);

        return json_decode($response);
    }

    function singleProductTicketType($token, $ticketTypeID){
        $url = 'ticketType/get?id='.$ticketTypeID;
        $response = $this->callExternalApi($url, 'GET', array(), $token);

        return json_decode($response);
    }

    // Credit Reseller
    function getCreditByReseller(){        
        $url = 'credit/getCreditByReseller';
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'GET', array(), $this->apiKey);
            if(empty($response)){
                $token = $this->getToken();
                $response = $this->callExternalApi($url, 'GET', array(), $token);
            }
            return json_decode($response)->data ?? null;
        }
    }

    function getTopUpHistory(){        
        $url = 'topUp/getTopUpHistory';
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'GET', array(), $this->apiKey);
            if(empty($response)){
                $token = $this->getToken();
                $response = $this->callExternalApi($url, 'GET', array(), $token);
            }
            return json_decode($response)->data;
        }
    }



    function getUnavailableDates($ticketTypeID, $dateFrom, $dateTo) {
        $url = 'ticketType/getUnavailableDates?id='.$ticketTypeID.'&dateFrom='.$dateFrom.'&dateTo='.$dateTo;
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'GET', array(), $this->apiKey);
            if(empty(json_decode($response)->data)){
                $token = $this->getToken();
                $response = $this->callExternalApi($url, 'GET', array(), $token);
            }
            return json_decode($response)->data;
        }
    }

    function getAvailableDates($ticketTypeID, $dateFrom, $dateTo) {
        $url = 'ticketType/getAvailableDates?ticketTypeID='.$ticketTypeID.'&dateFrom='.$dateFrom.'&dateTo='.$dateTo;
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'GET', array(), $this->apiKey);
            if(empty(json_decode($response)->data)){
                $token = $this->getToken();
                $response = $this->callExternalApi($url, 'GET', array(), $token);
            }
            return json_decode($response)->data;
        }
    }

    function checkEventAvailability1($ticketTypeID, $dateFrom, $dateTo) {
        $url = 'ticketType/checkEventAvailability?ticketTypeID='.$referenceNumber.'&dateFrom='.$dateFrom.'&dateTo='.$dateTo;
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'GET', array(), $this->apiKey);
            if(empty(json_decode($response)->data)){
                $token = $this->getToken();
                $response = $this->callExternalApi($url, 'GET', array(), $token);
            }
            return json_decode($response)->data;
        }
    }
    //Selected
    function checkEventAvailability($ticketTypeID, $date) {
        // Format OF date 2024-05-03
        $url = 'ticketType/checkEventAvailability?id='.$referenceNumber.'&date='.$date;
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'GET', array(), $this->apiKey);
            if(empty(json_decode($response)->data)){
                $token = $this->getToken();
                $response = $this->callExternalApi($url, 'GET', array(), $token);
            }
            return json_decode($response)->data;
        }
    }

    function reserveBooking($customerName, $email, $ticketTypes) {
        $url = 'booking/reserve';
        $fields = array(
            "alternateEmail" => "",
            "creditCardCurrencyId" => null,
            "customerName" => $customerName,
            "email" => $email,
            "groupName" => "",
            "groupBooking" => false,
            "groupNoOfMember" => 1,
            "mobileNumber" => "",
            "mobilePrefix" => "",
            "otherInfo" => array(
                "partnerReference" => ""
            ),
            "passportNumber" => "",
            "paymentMethod" => "CREDIT",
            "ticketTypes" => $ticketTypes,
            "remarks" => ""
        );
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'POST', json_encode($fields), $this->apiKey);
        }else {
            $token = $this->getToken();
            $response = $this->callExternalApi($url, 'POST', json_encode($fields), $token);
        }
        
        return $response;
    }

    function confirmBooking($referenceNumber, $remarks) {
        $url = 'booking/confirm';
        $fields = array(
            "referenceNumber" => $referenceNumber,
            "remarks" => $remarks
        );
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'POST', json_encode($fields), $this->apiKey);
            if(empty(json_decode($response)->data)){
                $token = $this->getToken();
                $response = $this->callExternalApi($url, 'POST', json_encode($fields), $token);
            }
            return json_decode($response)->data;
        }
    }

    // Here we get Full booking details with all the ticket details 
    function getBookingDetails($referenceNumber) {
        $url = 'booking/details?referenceNumber='.$referenceNumber;
        if($this->apiKey){
            $response = $this->callExternalApi($url, 'GET', array(), $this->apiKey);
            if(empty(json_decode($response)->data)){
                $token = $this->getToken();
                $response = $this->callExternalApi($url, 'GET', array(), $token);
            }
            return json_decode($response)->data;
        }
    }

    
    
}
