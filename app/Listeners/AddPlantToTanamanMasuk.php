<?php

namespace App\Listeners;

use App\Events\PlantCreated;
use App\Models\TanamanMasuk;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class AddPlantToTanamanMasuk
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PlantCreated $event)
    {
        TanamanMasuk::create([
            'plant_id' => $event->plant->id,
            'kode_tanaman_masuk' => 'TM-' . strtoupper(Str::random(5)), // Membuat kode unik
            'tanggal_masuk' => now(),
            'jumlah_masuk' => $event->jumlahMasuk, // Menyimpan jumlah tanaman masuk
        ]);
    }
}
