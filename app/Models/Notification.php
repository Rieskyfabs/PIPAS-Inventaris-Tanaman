<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Notification extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['plant_id', 'title', 'message', 'is_read', 'user_id']; // Tambahkan user_id

    protected static function boot()
    {
        parent::boot();

        // Generate UUID for the primary key
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi dengan User
    }
}
