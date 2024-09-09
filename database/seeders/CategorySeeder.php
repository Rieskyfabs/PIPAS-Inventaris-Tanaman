<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Tanaman Pangan']);
        Category::create(['name' => 'Tanaman Rempah']);
        Category::create(['name' => 'Tanaman Industri']);
        Category::create(['name' => 'Tanaman Umbi Umbian']);
    }
}
