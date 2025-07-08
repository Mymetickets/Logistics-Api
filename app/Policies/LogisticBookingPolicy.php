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

    public function view($auth, LogisticBooking $booking): bool
    {
    // Admins can view all bookings
    if ($auth instanceof \App\Models\Admin && $auth->is_admin) {
        return true;
    }

    // Regular users can only view their own bookings
    if($auth instanceof \App\Models\User){
        return $booking->user_id === $auth->id;
    }

}


}
