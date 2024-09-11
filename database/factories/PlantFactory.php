<?php

namespace Database\Factories;

use App\Models\PlantCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
use App\Models\Plant;
use App\Models\Benefit;
use App\Models\Category;
use Carbon\Carbon;

class PlantFactory extends Factory
{
    protected $model = Plant::class;

    protected $plants = [
        ['name' => 'Sereh', 'scientific_name' => 'Curcuma longa'],
        ['name' => 'Tomat Lele', 'scientific_name' => 'Zingiber officinale'],
        ['name' => 'Aloe Vera', 'scientific_name' => 'Ocimum basilicum'],
        ['name' => 'Fittonia', 'scientific_name' => 'Amaranthus spinosus'],
        ['name' => 'Bayam', 'scientific_name' => 'Brassica rapa'],
    ];

    public function definition()
    {
        $plant = $this->faker->randomElement($this->plants);

        $seedingDate = $this->faker->dateTimeBetween('-1 months', 'now');
        $harvestDate = Carbon::parse($seedingDate)->addDays(90);

        // Get or create a default plant code
        $plantCode = PlantCode::inRandomOrder()->first() ?? PlantCode::create([
            'plant_code' => 'DEFAULT_CODE',
            'description' => 'Default Description'
        ]);

        // Get related data
        $location = Location::inRandomOrder()->first();
        $categoryId = Category::inRandomOrder()->first()->id ?? null;
        $benefitId = Benefit::inRandomOrder()->first()->id ?? null;

        // Create plant model without setting the id manually
        $plantModel = Plant::create([
            'name' => $plant['name'],
            'plant_code_id' => $plantCode->id,
            'scientific_name' => $plant['scientific_name'],
            'type' => $this->faker->randomElement(['Herbal', 'Sayuran']),
            'category_id' => $categoryId,
            'location_id' => $location ? $location->id : null,
            'benefit_id' => $benefitId,
            'status' => $this->faker->randomElement(['sehat', 'baik', 'layu', 'sakit']),
            'seeding_date' => $seedingDate,
            'harvest_date' => $harvestDate,
        ]);

        return $plantModel->toArray();
    }
}