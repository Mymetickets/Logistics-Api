<?php

namespace Database\Factories\Transportations;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transportations\TransportMode;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransportMode>
 */
class TransportModeFactory extends Factory
{
    protected $model = TransportMode::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word();

        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'description' => $this->faker->sentence(),
        ];
    }
}
