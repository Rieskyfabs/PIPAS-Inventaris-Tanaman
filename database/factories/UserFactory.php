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
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role_id' => $role ? $role->id : Role::factory()->create(['guard_name' => 'web'])->id,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }

    /**
     * State for Master.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

    public function master()
    {
        return $this->state(function (array $attributes) {
            $masterRole = Role::firstOrCreate(
                ['name' => 'master'],
                ['guard_name' => 'web']
            );

            return [
                'username' => 'master',
                'email' => 'master@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => $masterRole->id,
                'status' => 'active',
            ];
        });
    }

    /**
     * State for admin user.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

    public function admin()
    {
        return $this->state(function (array $attributes) {
            $adminRole = Role::firstOrCreate(
                ['name' => 'admin'],
                ['guard_name' => 'web']
            );

            return [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id,
                'status' => 'active',
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
            $userRole = Role::firstOrCreate(
                ['name' => 'user'],
                ['guard_name' => 'web']
            );

            return [
                'username' => 'Riesky Fabiansyah',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => $userRole->id,
                'status' => 'active',
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
