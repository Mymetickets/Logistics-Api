<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LogisticBooking;

class LogisticBookingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user){
        //allow only admin to view all bookings
        return $user->hasRole('admin');

    }

    public function view(User $user, LogisticBooking $booking): bool
    {
    // Admins can view all bookings
    if ($user->hasRole('admin')) {
        return true;
    }

    // Regular users can only view their own bookings
    return $booking->user_id === $user->id;
}


}
