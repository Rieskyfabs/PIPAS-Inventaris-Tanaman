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
        // Get category IDs based on category names
        $tanamanPanganCategoryId = Category::where('name', 'Tanaman Pangan')->first()->id;
        $tanamanRempahCategoryId = Category::where('name', 'Tanaman Rempah')->first()->id;
        $tanamanIndustriCategoryId = Category::where('name', 'Tanaman Industri')->first()->id;
        $tanamanUmbiUmbianCategoryId = Category::where('name', 'Tanaman Umbi Umbian')->first()->id;

        // Get all types from the tipe_tanaman table
        $tipeTanaman = TipeTanaman::all()->keyBy('name');

        // Retrieve the type IDs using their names
        $herbalTypeId = $tipeTanaman['Herbal']->id ?? null;
        $sayuranTypeId = $tipeTanaman['Sayuran']->id ?? null;
        $hiasTypeId = $tipeTanaman['Hias']->id ?? null;

        // Check if the types were found
        if (!$herbalTypeId) {
            throw new \Exception("Type 'Herbal' not found in tipe_tanaman table.");
        }

        if (!$sayuranTypeId) {
            throw new \Exception("Type 'Sayuran' not found in tipe_tanaman table.");
        }

        if (!$hiasTypeId) {
            throw new \Exception("Type 'Hias' not found in tipe_tanaman table.");
        }

        // Plant data
        $codes = [
            [
                'plant_code' => 'SR-CCALGA',
                'name' => 'Sereh',
                'scientific_name' => 'Curcuma longa',
                'category_id' => $tanamanRempahCategoryId,
                'benefit' => 'Mendukung kesehatan, mencerahkan kulit dan mencegah kanker prostat.',
                'description' => 'Kode Tanaman Sereh',
                'status' => 'active',
                'type_id' => $herbalTypeId
            ],
            [
                'plant_code' => 'TL-ZGBROE',
                'name' => 'Tomat Lele',
                'scientific_name' => 'Zingiber officinale',
                'category_id' => $tanamanPanganCategoryId,
                'benefit' => 'Mencerahkan kulit mencegah obesitas, mengandung vitamin b12 dan k12, dn baik untuk kesehatan lambung',
                'description' => 'Kode Tanaman Tomat Lele',
                'status' => 'active',
                'type_id' => $sayuranTypeId
            ],
            [
                'plant_code' => 'KK-KNGKNG',
                'name' => 'Kangkung',
                'scientific_name' => 'Kangkung Megalodon',
                'category_id' => $tanamanUmbiUmbianCategoryId,
                'benefit' => 'Mencerahkan kulit mencegah obesitas, mengandung vitamin b12 dan k12, dn baik untuk kesehatan lambung',
                'description' => 'Kode Tanaman Kangkung',
                'status' => 'active',
                'type_id' => $sayuranTypeId
            ],
            [
                'plant_code' => 'UT-UMITNH',
                'name' => 'Umbi Tanah',
                'scientific_name' => 'Kacang Plant-zombie',
                'category_id' => $tanamanIndustriCategoryId,
                'benefit' => 'Mencerahkan kulit mencegah obesitas, mengandung vitamin b12 dan k12, dn baik untuk kesehatan lambung',
                'description' => 'Kode Tanaman Umbi Tanah',
                'status' => 'active',
                'type_id' => $sayuranTypeId
            ],
            [
                'plant_code' => 'BN-BUBNGS',
                'name' => 'Bunga Anggrek',
                'scientific_name' => 'Orchidaceae',
                'category_id' => $tanamanUmbiUmbianCategoryId,
                'benefit' => 'Mempercantik ruang, membantu menjaga kelembaban udara, dan mengurangi stres.',
                'description' => 'Kode Tanaman Bunga Anggrek',
                'status' => 'active',
                'type_id' => $hiasTypeId
            ],
            [
                'plant_code' => 'AT-ALPKID',
                'name' => 'Alpukat',
                'scientific_name' => 'Persea americana',
                'category_id' => $tanamanPanganCategoryId,
                'benefit' => 'Menyehatkan jantung, mengurangi kolesterol, dan baik untuk kulit.',
                'description' => 'Kode Tanaman Alpukat',
                'status' => 'active',
                'type_id' => $herbalTypeId
            ],
            [
                'plant_code' => 'MP-MADRMA',
                'name' => 'Madu Rimba',
                'scientific_name' => 'Melipona beecheii',
                'category_id' => $tanamanIndustriCategoryId,
                'benefit' => 'Meningkatkan daya tahan tubuh, mempercepat penyembuhan luka, dan menurunkan tekanan darah.',
                'description' => 'Kode Tanaman Madu Rimba',
                'status' => 'active',
                'type_id' => $herbalTypeId
            ],
            [
                'plant_code' => 'PC-PANSEK',
                'name' => 'Pandan Wangi',
                'scientific_name' => 'Pandanus amaryllifolius',
                'category_id' => $tanamanRempahCategoryId,
                'benefit' => 'Mendukung pencernaan, menyegarkan udara, dan meningkatkan cita rasa masakan.',
                'description' => 'Kode Tanaman Pandan Wangi',
                'status' => 'active',
                'type_id' => $herbalTypeId
            ],
            [
                'plant_code' => 'JP-JAMBU',
                'name' => 'Jambu Air',
                'scientific_name' => 'Syzygium aqueum',
                'category_id' => $tanamanPanganCategoryId,
                'benefit' => 'Meningkatkan imunitas tubuh, menjaga keseimbangan cairan tubuh, dan mengandung vitamin C.',
                'description' => 'Kode Tanaman Jambu Air',
                'status' => 'active',
                'type_id' => $herbalTypeId
            ],
            [
                'plant_code' => 'LC-LAMULE',
                'name' => 'Lambung Kuda',
                'scientific_name' => 'Aristolochia debilis',
                'category_id' => $tanamanUmbiUmbianCategoryId,
                'benefit' => 'Memperindah taman, dapat digunakan dalam pengobatan tradisional.',
                'description' => 'Kode Tanaman Lambung Kuda',
                'status' => 'active',
                'type_id' => $hiasTypeId
            ],
        ];

        // Insert the plant data into the PlantAttributes table
        foreach ($codes as $code) {
            PlantAttributes::create($code);
        }
    }
}
