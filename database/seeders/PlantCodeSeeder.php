<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantCode;

class PlantCodeSeeder extends Seeder
{
    public function run()
    {
        $codes = [
            ['plant_code' => 'SR', 'description' => 'Sereh'],
            ['plant_code' => 'TL', 'description' => 'Tomat Lele'],
            ['plant_code' => 'AL', 'description' => 'Aloe Vera'],
            ['plant_code' => 'FT', 'description' => 'Fittonia'],
            ['plant_code' => 'BM', 'description' => 'Bayam']
        ];

        foreach ($codes as $code) {
            PlantCode::create($code);
        }
    }
}

