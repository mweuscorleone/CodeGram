<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'job_id' => fake()->randomNumber(1, 30),
            'resume' => fake()->randomElement(['Foundation in Coding', 'Specialized in Finance Management', 'I like to be Human resource manager']),
            'resume_score' => rand(1, 10),
            'location_score' => rand(1, 10),
            'final_score' => rand(1, 10)
        ];
    }
}
