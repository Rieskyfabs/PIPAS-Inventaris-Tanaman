<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Borrowing;
use App\Models\Plant;
use App\Models\User;
use Carbon\Carbon;

class BorrowingFactory extends Factory
{
    protected $model = Borrowing::class;

    public function definition()
    {
        return [
            'plant_id' => Plant::factory(),
            'user_id' => User::factory(),
            'borrowed_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'return_due' => $this->faker->dateTimeBetween('now', '+30 days'),
            'returned_at' => $this->faker->optional()->dateTimeBetween('now', '+30 days'),
        ];
    }
}

