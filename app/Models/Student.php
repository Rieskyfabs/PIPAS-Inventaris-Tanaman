<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'email',
        'rayon',
        'rombel',
        'gender'
    ];

    public static function rules()
    {
        return [
            'nis' => 'required|numeric|unique:students,nis',
            'name' => 'required|string|regex:/^[\pL\s]+$/u', // Hanya huruf dan spasi yang diizinkan
            'email' => 'required|email|unique:students,email',
            'rayon' => 'required|string',
            'rombel' => 'required|string',
            'gender' => 'required|in:laki-laki,perempuan',
            'scheduled' => 'required|boolean',
        ];
    }

    public static function messages()
    {
        return [
            'nis.required' => 'NIS wajib diisi.',
            'nis.numeric' => 'NIS harus berupa angka.',
            'nis.unique' => 'NIS sudah terdaftar.',
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'rayon.required' => 'Rayon wajib diisi.',
            'rombel.required' => 'Rombel wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.in' => 'Jenis kelamin harus "laki-laki" atau "perempuan".',
            'scheduled.required' => 'Status penjadwalan wajib diisi.',
        ];
    }
}
