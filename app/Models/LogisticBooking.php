<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogisticBooking extends Model
{
    protected $fillable = [
        'user_id',
        'location_id',
        'transport_mode_id',
        'goods_name',
        'weight',
        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'receiver_address',
        'status',

    ];


}
