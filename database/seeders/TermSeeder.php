<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;
use App\Models\SchoolYear;
use App\Enums\Semester;
use App\Enums\TermStatus;
use Carbon\Carbon;

class TermSeeder extends Seeder
{
    public function run(): void
    {
        $schoolYear = SchoolYear::first();

        Term::insert([
            [
                'school_year_id' => $schoolYear->id,
                'semester' => Semester::First->value,
                'start_date' => Carbon::parse('2025-08-18'),
                'end_date' => Carbon::parse('2025-12-20'),
                'status' => TermStatus::Inactive->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'school_year_id' => $schoolYear->id,
                'semester' => Semester::Second->value,
                'start_date' => Carbon::parse('2026-01-26'),
                'end_date' => Carbon::parse('2026-05-23'),
                'status' => TermStatus::Active->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'school_year_id' => $schoolYear->id,
                'semester' => Semester::Summer->value,
                'start_date' => Carbon::parse('2026-05-25'),
                'end_date' => Carbon::parse('2026-07-26'),
                'status' => TermStatus::Inactive->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
