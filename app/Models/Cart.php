<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;    

    protected $fillable = [
        'user_id',
        'attraction_id',
        'ticketValidity',
        'options',
        'more_info',
        'subTotal_payableAmount',
        'subtTotal_payableToMerchant',
        'sub_total'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function attraction()
    {
        return $this->hasOne(Attraction::class,'id', 'attraction_id');
    }

    public function ticketType()
    {
        return $this->hasOne(AttractionTicket::class,'attraction_id', 'attraction_id');
    }
    
}
