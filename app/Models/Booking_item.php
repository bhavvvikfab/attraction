<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_item extends Model
{
    use HasFactory;
    protected $table="booking_items";
    protected $primarykey="id";

    protected $fillable=[
        'booking_id',
        'items'
        
    ];
}
