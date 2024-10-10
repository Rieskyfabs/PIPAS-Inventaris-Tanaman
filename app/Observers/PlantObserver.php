<?php

namespace App\Observers;

use App\Models\Plant;
use App\Models\TanamanKeluar;

class PlantObserver
{
    /**
     * Listen to the Plant updating event.
     *
     * @param  \App\Models\Plant  $plant
     * @return void
     */
    // public function updating(Plant $plant)
    // {
    //     // Cek apakah status panen berubah menjadi 'sudah dipanen'
    //     if ($plant->isDirty('harvest_status') && $plant->harvest_status == 'sudah dipanen') {
    //         // Buat entry baru di tabel tanaman_keluar
    //         TanamanKeluar::create([
    //             'plant_id' => $plant->id,
    //             'kode_tanaman_keluar' => 'TK-' . now()->timestamp, // Atau metode lain untuk generate kode unik
    //             'tanggal_keluar' => now(),
    //             'jumlah_keluar' => 1, // Atau field lain yang sesuai
    //         ]);
    //     }
    // }
    
    /**
     * Handle the Plant "created" event.
     */
    public function created(Plant $plant): void
    {
        //
    }

    /**
     * Handle the Plant "updated" event.
     */
    public function updated(Plant $plant): void
    {
        //
    }

    /**
     * Handle the Plant "deleted" event.
     */
    public function deleted(Plant $plant): void
    {
        //
    }

    /**
     * Handle the Plant "restored" event.
     */
    public function restored(Plant $plant): void
    {
        //
    }

    /**
     * Handle the Plant "force deleted" event.
     */
    public function forceDeleted(Plant $plant): void
    {
        //
    }
}
