<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantCode extends Model
{
    use HasFactory;

    protected $table = 'plant_codes';

    protected $fillable = [
        'plant_code',
        'description'
    ];

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}

