<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transportations\TransportMode;
use App\Models\Transportations\TransportationModeCategory;
class TransportModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // IMPORTANT: Ensure you have at least one TransportationModeCategory
        // You might need to run a TransportationModeCategorySeeder first,
        // or ensure your DatabaseSeeder creates categories before this.

        $category = TransportationModeCategory::first(); // Get the first existing category

        if (!$category) {
            // Handle case where no categories exist
            // You might want to create one here if it's acceptable for testing
            echo "No TransportationModeCategory found. Please ensure categories exist before seeding Transport Modes.\n";
            return;
        }

        // Create a new TransportMode entry
        TransportMode::firstOrCreate(
            ['name' => 'Motorcycle'], // Check if 'Motorcycle' already exists
            [
                'category_id' => $category->id,
                'description' => 'A two-wheeled motor vehicle.',
                'status' => false, // Start with false, as your task is to update it to true
            ]
        );

        TransportMode::firstOrCreate(
            ['name' => 'Truck'],
            [
                'category_id' => $category->id,
                'description' => 'A large vehicle for carrying goods.',
                'status' => true, // Example: Start with true for another entry
            ]
        );

        $this->command->info('Transport modes seeded successfully!');
    }
}