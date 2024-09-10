<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Rooftop', 'GreenRoof', 'Depan Lab DKV', 'Pendopo']),
        ];
    }
}
