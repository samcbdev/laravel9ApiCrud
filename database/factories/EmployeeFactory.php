<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name($gender = 'male'|'female'),
            'email' => $this->faker->email(),
            'age' => $this->faker->numberBetween(18, 65),
            'salary' => $this->faker->randomNumber(6, true),
        ];
    }
}
