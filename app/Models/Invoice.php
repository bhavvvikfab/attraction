<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table="invoices";
    protected $primarykey="id";

    protected $fillable=[
        'agent_id',
        'invoice_no',
        'booking_id',
        'invoice_status'
    ];

    public function bookingItem()
    {
        return $this->hasOne(Booking_item::class, 'booking_id', 'booking_id');
    }
    public function booking()
    {
        return $this->hasOne(Booking::class, 'id', 'booking_id');
    }
    public function agent_details()
    {
        return $this->hasOne(User::class, 'id', 'agent_id');
    }


}
