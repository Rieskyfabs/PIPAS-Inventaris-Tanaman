<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Benefit extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', // Tambahkan id ke dalam fillable
        'name',
        'status'
    ];

    public static function boot()
    {
        parent::boot();

        // Membuat UUID secara otomatis saat model baru dibuat
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    // Relasi dengan Plant
    public function plants()
    {
        return $this->hasMany(Plant::class);
    }

    public function plantAttributes()
    {
        return $this->hasMany(PlantAttributes::class);
    }
}
