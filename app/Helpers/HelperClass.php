<?php
// app/Helpers/HelperClass.php

namespace App\Helpers;

class HelperClass
{
    public static function greet($name)
    {
        return "Hello, $name!";
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
            CURLOPT_TIMEOUT => 120,
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

}
