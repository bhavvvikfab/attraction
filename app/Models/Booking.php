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
}
