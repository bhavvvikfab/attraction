<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $primarykey = "id";

    protected $fillable = [
        'attraction_id',
        'customer_id',
        'reference_no',
        'booking_time',
        'confirm_time',
        'alternate_email',
        'local_amt',
        'amount',
        'status',
        
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','customer_id');
    }
    public function attraction()
    {
        return $this->hasOne(Attraction::class,'id','attraction_id');
    }

    public function bookingItems() 
    {
        return $this->hasOne(Booking_item::class ,'booking_id','id');
    }
}
