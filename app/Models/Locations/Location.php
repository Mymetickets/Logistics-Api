<?php

namespace App\Models\Locations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     use HasFactory, Notifiable;
     protected $fillable = [
        'city',
        'state_id',
        'country_id',
        'status',

    ];
}
