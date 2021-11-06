<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class EmployeeFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->unique()->numerify('############'),
            'email' => $this->faker->unique()->safeEmail(),
            'work_hours' => rand(1, 150),
            'hourly_rate' => rand(10, 20),
            'salary_type' => rand(1, 3),
            'salary'=> rand(1000, 1300),
            'department' => rand(1, 3),
        ];
    }
}
