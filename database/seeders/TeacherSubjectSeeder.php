<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class TeacherSubjectSeeder extends Seeder
{
    /**
        * Run the database seeds.
        */
       public function run(): void
       {
           // Get all teachers and subjects
           $teachers = Teacher::all();
           $subjects = Subject::all();

           if ($teachers->isEmpty() || $subjects->isEmpty()) {
               $this->command->info('No teachers or subjects to assign.');
               return;
           }

           // Loop through each teacher and assign random subjects
           foreach ($teachers as $teacher) {
               // Pick 3 random subjects for this teacher (adjust number as needed)
               $randomSubjects = $subjects->random(min(3, $subjects->count()))->pluck('id')->toArray();

               // Attach subjects to teacher, avoid duplicates
               $teacher->subjects()->syncWithoutDetaching($randomSubjects);
           }

       }
}
