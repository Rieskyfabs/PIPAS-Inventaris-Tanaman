<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'scientific_name',
        'type',
        'qr_code',
        'category_id',
        'quantity',
        'benefit_id',
        'location_id',
        'status',
        'seeding_date',
        'harvest_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = ucfirst(strtolower($value)); // Memastikan format yang konsisten
    }
}


