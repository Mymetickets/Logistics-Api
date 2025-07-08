<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
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

    public function viewAny(Admin $admin){
        //allow only admin to view all bookings
    return $admin->is_admin;

    }

    public function view(User $user, LogisticBooking $booking): bool
    {
    // Admins can view all bookings
    if ($user->is_admin) {
        return true;
    }

    // Regular users can only view their own bookings
    return $booking->user_id === $user->id;
}


}
