<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;
use App\Models\Benefit;
use App\Models\Category;
use App\Models\Location;
use App\Models\PlantCode;

class PlantSeeder extends Seeder
{
    public function run()
    {
        // Membuat data dummy untuk benefits, categories, dan plant codes terlebih dahulu
        Benefit::factory()->count(5)->create();
        Category::factory()->count(5)->create();
        PlantCode::factory()->count(5)->create();

        // Mendapatkan semua ID dari tabel yang diperlukan
        $benefitIds = Benefit::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        $plantCodeIds = PlantCode::pluck('id')->toArray();

        // Menggunakan factory untuk membuat 20 data tanaman
        Plant::factory()->count(20)->create()->each(function ($plant) use ($benefitIds, $categoryIds, $plantCodeIds) {
            // Set nilai benefit_id, category_id, dan plant_code_id secara acak setelah plant dibuat
            $plant->update([
                'benefit_id' => $benefitIds[array_rand($benefitIds)],
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'plant_code_id' => $plantCodeIds[array_rand($plantCodeIds)],
                'plant_name_id' => $plantCodeIds[array_rand($plantCodeIds)],  // Update sesuai kebutuhan
                'plant_scientific_name_id' => $plantCodeIds[array_rand($plantCodeIds)],  // Update sesuai kebutuhan
            ]);
        });
    }
}
