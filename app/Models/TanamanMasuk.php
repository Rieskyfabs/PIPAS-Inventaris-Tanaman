<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanamanMasuk extends Model
{
    use HasFactory;

    protected $table = 'tanaman_masuk';
    protected $fillable = ['plant_id', 'kode_tanaman_masuk', 'tanggal_masuk', 'jumlah_masuk'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
