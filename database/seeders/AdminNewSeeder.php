<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Enums\UserEnums;

class AdminNewSeeder extends Seeder
{
    public function run(): void
    {
        if (Admin::where('email', 'workingadmin@backend.com')->doesntExist()) {
            Admin::updateOrCreate([
                'name' => 'Working Admin',
                'email' => 'workingadmin@backend.com',
                'password' => bcrypt('adminpass123'),
                'status' => UserEnums::ACTIVE,
                'is_admin' => true,
                'last_login' => null,
            ]);
            $this->command->info('Working Admin user created successfully!');
        } else {
            $this->command->info('Working Admin user already exists!');
        }
    }
}