<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat 10 pengguna dengan factory
        // User::factory(2)->create();

        // Membuat admin
        User::factory()->admin()->create();
        
        User::factory()->master()->create();

        // Membuat user
        User::factory()->normalUser()->create();


    }
}
