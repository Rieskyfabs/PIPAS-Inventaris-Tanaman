<?php

namespace App\Listeners;

use App\Events\PlantHarvested;
use App\Models\TanamanKeluar;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class AddPlantToTanamanKeluar
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
    public function handle(PlantHarvested $event)
    {
        TanamanKeluar::create([
            'plant_id' => $event->plant->id,
            'kode_tanaman_keluar' => 'TK-' . strtoupper(Str::random(5)), // Membuat kode unik
            'tanggal_keluar' => now(),
        ]);
    }
}
