<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\Vacation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vacation>
 */
class VacationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('now', '+6 months');
        $endDate = (clone $startDate)->modify('+'.fake()->numberBetween(7, 28).' days');

        return [
            'staff_id' => Staff::factory(),
            'type' => fake()->randomElement(Vacation::TYPES),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'comment' => fake()->optional()->sentence(),
        ];
    }
}
