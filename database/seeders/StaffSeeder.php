<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = [
            ['name' => 'Варнавский Иван', 'initials' => 'ВИ', 'position' => 'Слесарь-электрик'],
            ['name' => 'Мукосеев Евгений', 'initials' => 'МЕ', 'position' => 'Слесарь-электрик'],
            ['name' => 'Харченко Николай', 'initials' => 'ХН', 'position' => 'Слесарь-электрик'],
            ['name' => 'Попов Михаил', 'initials' => 'ПМ', 'position' => 'Инженер-энергетик'],
            ['name' => 'Мишурняев Дмитрий', 'initials' => 'МД', 'position' => 'Инженер-энергетик'],
            ['name' => 'Седько Александр', 'initials' => 'СА', 'position' => 'Инженер-энергетик'],
            ['name' => 'Репкин Владимир', 'initials' => 'РВ', 'position' => 'Инженер-энергетик'],
            ['name' => 'Атаманов Максим', 'initials' => 'АМ', 'position' => 'Инженер-энергетик'],
            ['name' => 'Колтунов Алексей', 'initials' => 'КА', 'position' => 'Мастер участка'],
        ];

        foreach ($staff as $employee) {
            Staff::updateOrCreate(
                ['name' => $employee['name']],
                [
                    'initials' => $employee['initials'],
                    'position' => $employee['position'],
                    'department' => 'ОГЭ',
                    'is_active' => true,
                ],
            );
        }
    }
}
