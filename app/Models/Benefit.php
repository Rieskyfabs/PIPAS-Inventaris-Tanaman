<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $table = 'benefits';

    protected $primaryKey = 'benefit_id';

    protected $fillable = [
        'name',
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

