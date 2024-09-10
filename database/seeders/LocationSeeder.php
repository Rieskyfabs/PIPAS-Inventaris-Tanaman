<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::create(['name' => 'Rooftop']);
        Location::create(['name' => 'GreenRoof']);
        Location::create(['name' => 'Depan Lab DKV']);
        Location::create(['name' => 'Pendopo']);
    }
}
