<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate UUID for the primary key
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
