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

        foreach ($subjects as $subject) {

            // create 2 sections per subject
            for ($i = 1; $i <= 2; $i++) {

                Section::create([
                    'subject_id' => $subject->id,

                    // assign random teacher if available
                    'teacher_id' => $teachers->isNotEmpty()
                        ? $teachers->random()->id
                        : null,

                    // assign random room if available
                    'room_id' => $rooms->isNotEmpty()
                        ? $rooms->random()->id
                        : null,

                    // assign random term
                    'term_id' => $terms->isNotEmpty()
                        ? $terms->random()->id
                        : null,

                    'section_code' => $subject->code . '-' . $i,

                    'time_start' => '08:00:00',
                    'time_end' => '09:30:00',

                    'max_slots' => 40,

                    'status' => SectionStatus::Available->value
                ]);
            }
        }

    }
}
