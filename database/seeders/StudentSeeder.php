<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Rayon;
use App\Models\Rombel;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Mengambil data Rayon dan Rombel yang sudah ada
        $rayons = Rayon::all();
        $rombels = Rombel::all();

        foreach (range(1, 50) as $index) { // Menambahkan 50 siswa contoh
            $nis = '122' . $faker->unique()->numerify('#####'); // NIS dimulai dengan 122 dan diikuti oleh 5 angka acak

            Student::create([
                'nis' => $nis,
                'name' => $faker->name(),
                'email' => strtolower($faker->firstName() . '.' . $faker->lastName() . '@smkwikrama.sch.id'), // Format email dengan domain @smkwikrama.sch.id
                'rombel_id' => $rombels->random()->id, // Mengambil random rombel_id
                'rayon_id' => $rayons->random()->id, // Mengambil random rayon_id
                'gender' => $faker->randomElement(['laki-laki', 'perempuan']), // Gender acak
            ]);
        }
    }
}
