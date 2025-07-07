<?php

namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany relationship class

class Country extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'status'
    ];

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}