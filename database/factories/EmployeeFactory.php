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
    public function definition(): array
    {
        return [
            'First_Name' => fake()->firstName(),
            'Last_Name' => fake()->lastName(),
            'company_id' => rand(1,100),
            'Email' => fake()->email(),
            'Phone' => fake()->phoneNumber()
        ];
    }
}
