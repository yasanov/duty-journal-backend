<?php

namespace Database\Factories;

use App\Models\Birthday;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Birthday>
 */
class BirthdayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->name();

        return [
            'staff_id' => Staff::factory(),
            'name' => $name,
            'birth_date' => fake()->dateTimeBetween('-65 years', '-20 years')->format('Y-m-d'),
            'position' => fake()->jobTitle(),
            'department' => fake()->randomElement(['OGE', 'Operations', 'Maintenance']),
        ];
    }
}
