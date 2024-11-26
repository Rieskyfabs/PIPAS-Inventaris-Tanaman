<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('id'); // Ambil ID dari route

        return [
            'name' => 'required|string|regex:/^[a-zA-Z\s\-\'\.]+$/|max:255',
            'nis' => 'required|digits:8|unique:students,nis,' . $id, // Abaikan validasi unik jika ID cocok
            'rombel_id' => 'required|uuid|exists:rombels,id',
            'rayon_id' => 'required|uuid|exists:rayons,id',
            'email' => 'required|email|unique:students,email,' . $id, // Abaikan validasi unik jika ID cocok
            'gender' => 'required|in:laki-laki,perempuan',
        ];
    }

    public function messages()
    {
        return [
            // General errors
            'required' => 'Field :attribute wajib diisi.',

            // Name validation
            'name.required' => 'Nama siswa wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.regex' => 'Nama hanya boleh terdiri dari huruf dan spasi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            // NIS validation
            'nis.required' => 'NIS wajib diisi.',
            'nis.digits' => 'NIS harus terdiri dari 8 angka.',
            'nis.unique' => 'NIS sudah digunakan oleh siswa lain, masukkan NIS lain.',

            // Rombel validation
            'rombel_id.required' => 'Rombel wajib dipilih.',
            'rombel_id.uuid' => 'Rombel ID harus berupa UUID yang valid.',
            'rombel_id.exists' => 'Rombel tidak ditemukan dalam database.',

            // Rayon validation
            'rayon_id.required' => 'Rayon wajib dipilih.',
            'rayon_id.uuid' => 'Rayon ID harus berupa UUID yang valid.',
            'rayon_id.exists' => 'Rayon tidak ditemukan dalam database.',

            // Email validation
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh siswa lain.',

            // Gender validation
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin harus salah satu dari: laki-laki, perempuan.',
        ];
    }
}
