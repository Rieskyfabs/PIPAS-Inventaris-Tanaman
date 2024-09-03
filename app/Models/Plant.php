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
        'barcode',
        'category_id',
        'location',
        'quantity',
        'benefit_id',
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

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = ucfirst(strtolower($value)); // Memastikan format yang konsisten
    }
}


