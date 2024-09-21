<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Benefit;

class BenefitSeeder extends Seeder
{
    public function run()
    {
        Benefit::create(['name' => 'Kesehatan']);
        Benefit::create(['name' => 'Kecantikan']);
        Benefit::create(['name' => 'Pengobatan']);
        Benefit::create(['name' => 'Pemanis']);
        Benefit::create(['name' => 'Bumbu']);
    }
}
