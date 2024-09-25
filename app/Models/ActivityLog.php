<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'action', 'description', 'performed_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plantCode()
    {
        return $this->belongsTo(PlantCode::class, 'plant_code_id', 'id');
    }

    protected $casts = [
        'performed_at' => 'datetime',
    ];
}
