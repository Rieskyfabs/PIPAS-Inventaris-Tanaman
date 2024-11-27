<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Rayon extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name'];

    public function students()
    {
        return $this->hasMany(Student::class, 'rayon_id', 'id');
    }
}

