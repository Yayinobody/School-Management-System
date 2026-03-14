<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;
use App\Models\SchoolYear;

class TermSeeder extends Seeder
{
    public function run(): void
    {
        $schoolYear = SchoolYear::first();

        Term::insert([
            [
                'school_year_id' => $schoolYear->id,
                'name' => '1st Semester',
                'start_date' => $schoolYear->start_date,
                'end_date' => $schoolYear->start_date->addMonths(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'school_year_id' => $schoolYear->id,
                'name' => '2nd Semester',
                'start_date' => $schoolYear->start_date->addMonths(6),
                'end_date' => $schoolYear->end_date,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
