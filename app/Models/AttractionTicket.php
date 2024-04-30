<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttractionTicket extends Model
{
    use HasFactory;
    protected $table = 'attraction_tickets';
    protected $primarykey = "id";

    protected $fillable = [
        'attraction_id',
        'attraction_options',
        'attraction_tickets',      
    ];

    protected $appends = [
        'display_final_netprice'
    ];

    public function attraction()
    {
        return $this->belongsTo(Attraction::class);
    }

    

    public function getDisplayFinalNetpriceAttribute()
    {
        
        $originalPrice = $this->attraction_options ? json_decode($this->attraction_options) : array();
        $setting_markup= Setting::first();
        $Attraction = Attraction::find($this->attraction_id);
        $sdata= json_decode($setting_markup->settings,true);
        $set_markup_value=  $sdata['price_markup']['value'];
        $set_markup_type=  $sdata['price_markup']['type'];

        if ($originalPrice && isset($originalPrice->data) && !empty($originalPrice->data)) {
            foreach ($originalPrice->data as &$data) {
                if (isset($data->ticketType) && !empty($data->ticketType)) {
                    foreach ($data->ticketType as &$ticketType) {
                      $original_net_price=  $ticketType->nettPrice;
                        if(!empty($Attraction->markup_value)){
                            if($Attraction->markup_type==2){
                                $dis_val= $original_net_price + ($original_net_price * $Attraction->markup_value)/100;
                            }else{
                                $dis_val= $original_net_price + $Attraction->markup_value;
                            }
                        }else{
                            if($set_markup_type==2){
                                $dis_val= $original_net_price + ($original_net_price * $set_markup_value)/100;
                            }else{
                                $dis_val=$original_net_price + $set_markup_value;
                            }
                        }
                        $finalNetPrice = $dis_val; 
                        // Example calculation
                        
                        // // Append display_final_netprice to the current ticketType array
                        $ticketType->agent_price = $finalNetPrice;
                    }
                }
            }
        }
        
        return json_encode($originalPrice);
    }


}
