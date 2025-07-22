<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $fillable = [
        'name',
        'password',
        'email',
    ];

    public $timestamps = true;

    // Additional model methods can be defined here
}
