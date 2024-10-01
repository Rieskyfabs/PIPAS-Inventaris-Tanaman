<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlantAttributes>
 */
class PlantAttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plant_code' => $this->faker->unique()->word,
            'name' => $this->faker->word,
            'scientific' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
