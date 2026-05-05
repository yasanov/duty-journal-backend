<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Staff>
 */
class StaffFactory extends Factory
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
            'name' => $name,
            'initials' => collect(explode(' ', $name))
                ->map(fn (string $part): string => mb_substr($part, 0, 1))
                ->take(2)
                ->implode(''),
            'position' => fake()->jobTitle(),
            'department' => fake()->randomElement(['OGE', 'Operations', 'Maintenance']),
            'is_active' => true,
        ];
    }
}
