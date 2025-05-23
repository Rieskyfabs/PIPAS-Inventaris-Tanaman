<?php

namespace Database\Factories;

use App\Models\PlantAttributes;
use DateTime;
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
        // Ambil kode tanaman yang sudah ada di PlantAttribute
        $plantAttribute = PlantAttributes::inRandomOrder()->first();

        // Pastikan bahwa ada kode tanaman yang diambil
        if (!$plantAttribute) {
            throw new \Exception("No Plant Attribute available. Please seed the Plant Attribute table first.");
        }

        // Tentukan tanggal penanaman dan panen
        $seedingDate = $this->faker->dateTimeBetween('-1 months', 'now');
        $harvestDate = Carbon::parse($seedingDate)->addDays(90);
        $today = new DateTime();

        // Tentukan harvest_status
        if ($harvestDate <= $today) {
            $harvestStatus = 'sudah dipanen';
        } elseif ($harvestDate <= (clone $today)->modify('+7 days')) {
            $harvestStatus = 'siap panen';
        } else {
            $harvestStatus = 'belum panen';
        }

        // Get related data
        $location = Location::inRandomOrder()->first();
        $categoryId = Category::inRandomOrder()->first()->id ?? null;
        $benefitId = Benefit::inRandomOrder()->first()->id ?? null;

        // Return data plant yang dibuat berdasarkan kode tanaman dari PlantAttributeSeeder
        return [
            'plant_code_id' => $plantAttribute->id,
            'plant_name_id' => $plantAttribute->id,  // Ganti jika berbeda
            'plant_scientific_name_id' => $plantAttribute->id,  // Ganti jika berbeda
            'type' => $this->faker->randomElement(['Herbal', 'Sayuran']),
            'qr_code' => $this->faker->optional()->word,
            'harvest_status' => $harvestStatus,
            'category_id' => $categoryId,
            'location_id' => $location ? $location->id : null,
            'benefit_id' => $benefitId,
            'status' => $this->faker->randomElement(['sehat', 'baik', 'layu', 'sakit']),
            'seeding_date' => $seedingDate,
            'harvest_date' => $harvestDate,
        ];
    }
}
