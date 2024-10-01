<?php

namespace App\Models;

use Carbon\Carbon;
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
        'harvest_status',
    ];

    public function isReadyToHarvest()
    {
        return Carbon::now()->greaterThanOrEqualTo($this->harvest_date);
    }

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

    public function plantAttribute()
    {
        return $this->belongsTo(PlantAttributes::class, 'plant_code_id', 'id');
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = ucfirst(strtolower($value)); // Memastikan format yang konsisten
    }
}


