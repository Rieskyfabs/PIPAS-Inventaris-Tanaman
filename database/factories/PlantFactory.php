<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plant;
use App\Models\Benefit;
use App\Models\Category;
use Carbon\Carbon;

class PlantFactory extends Factory
{
    protected $model = Plant::class;

    public function definition()
    {
        $seedingDate = $this->faker->dateTimeBetween('-1 months', 'now');
        $harvestDate = Carbon::parse($seedingDate)->addDays(90); // Misal panen setelah 90 hari

        return [
            'name' => $this->faker->word,
            'scientific_name' => $this->faker->word,
            'type' => $this->faker->randomElement(['Herbal', 'Vegetable']), // Hanya Herbal atau Vegetable
            'barcode' => $this->faker->unique()->numerify('##########'),
            'category_id' => Category::factory(),
            'location' => $this->faker->city,
            'quantity' => $this->faker->numberBetween(1, 100),
            'benefit_id' => Benefit::factory(),
            'status' => $this->faker->randomElement(['baik', 'layu', 'sakit']),
            'seeding_date' => $seedingDate,
            'harvest_date' => $harvestDate,
        ];
    }
}

