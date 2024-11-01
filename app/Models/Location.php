<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Location extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate UUID for the 'id' attribute
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}
