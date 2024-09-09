<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
use App\Models\Plant;
use App\Models\Benefit;
use App\Models\Category;
use Carbon\Carbon;

class PlantFactory extends Factory
{
    protected $model = Plant::class;

    // Daftar nama tanaman dan nama ilmiah
    protected $plants = [
        ['name' => 'Kunyit', 'scientific_name' => 'Curcuma longa'],
        ['name' => 'Jahe', 'scientific_name' => 'Zingiber officinale'],
        ['name' => 'Kemangi', 'scientific_name' => 'Ocimum basilicum'],
        ['name' => 'Bayam', 'scientific_name' => 'Amaranthus spinosus'],
        ['name' => 'Sawi', 'scientific_name' => 'Brassica rapa'],
        ['name' => 'Lengkuas', 'scientific_name' => 'Alpinia galanga'],
        ['name' => 'Kangkung', 'scientific_name' => 'Ipomoea aquatica'],
        ['name' => 'Seledri', 'scientific_name' => 'Apium graveolens'],
        ['name' => 'Daun Pandan', 'scientific_name' => 'Pandanus amaryllifolius'],
        ['name' => 'Tomat', 'scientific_name' => 'Solanum lycopersicum'],
    ];

    public function definition()
    {
        // Pilih nama dan nama ilmiah tanaman secara acak dari daftar
        $plant = $this->faker->randomElement($this->plants);

        // Tentukan tanggal tanam dan panen
        $seedingDate = $this->faker->dateTimeBetween('-1 months', 'now');
        $harvestDate = Carbon::parse($seedingDate)->addDays(90); // Misal panen setelah 90 hari

        // Pastikan ada data di tabel Location
        $location = Location::inRandomOrder()->first();
        $locationId = $location ? $location->id : null;

        // Ambil ID kategori dan benefit yang ada secara acak
        $categoryId = Category::inRandomOrder()->first()->id;
        $benefitId = Benefit::inRandomOrder()->first()->id;

        return [
            'name' => $plant['name'], // Nama tanaman dari daftar
            'scientific_name' => $plant['scientific_name'], // Nama ilmiah dari daftar
            'type' => $this->faker->randomElement(['Herbal', 'Sayuran']), // Hanya 'Herbal' atau 'Sayuran'
            'qr_code' => $this->faker->unique()->numerify('##########'),
            'category_id' => $categoryId, // Mengambil ID kategori yang ada
            'location_id' => $locationId, // Memilih lokasi secara acak berdasarkan ID
            'quantity' => $this->faker->numberBetween(1, 40), // Jumlah tanaman
            'benefit_id' => $benefitId, // Mengambil ID manfaat yang ada
            'status' => $this->faker->randomElement(['sehat', 'baik', 'layu', 'sakit']), // Status kesehatan tanaman
            'seeding_date' => $seedingDate,
            'harvest_date' => $harvestDate,
        ];
    }
}
