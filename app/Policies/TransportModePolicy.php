<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Transportations\TransportMode;
use Illuminate\Auth\Access\Response;

class TransportModePolicy
{
    public function update(Admin $admin, TransportMode $transportMode): Response
    {
        return $admin->is_admin
            ? Response::allow()
            : Response::deny('Unauthorized. Only administrators can update transport modes.');
    }

    public function viewAny(Admin $admin): bool { return $admin->is_admin; }
    public function view(Admin $admin, TransportMode $transportMode): bool { return $admin->is_admin; }
    public function create(Admin $admin): bool { return $admin->is_admin; }
    public function delete(Admin $admin, TransportMode $transportMode): bool { return $admin->is_admin; }
}