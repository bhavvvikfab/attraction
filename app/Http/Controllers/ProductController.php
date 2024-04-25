<?php

namespace App\Http\Controllers;

use App\Models\Api_credential;
use App\Models\Attraction;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Helpers\HelperClass;


// require_once(app_path('Helpers/helpers.php'));

class ProductController extends Controller
{
    public function __construct(){
        $this->token = Api_credential::first()->api_login_auth_key;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $helper = new HelperClass();
        $countryList = $helper->countryList(null); // Assuming you have defined the countryList function
        
        foreach ($countryList as $country) {
            $countryId = $country->id;
            $productList = $helper->productList($this->token, $countryId);
            if($productList->data){
                $Listsize = $productList->size;
                $noOfPages = $Listsize/16;                
                $productListTotal = $helper->productList($this->token, $countryId, $noOfPages);
                if($productList->data){
                    foreach ($productList->data as $key => $product) {
                        $productID = $product->id;
                        $this->info($productID);
                    }
                }                
            }
        }

        return response()->json(['message' => 'Products stored successfully']);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
