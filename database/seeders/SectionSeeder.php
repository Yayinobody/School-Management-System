<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Term;
use App\Models\Room;
use Illuminate\Database\Seeder;
use App\Enums\SectionStatus;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $terms = Term::all();
        $rooms = Room::all();

        if ($subjects->isEmpty()) {
            $this->command->info('No subjects found.');
            return;
        }

        $timeSlots = [
            ['08:00:00', '09:30:00'],
            ['09:30:00', '11:00:00'],
            ['13:00:00', '14:30:00'],
            ['14:30:00', '16:00:00'],
        ];

        foreach ($subjects as $subject) {

            for ($i = 1; $i <= 2; $i++) {

                $time = $timeSlots[array_rand($timeSlots)];

                Section::updateOrCreate(
                    [
                        'subject_id' => $subject->id,
                        'section_code' => $subject->code . '-' . $i,
                    ],
                    [
                        'teacher_id' => $teachers->isNotEmpty()
                            ? $teachers->random()->id
                            : null,

                        'room_id' => $rooms->isNotEmpty()
                            ? $rooms->random()->id
                            : null,

                        'term_id' => $terms->isNotEmpty()
                            ? $terms->random()->id
                            : null,

                        'time_start' => $time[0],
                        'time_end'   => $time[1],

                        'max_slots' => 40,

                        'status' => SectionStatus::Available->value,
                    ]
                );
            }
        }
    }
}
