<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transportations\TransportationModeCategory;

class TransportationModeCategorySeeder extends Seeder
{
    public function run(): void
    {
        TransportationModeCategory::firstOrCreate(
            ['name' => 'Road Transport'],
            [
                'slug' => 'road-transport',
                'description' => 'Transportation modes used on roads (e.g., trucks, motorcycles, cars).',
                'status' => false,
            ]
        );

        TransportationModeCategory::firstOrCreate(
            ['name' => 'Air Transport'],
            [
                'slug' => 'air-transport',
                'description' => 'Transportation modes used in the air (e.g., planes, helicopters).',
                'status' => true,
            ]
        );

        TransportationModeCategory::firstOrCreate(
            ['name' => 'Water Transport'],
            [
                'slug' => 'water-transport',
                'description' => 'Transportation modes used on water (e.g., ships, boats).',
                'status' => true,
            ]
        );

        $this->command->info('Transportation mode categories seeded successfully!');
    }
}