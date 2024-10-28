<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TanamanKeluar extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        // Generate UUID for the primary key
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
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
