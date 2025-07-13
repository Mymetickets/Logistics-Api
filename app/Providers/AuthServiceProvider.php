<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Locations\Location;
use App\Policies\LocationPolicy;

use App\Models\LogisticBooking;
use App\Policies\LogisticBookingPolicy;

use App\Models\Transportations\TransportMode;
use App\Policies\TransportModePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Location::class => LocationPolicy::class,
        LogisticBooking::class => LogisticBookingPolicy::class,
        TransportMode::class => TransportModePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
