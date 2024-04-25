<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api_credential extends Model
{
    use HasFactory;
    protected $table = 'api_credentials';
    protected $primarykey = "id";

    protected $fillable = [
        'email',
        'password',
        'api_login_auth_key'
    ];
}
