<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_code',
        'name',
        'scientific_name',
        'type',
        'category_id',
        'benefit_id',
        'description',
        'status',
    ];

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function benefit()
    {
        return $this->belongsTo(Benefit::class, 'benefit_id', 'id');
    }
}

