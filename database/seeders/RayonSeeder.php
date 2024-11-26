<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rayon;

class RayonSeeder extends Seeder
{
    public function run()
    {
        $rayons = [
            'Sukasari - 1',
            'Sukasari - 2',
            'Cibedug - 1',
            'Cibedug - 2',
            'Wikrama - 1',
            'Wikrama - 2',
        ];

        foreach ($rayons as $rayon) {
            Rayon::create([
                'name' => $rayon,
            ]);
        }
    }
}
