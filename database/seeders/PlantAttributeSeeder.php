<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\PlantAttributes;
use App\Models\TipeTanaman;

class PlantAttributeSeeder extends Seeder
{
    public function run()
    {
        $tanamanPanganCategoryId = Category::where('name', 'Tanaman Pangan')->first()->id;
        $tanamanRempahCategoryId = Category::where('name', 'Tanaman Rempah')->first()->id;
        $tanamanIndustriCategoryId = Category::where('name', 'Tanaman Industri')->first()->id;
        $tanamanUmbiUmbianCategoryId = Category::where('name', 'Tanaman Umbi Umbian')->first()->id;

        // Get all types from the tipe_tanaman table
        $tipeTanaman = TipeTanaman::all()->keyBy('name');

        // Retrieve the type IDs using their names
        $herbalTypeId = $tipeTanaman['Herbal']->id ?? null;
        $sayuranTypeId = $tipeTanaman['Sayuran']->id ?? null;

        // Check if the types were found
        if (!$herbalTypeId) {
            throw new \Exception("Type 'Herbal' not found in tipe_tanaman table.");
        }

        if (!$sayuranTypeId) {
            throw new \Exception("Type 'Sayuran' not found in tipe_tanaman table.");
        }

        $codes = [
            [
                'plant_code' => 'SR-CCALGA',
                'name' => 'Sereh',
                'scientific_name' => 'Curcuma longa',
                'category_id' => $tanamanRempahCategoryId,
                'benefit' => 'Mendukung kesehatan',
                'description' => 'Kode Tanaman Sereh',
                'status' => 'active',
                'type_id' => $herbalTypeId // Use type_id here
            ],
            [
                'plant_code' => 'TL-ZGBRONE',
                'name' => 'Tomat Lele',
                'scientific_name' => 'Zingiber officinale',
                'category_id' => $tanamanPanganCategoryId,
                'benefit' => 'Pemanis alami',
                'description' => 'Kode Tanaman Tomat Lele',
                'status' => 'active',
                'type_id' => $sayuranTypeId // Use type_id here
            ],
            // Add the rest of the codes similarly
        ];

        foreach ($codes as $code) {
            PlantAttributes::create($code);
        }
    }
}
