<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CarFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'license_plate' => fake()->regexify('[A-Z0-9]{6}'),
            'make' => fake()->word(),
            'model' => fake()->word(),
            'price' => fake()->randomFloat(2, 1000, 100000),
            'mileage' => fake()->numberBetween(0, 1000000),
            'seats' => fake()->numberBetween(1, 10),
            'doors' => fake()->numberBetween(1, 5),
            'production_year' => fake()->numberBetween(1990, 2022),
            'weight' => fake()->numberBetween(500, 5000),
            'color' => fake()->colorName(),
            'image' => null,
            'sold_at' => fake()->optional($weight = 0.5, $default = null)->dateTimeBetween('-1 year', 'now'),
            'views' => fake()->numberBetween(0, 1000)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
