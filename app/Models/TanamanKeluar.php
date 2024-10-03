<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanamanKeluar extends Model
{
    use HasFactory;

    protected $table = 'tanaman_keluar';
    protected $fillable = [
        'plant_id',
        'kode_tanaman_keluar',
        'tanggal_keluar',
        'jumlah_keluar',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
