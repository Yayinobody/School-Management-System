<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Section;
use App\Models\SubjectEnrollment;

class SubjectEnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $sections = Section::all(); // All available sections

        foreach ($students as $student) {
            // randomly enroll the student in 3-5 sections
            $randomSections = $sections->random(rand(3, 5));

            foreach ($randomSections as $section) {
                SubjectEnrollment::create([
                    'student_id' => $student->id,
                    'section_id' => $section->id,
                    'status' => 'enrolled',
                ]);
            }
        }
    }
}
