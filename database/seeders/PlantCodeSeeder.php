<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantCode;

class PlantCodeSeeder extends Seeder
{
    public function run()
    {
        $codes = [
            ['plant_code' => 'SR', 'description' => 'Sereh', 'status' => 'active'],
            ['plant_code' => 'TL', 'description' => 'Tomat Lele', 'status' => 'active'],
            ['plant_code' => 'AL', 'description' => 'Aloe Vera', 'status' => 'active'],
            ['plant_code' => 'FT', 'description' => 'Fittonia', 'status' => 'active'],
            ['plant_code' => 'BM', 'description' => 'Bayam', 'status' => 'active']
        ];

        foreach ($codes as $code) {
            PlantCode::create($code);
        }
    }
}

