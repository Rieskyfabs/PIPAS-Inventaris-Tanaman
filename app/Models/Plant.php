<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_code_id',
        'plant_name_id',
        'plant_scientific_name_id',
        'type',
        'qr_code',
        'category_id',
        // 'quantity',
        'benefit_id',
        'location_id',
        'status',
        'seeding_date',
        'harvest_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function benefit()
    {
        return $this->belongsTo(Benefit::class, 'benefit_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function plantCode()
    {
        return $this->belongsTo(PlantCode::class, 'plant_code_id', 'id');
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = ucfirst(strtolower($value)); // Memastikan format yang konsisten
    }
}


