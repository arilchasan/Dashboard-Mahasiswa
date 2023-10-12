<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
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
            'gender' => fake()->randomElement(['Male', 'Female']),
            'phone' => '08' . fake()->numberBetween(1000000000, 9999999999),
            'address' => fake()->address(),
            'age' => fake()->numberBetween(18, 30),
            'jurusans_id' => fake()->numberBetween(1, 4),
        ];
    }
}
