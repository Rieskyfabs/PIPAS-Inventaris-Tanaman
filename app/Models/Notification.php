<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['plant_id', 'title', 'message', 'is_read'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
