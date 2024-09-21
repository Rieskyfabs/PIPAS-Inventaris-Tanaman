<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil role id dari role yang sudah ada atau buat role baru jika belum ada
        $role = Role::inRandomOrder()->first();

        return [
            'username' => $this->faker->unique()->userName(), // Username yang unik
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Hashing password
            'remember_token' => Str::random(10),
            'role_id' => $role ? $role->id : Role::factory(), // Menggunakan role_id yang ada atau membuat role baru
            'status' => $this->faker->randomElement(['active', 'inactive']), // Status acak
        ];
    }

    /**
     * State for admin user.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            // Jika ingin mengatur role_id khusus untuk admin
            $adminRole = Role::firstOrCreate(['name' => 'admin']);

            return [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // Password tetap
                'role_id' => $adminRole->id,
                'status' => 'active', // Admin biasanya aktif
            ];
        });
    }

    /**
     * State for normal user.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function normalUser()
    {
        return $this->state(function (array $attributes) {
            // Jika ingin mengatur role_id khusus untuk user biasa
            $userRole = Role::firstOrCreate(['name' => 'user']);

            return [
                'username' => $this->faker->unique()->userName(),
                'email' => $this->faker->unique()->safeEmail(),
                'password' => Hash::make('password'), // Password tetap
                'role_id' => $userRole->id,
                'status' => $this->faker->randomElement(['active', 'inactive']),
            ];
        });
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
