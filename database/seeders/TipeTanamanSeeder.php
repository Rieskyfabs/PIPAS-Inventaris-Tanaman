<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipeTanaman;

class TipeTanamanSeeder extends Seeder
{
    public function run()
    {
        // Define an array of plant types
        $types = [
            ['name' => 'Herbal'],
            ['name' => 'Sayuran'],
            ['name' => 'Hias'],
        ];

        // Insert each type into the database
        foreach ($types as $type) {
            TipeTanaman::create($type);
        }
    }
}
