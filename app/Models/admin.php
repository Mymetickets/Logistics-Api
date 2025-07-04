<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    //
     use HasFactory, Notifiable, HasApiTokens;
     protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    protected function casts()
    {
        return [
            "password" => "hashed"
        ];
    }

    protected $hidden=[
        'password'
    ];
}
