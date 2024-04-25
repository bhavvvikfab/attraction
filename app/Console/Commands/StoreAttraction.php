<?php

namespace App\Console\Commands;

use App\Models\Api_credential;
use App\Models\Attraction;
use App\Models\AttractionTicket;

use Illuminate\Console\Command;
use App\Helpers\HelperClass;

class StoreAttraction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:store-attraction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //attraction get and store in database start 
        $this->getAttractions();
        //attraction get and store in database end
    }

    public function getAttractions(){
        $this->token = Api_credential::first()->api_login_auth_key;

        $this->info('Starting data processing...');

        $helper = new HelperClass();
        $countryList = $helper->countryList(null);

        foreach ($countryList as $country) {            
            $countryId = $country->id;
            $countryCode = $country->code;

            $productList = $helper->productList($this->token, $countryId);

            if(isset($productList->data)) {
                $Listsize = $productList->size;
                $this->info($Listsize);
                $noOfPages = intval(ceil($Listsize / 16));

                for ($i = 1; $i <= $noOfPages; $i++) {
                    $productListTotal = $helper->productList($this->token, $countryId, $i);

                    if (isset($productListTotal->data)) {
                        foreach ($productListTotal->data as $key => $product) {
                            $productID = $product->id;
                            $this->info($productID);
                                $singleProductInfo = $helper->singleProductDetail($this->token,$productID);

                                if(isset($singleProductInfo->data)){
                                    $product = $singleProductInfo->data;
                                    $productName = $product->name;
                                    $productImage = $product->image;
                                    $description = $product->description;
                                    // $productCategory = $product->category;
                                    $address = $product->location ?? "ABCD";
                                    $city = $product->city;
                                    $postalCode = $product->postalCode ?? "00000";

                                    $latitude = $product->latitude ?? "";
                                    $longitude = $product->longitude ?? "";

                                    $productCountry = $product->country;
                                    $productCurrency = $product->currency;
                                    
                                    $blockedDate = $product->blockedDates ?? [];
                                    $productBlockedDates = json_encode($blockedDate);

                                    $operatingHours = $product->operatingHours;
                                    $productOperatingHours = json_encode($operatingHours);

                                    $productMerchantID = $product->merchant->id;
                                    $productMerchantName = $product->merchant->name;

                                    $highlights = $product->highlights;
                                    $productHighlights = json_encode($highlights);

                                    $isInstantConfirmation = $product->isInstantConfirmation;
                                    $productOriginalPrice = $product->originalPrice;
                                    $productIsOpenDated = $product->isOpenDated ?? false;
                                    $keyWords = $product->keywords ?? null;
                                
                                    $fields = json_encode(array(
                                        'description' => $description,
                                        'address' => $address,
                                        'duration' => "10",
                                        'latitude' => $latitude,
                                        'longitude' => $longitude,
                                        'city' => $city,
                                        'postal_code' => $postalCode,
                                        'original_price' => $productOriginalPrice,
                                        'blocked_dates' => $productBlockedDates,
                                        'highlights' => $productHighlights,
                                        'is_instant_confirmation' => $isInstantConfirmation,
                                        'is_open_dated' => $productIsOpenDated,
                                        'operating_hours' => $productOperatingHours,
                                        'opening_date' => "2022-01-01",
                                        'attraction_currency' => $productCurrency,
                                        'keywords' => $keyWords,
                                        'merchant' => array("id" => $productMerchantID, "name" => $productMerchantName),
                                        'is_GT_recommend' => $product->isGTRecommend,
                                        'timezone_offset' => $product->timezoneOffset,
                                        'is_own_contracted' => $product->isOwnContracted,
                                        'is_favorited' => $product->isFavorited,
                                        'is_best_seller' => $product->isBestSeller,
                                        'category' => $product->category,
                                        'things_to_note' => $product->thingsToNote,
                                        'media' => $product->media
                                    ));                                    

                                    $attraction = Attraction::updateOrCreate(
                                        ['attraction_id' => $productID],
                                        [
                                            'name' => $productName,
                                            'image' => $productImage,
                                            'country' => $countryCode,
                                            'fields' => $fields,
                                        ]
                                    );
                                    
                                    $singleProductOption = $helper->singleProductOption($this->token, $productID);
                                    
                                    if (isset($singleProductOption->size) && isset($singleProductOption->data) && $singleProductOption->size > 0) {
                                        $ticketTypes = [];
                                    
                                        foreach ($singleProductOption->data as $data) {
                                            if ($data->ticketType) {
                                                foreach ($data->ticketType as $ticketType) {
                                                    $singleProductTicketType = $helper->singleProductTicketType($this->token, $ticketType->id);
                                                    
                                                    if (isset($singleProductTicketType->data)) {
                                                        $ticketTypeData = $singleProductTicketType->data;
                                                        $ticketRequires = array(
                                                            'ticket_type_id' => $ticketTypeData->id,
                                                            'sku' => $ticketTypeData->SKU,
                                                            'variants' => $ticketTypeData->variants,
                                                            'recommendedSellingPrice' => $ticketTypeData->recommendedSellingPrice ?? 0,
                                                            'ticketTypeFormat' => $ticketTypeData->ticketTypeFormat,
                                                            'payableToMerchant' => $ticketTypeData->payableToMerchant,
                                                            'nettPrice' => $ticketTypeData->nettPrice,
                                                            'merchantSettlementRate' => $ticketTypeData->merchantSettlementRate,
                                                            'cancellationNotesSettings' => $ticketTypeData->cancellationNotesSettings,
                                                            'name' => $ticketTypeData->name,
                                                            'status' => $ticketTypeData->status->name ?? null,
                                                            'description' => $ticketTypeData->description ?? null,
                                                            'termsAndConditions' => $ticketTypeData->termsAndConditions,
                                                        );
                                                        // Series Remain
                                                            // In series day wise capacity,series StartDate,ID,
                                                            // Inseries Multiple Events
                                                                //In this events Capacity,available,id,time startTime,enableEmp
                                                        $ticketTypes[] = $ticketRequires;
                                                    }
                                                }
                                            }
                                        }
                                    
                                        $attractionTicket = AttractionTicket::updateOrCreate(
                                            ['attraction_id' => $attraction->id],
                                            [
                                                'attraction_options' => json_encode($singleProductOption),
                                                'attraction_tickets' => json_encode($ticketTypes),
                                            ]
                                        );
                                    }
                                }
                            
                        }
                    }
                    sleep(15);
                }                              
            }
        }        
        $this->info('Data processing complete.');
    }
}
