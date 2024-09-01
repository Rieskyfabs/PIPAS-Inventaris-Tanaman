<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data untuk di-seed
        $students = [
            [
                'nis' => 122456789,
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'rayon' => 'Rayon 1',
                'rombel' => 'Rombel A',
                'gender' => 'laki-laki',
            ],
            [
                'nis' => 987654321,
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@example.com',
                'rayon' => 'Rayon 2',
                'rombel' => 'Rombel B',
                'gender' => 'perempuan',
            ],
            // Tambahkan data lainnya jika diperlukan
        ];

        // Insert data ke dalam tabel students
        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
