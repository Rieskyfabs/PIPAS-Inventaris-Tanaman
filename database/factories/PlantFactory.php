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

    public function definition()
    {
        // Ambil kode tanaman yang sudah ada di PlantCode
        $plantCode = PlantCode::inRandomOrder()->first();

        // Pastikan bahwa ada kode tanaman yang diambil
        if (!$plantCode) {
            throw new \Exception("No PlantCode available. Please seed the PlantCode table first.");
        }

        // Tentukan tanggal penanaman dan panen
        $seedingDate = $this->faker->dateTimeBetween('-1 months', 'now');
        $harvestDate = Carbon::parse($seedingDate)->addDays(90);

        // Get related data
        $location = Location::inRandomOrder()->first();
        $categoryId = Category::inRandomOrder()->first()->id ?? null;
        $benefitId = Benefit::inRandomOrder()->first()->id ?? null;

        // Return data plant yang dibuat berdasarkan kode tanaman dari PlantCodeSeeder
        return [
            'plant_code_id' => $plantCode->id,
            'plant_name_id' => $plantCode->id,  // Ganti jika berbeda
            'plant_scientific_name_id' => $plantCode->id,  // Ganti jika berbeda
            'type' => $this->faker->randomElement(['Herbal', 'Sayuran']),
            'qr_code' => $this->faker->optional()->word,
            'category_id' => $categoryId,
            'location_id' => $location ? $location->id : null,
            'benefit_id' => $benefitId,
            'status' => $this->faker->randomElement(['sehat', 'baik', 'layu', 'sakit']),
            'seeding_date' => $seedingDate,
            'harvest_date' => $harvestDate,
        ];
    }
}
