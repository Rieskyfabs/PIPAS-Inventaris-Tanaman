<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;
use App\Models\Benefit;
use App\Models\Category;

class PlantSeeder extends Seeder
{
    public function run()
    {
        // Membuat data dummy untuk benefits dan categories terlebih dahulu
        Benefit::factory()->count(5)->create();
        Category::factory()->count(5)->create();

        $benefitIds = Benefit::pluck('id')->toArray(); // Mendapatkan semua ID dari tabel benefits
        $categoryIds = Category::pluck('id')->toArray(); // Mendapatkan semua ID dari tabel categories

        foreach (range(1, 10) as $index) {
            Plant::create([
                'name' => "Plant $index",
                'scientific_name' => "Scientific Name $index",
                'type' => ['Fruit', 'Flower', 'Succulent'][array_rand(['Fruit', 'Flower', 'Succulent'])],
                'barcode' => mt_rand(1000000000, 9999999999),
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'location' => "Location $index",
                'quantity' => rand(1, 100),
                'benefit_id' => $benefitIds[array_rand($benefitIds)],
            ]);
        }
    }
}

