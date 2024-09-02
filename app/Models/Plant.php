<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $table = 'plants';

    protected $primaryKey = 'plant_id';

    protected $fillable = [
        'name',
        'scientific_name',
        'type',
        'barcode',
        'category_id',
        'location',
        'quantity',
        'benefit_id',
    ];

    // Relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi dengan Benefit
    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }
}

