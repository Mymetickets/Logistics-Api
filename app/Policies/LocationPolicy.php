<?php

namespace App\Policies;
use App\Models\Locations\Location;
use Illuminate\Auth\Access\Response;
use App\Models\Admin;

class LocationPolicy
{
    public function update(Admin $admin, Location $location): Response 
    {
        return $admin->is_admin
                    ? Response::allow() 
                    : Response::deny('Unauthorized. Only administrators can update locations.');
    }

    public function viewAny(Admin $admin): bool {return $admin->is_admin; }

    public function view(Admin $admin, Location $location): bool { return $admin->is_admin;}

    public function create(Admin $admin): bool { return $admin->is_admin;}

    public function delete(Admin $admin, Location $location): bool { return $admin->is_admin; }
}
