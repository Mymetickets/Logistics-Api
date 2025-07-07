<?php

namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'city',
        'state_id',
        'country_id',
        'status',
    ];
   
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}