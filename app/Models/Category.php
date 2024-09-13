<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    // Relasi dengan Plant
    public function plants()
    {
        return $this->hasMany(Plant::class);
    }

    public function plantCodes()
    {
        return $this->hasMany(PlantCode::class);
    }
}

