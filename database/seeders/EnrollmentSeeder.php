<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Program;
use App\Models\Enrollment;
use App\Models\Term;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $programs = Program::pluck('id');
        $term = Term::first();

        foreach ($students as $student) {
            Enrollment::create([
                'student_id' => $student->id,
                'program_id' => $programs->random(),
                'term_id' => $term->id,
                'status' => 'enrolled',
            ]);
        }
    }
}
