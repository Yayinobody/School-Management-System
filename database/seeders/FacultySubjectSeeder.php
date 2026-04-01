<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class FacultySubjectSeeder extends Seeder
{
    /**
        * Run the database seeds.
        */
       public function run(): void
       {
           // Get all faculties and subjects
           $faculties = Faculty::all();
           $subjects = Subject::all();

           if ($faculties->isEmpty() || $subjects->isEmpty()) {
               $this->command->info('No faculties or subjects to assign.');
               return;
           }

           // Loop through each faculty and assign random subjects
           foreach ($faculties as $faculty) {
               // Pick 3 random subjects for this faculty (adjust number as needed)
               $randomSubjects = $subjects->random(min(3, $subjects->count()))->pluck('id')->toArray();

               // Attach subjects to faculty, avoid duplicates
               $faculty->subjects()->syncWithoutDetaching($randomSubjects);
           }

       }
}
