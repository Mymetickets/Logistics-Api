<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Locations\State;
use App\Models\Locations\Country;
use App\Models\Locations\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    protected $model = Location::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city'        => fake()->city,
            'country_id'  => Country::factory(), // or manually set an ID
            'state_id'    => State::factory(),   // or manually set an ID
            'status'      => fake()->boolean() ? 'active' : 'inactive', // example statuses
        ];
    }
}
