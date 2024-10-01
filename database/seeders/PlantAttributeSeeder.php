<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Benefit;
use App\Models\PlantAttributes;

class PlantAttributeSeeder extends Seeder
{
    public function run()
    {
        $tanamanPanganCategoryId = Category::where('name', 'Tanaman Pangan')->first()->id;
        $tanamanRempahCategoryId = Category::where('name', 'Tanaman Rempah')->first()->id;
        $tanamanIndustriCategoryId = Category::where('name', 'Tanaman Industri')->first()->id;
        $tanamanUmbiUmbianCategoryId = Category::where('name', 'Tanaman Umbi Umbian')->first()->id;

        $kesehatanBenefitId = Benefit::where('name', 'Kesehatan')->first()->id;
        $kecantikanBenefitId = Benefit::where('name', 'Kecantikan')->first()->id;
        $pengobatanBenefitId = Benefit::where('name', 'Pengobatan')->first()->id;
        $pemanisBenefitId = Benefit::where('name', 'Pemanis')->first()->id;
        $bumbuBenefitId = Benefit::where('name', 'Bumbu')->first()->id;

        $codes = [
            ['plant_code' => 'SR', 'name' => 'Sereh', 'scientific_name' => 'Curcuma longa', 'category_id' => $tanamanRempahCategoryId, 'benefit_id' => $kesehatanBenefitId, 'description' => 'Kode Tanaman Sereh', 'status' => 'active', 'type' => 'Herbal'],
            ['plant_code' => 'TL', 'name' => 'Tomat Lele', 'scientific_name' => 'Zingiber officinale', 'category_id' => $tanamanPanganCategoryId, 'benefit_id' => $pemanisBenefitId, 'description' => 'Kode Tanaman Tomat Lele', 'status' => 'active', 'type' => 'Sayuran'],
            ['plant_code' => 'AL', 'name' => 'Aloe Vera', 'scientific_name' => 'Ocimum basilicum', 'category_id' => $tanamanRempahCategoryId, 'benefit_id' => $kesehatanBenefitId, 'description' => 'Kode Tanaman Aloe Vera', 'status' => 'active', 'type' => 'Herbal'],
            ['plant_code' => 'FT', 'name' => 'Fittonia', 'scientific_name' => 'Amaranthus spinosus', 'category_id' => $tanamanPanganCategoryId, 'benefit_id' => $pengobatanBenefitId, 'description' => 'Kode Tanaman Fittonia', 'status' => 'active', 'type' => 'Sayuran'],
            ['plant_code' => 'BM', 'name' => 'Bayam', 'scientific_name' => 'Brassica rapa', 'category_id' => $tanamanUmbiUmbianCategoryId, 'benefit_id' => $bumbuBenefitId, 'description' => 'Kode Tanaman Bayam', 'status' => 'active', 'type' => 'Sayuran']
        ];

        foreach ($codes as $code) {
            PlantAttributes::create($code);
        }
    }
}
