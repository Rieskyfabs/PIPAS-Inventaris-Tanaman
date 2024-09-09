<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Category;
use App\Models\Benefit;
use App\Models\Plant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menjalankan seeder untuk Location, Category, Benefit, dan User
        $this->call([
            LocationSeeder::class,
            CategorySeeder::class,
            BenefitSeeder::class,
            UserSeeder::class,
        ]);

        // Mengisi tabel plants dengan 20 data dummy
        Plant::factory()->count(20)->create();
    }
}
