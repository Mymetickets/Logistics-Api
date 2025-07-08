<?php

namespace App\Enums;

enum LogisticBookingEnums
{
     //
    const DRAFT = "draft";
    const CONFIRMED = 'confirmed';
    const SHIPPED = 'shipped';
    const ARRIVED = 'arrived';
    const DELIVERED = 'delivered';
    const CANCELLED = 'cancelled';
}
