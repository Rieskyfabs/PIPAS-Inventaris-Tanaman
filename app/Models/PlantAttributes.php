<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class PlantAttributes extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

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

    protected static function boot()
    {
        parent::boot();

        // Generate UUID for the primary key
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

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
