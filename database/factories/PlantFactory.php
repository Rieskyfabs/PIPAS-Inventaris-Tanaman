<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plant;
use App\Models\Benefit;
use App\Models\Category;

class PlantFactory extends Factory
{
    protected $model = Plant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'scientific_name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['Fruit', 'Flower', 'Succulent']),
            'barcode' => $this->faker->unique()->numerify('##########'),
            'category_id' => Category::factory(), // Menggunakan factory untuk category
            'location' => $this->faker->word(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'benefit_id' => Benefit::factory(), // Menggunakan factory untuk benefit
        ];
    }
}

