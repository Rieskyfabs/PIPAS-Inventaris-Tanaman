<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plant extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'image',
        'plant_code_id',
        'plant_name_id',
        'plant_scientific_name_id',
        'type_id',
        'qr_code',
        'category_id',
        'benefit_id',
        'location_id',
        'status',
        'seeding_date',
        'harvest_date',
        'harvest_status',
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate UUID for the primary key
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
    
    public function isReadyToHarvest()
    {
        return Carbon::now()->greaterThanOrEqualTo($this->harvest_date);
    }

    public function plantType()
    {
        return $this->belongsTo(TipeTanaman::class, 'type_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function benefit()
    {
        return $this->belongsTo(PlantAttributes::class, 'benefit_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function plantAttribute()
    {
        return $this->belongsTo(PlantAttributes::class, 'plant_code_id', 'id');
    }

    public function tanamanMasuk()
    {
        return $this->hasOne(TanamanMasuk::class, 'plant_id'); // Sesuaikan nama kolom foreign key
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = ucfirst(strtolower($value)); // Memastikan format yang konsisten
    }
}


