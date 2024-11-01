<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TipeTanaman extends Model
{
    use HasFactory;

    protected $table = 'tipe_tanaman';
    public $incrementing = false; // UUID as primary key
    protected $keyType = 'string';

    protected $fillable = [
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate UUID for the primary key
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    // Define the relationship with Plant
    public function plants()
    {
        return $this->hasMany(Plant::class, 'type_id');
    }
}
