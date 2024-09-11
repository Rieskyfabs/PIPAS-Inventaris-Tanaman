<?php

namespace Database\Factories;

use App\Models\PlantCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
use App\Models\Plant;
use App\Models\Benefit;
use App\Models\Category;
use Carbon\Carbon;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $plant = $this->faker->randomElement($this->plants);

        $seedingDate = $this->faker->dateTimeBetween('-1 months', 'now');
        $harvestDate = Carbon::parse($seedingDate)->addDays(90);

        // Pastikan ada data di tabel plant_codes
        $plantCode = PlantCode::inRandomOrder()->first();
        if (!$plantCode) {
            // Buat entri default jika tidak ada plant code
            $plantCode = PlantCode::create([
                'plant_code' => 'DEFAULT_CODE',
                'description' => 'Default Description' // Menambahkan deskripsi default
            ]);
        }

        // Ambil ID dari plant_code
        $plantCodeId = $plantCode->id;

        $location = Location::inRandomOrder()->first();
        $categoryId = Category::inRandomOrder()->first()->id ?? null;
        $benefitId = Benefit::inRandomOrder()->first()->id ?? null;

        $plantModel = Plant::create([
            'name' => $plant['name'],
            'plant_code_id' => $plantCodeId,
            'scientific_name' => $plant['scientific_name'],
            'type' => $this->faker->randomElement(['Herbal', 'Sayuran']),
            'category_id' => $categoryId,
            'location_id' => $location ? $location->id : null,
            'benefit_id' => $benefitId,
            'status' => $this->faker->randomElement(['sehat', 'baik', 'layu', 'sakit']),
            'seeding_date' => $seedingDate,
            'harvest_date' => $harvestDate,
        ]);

        $qrCodeUrl = URL::route('plants.show', ['id' => $plantModel->id]);

        $qrCode = new QrCode($qrCodeUrl);
        $qrCode->setSize(50); // Ukuran QR code bisa disesuaikan
        $writer = new PngWriter();

        $qrCodeFileName = 'qrcodes/' . $plantModel->id . '.png';
        $qrCodeImage = $writer->write($qrCode)->getString();

        if (Storage::disk('public')->put($qrCodeFileName, $qrCodeImage)) {
            $plantModel->update([
                'qr_code' => $qrCodeFileName,
            ]);
        } else {
            throw new \Exception('Failed to store QR code image.');
        }

        return $plantModel->toArray();
    }
}