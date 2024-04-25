<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;
    protected $table = 'attractions';
    protected $primarykey = "id";

    // protected $casts = [
    //     'fields' => 'array',
    // ];
    

    protected $fillable = [
        'attraction_id',
        'name',
        'image',
        'country',
        'original_price',
        'display_price',
        'markup_value',
        'markup_type',
        'fields'
        
    ];

    protected $appends = [
        'display_final'
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'attraction_id', 'id');
    }

    public function getDisplayFinalAttribute()
    {
        // Manipulate the attributes to get the desired value
        $orignal_price= $this->original_price;
       $dis_val = $orignal_price;
        if(!empty($this->markup_value)){
            if($this->markup_type==2){
                $dis_val= $orignal_price + ($orignal_price * $this->markup_value)/100;
            }else{
                $dis_val= $orignal_price + $this->markup_value;
            }
        }else{
            $setting_markup= Setting::first();
            $sdata= json_decode($setting_markup->settings,true);
            $set_markup_value=  $sdata['price_markup']['value'];
            $set_markup_type=  $sdata['price_markup']['type'];
            
            if($set_markup_type==2){
                $dis_val= $orignal_price + ($orignal_price * $set_markup_value)/100;
            }else{
                $dis_val=$orignal_price + $set_markup_value;
            }
        }
        return $dis_val;

    }

    
}
