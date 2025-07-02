<?php

namespace App\Enums;

enum StatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
    case UNVERIFIED = 'unverified'; // This might be specifically for User model, but included for completeness

    // Note: LogisticBooking has its own specific statuses (draft, confirmed, shipped, arrived, delivered).
    // If those are needed for State or other generic models, they'd be added here,
    // otherwise LogisticBooking might use its own dedicated enum later.
}