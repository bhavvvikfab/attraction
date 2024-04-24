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
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'attraction_id', 'id');
    }
}