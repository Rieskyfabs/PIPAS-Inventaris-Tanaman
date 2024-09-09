<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Benefit;

class BenefitSeeder extends Seeder
{
    public function run()
    {
        Benefit::create(['description' => 'Kesehatan']);
        Benefit::create(['description' => 'Kecantikan']);
        Benefit::create(['description' => 'Pengobatan']);
        Benefit::create(['description' => 'Pemanis']);
        Benefit::create(['description' => 'Bumbu']);
    }
}
