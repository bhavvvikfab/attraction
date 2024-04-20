<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $primarykey = "id";

    protected $fillable = [
        'user_id',
        'notification',
        
        
        
    ];
}
