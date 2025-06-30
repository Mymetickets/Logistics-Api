<?php

namespace App\Models\Transportations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class TransportationModel extends Model
{
    //
    use HasFactory, Notifiable;
    protected $table='transportation_model';
    protected $fillable=[
        'name',
        'category_id',
        'description',
        'status'
    ];
}
