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

    public function attraction()
    {
        return $this->belongsTo(Attraction::class);
    }
}
