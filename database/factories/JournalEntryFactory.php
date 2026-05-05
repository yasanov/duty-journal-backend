<?php

namespace Database\Factories;

use App\Models\JournalEntry;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JournalEntry>
 */
class JournalEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $staff = Staff::factory();
        $entryDate = fake()->dateTimeBetween('-1 month', 'now');
        $eventType = fake()->randomElement(JournalEntry::TYPES);

        return [
            'entry_date' => $entryDate->format('Y-m-d'),
            'start_time' => fake()->time('H:i'),
            'end_time' => fake()->time('H:i'),
            'event_type' => $eventType,
            'event_text' => $eventType === JournalEntry::TYPE_INSPECTION
                ? 'Equipment inspection'
                : fake()->sentence(),
            'staff_id' => $staff,
            'staff_name' => fake()->name(),
            'inspection_readings' => $eventType === JournalEntry::TYPE_INSPECTION ? [
                'gasLow' => fake()->randomFloat(1, 0.5, 2.5),
                'gasMedium' => fake()->randomFloat(1, 2.5, 5.0),
                'gasHigh' => fake()->randomFloat(1, 5.0, 8.0),
                'dguTemp' => fake()->numberBetween(60, 90),
            ] : null,
            'occurred_at' => $entryDate,
        ];
    }
}
