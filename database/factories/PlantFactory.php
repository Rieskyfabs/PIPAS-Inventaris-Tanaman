<?php

namespace Database\Factories;

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
        // Pilih nama dan nama ilmiah tanaman secara acak dari daftar
        $plant = $this->faker->randomElement($this->plants);

        // Tentukan tanggal tanam dan panen
        $seedingDate = $this->faker->dateTimeBetween('-1 months', 'now');
        $harvestDate = Carbon::parse($seedingDate)->addDays(90); // Misal panen setelah 90 hari

        // Ambil lokasi secara acak, atau fallback ke default jika tidak ada
        $location = Location::inRandomOrder()->first();
        if (!$location) {
            throw new ModelNotFoundException('No location found.');
        }

        // Ambil ID kategori dan benefit yang ada secara acak
        $categoryId = Category::inRandomOrder()->first()->id ?? null;
        $benefitId = Benefit::inRandomOrder()->first()->id ?? null;

        // Buat instance model dan simpan langsung ke database
        $plantModel = Plant::create([
            'name' => $plant['name'],
            'scientific_name' => $plant['scientific_name'],
            'type' => $this->faker->randomElement(['Herbal', 'Sayuran']),
            'category_id' => $categoryId,
            'location_id' => $location->id,
            'quantity' => $this->faker->numberBetween(1, 40),
            'benefit_id' => $benefitId,
            'status' => $this->faker->randomElement(['sehat', 'baik', 'layu', 'sakit']),
            'seeding_date' => $seedingDate,
            'harvest_date' => $harvestDate,
        ]);

        // Generate URL untuk halaman detail tanaman
        $qrCodeUrl = URL::route('plants.show', ['id' => $plantModel->id]);

        // Create QR code instance with custom size
        $qrCode = new QrCode($qrCodeUrl);
        $qrCode->setSize(50); // Set QR code size to 100x100 pixels
        $writer = new PngWriter();

        // Generate QR code as PNG
        $qrCodeFileName = 'qrcodes/' . $plantModel->id . '.png';
        $qrCodeImage = $writer->write($qrCode)->getString();

        // Save the QR code image to storage
        if (Storage::disk('public')->put($qrCodeFileName, $qrCodeImage)) {
            // Update QR code path in the database
            $plantModel->update([
                'qr_code' => $qrCodeFileName,
            ]);
        } else {
            // Handle error in saving QR code
            throw new \Exception('Failed to store QR code image.');
        }

        return $plantModel->toArray();
    }
}
