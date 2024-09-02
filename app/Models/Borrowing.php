<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id',
        'user_id',
        'borrowed_at',
        'return_due',
        'returned_at',
    ];

    /**
     * Mendapatkan tanaman yang dipinjam.
     */
    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    /**
     * Mendapatkan pengguna yang meminjam.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

