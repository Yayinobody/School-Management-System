<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolYear;

class SchoolYearSeeder extends Seeder
{
    public function run(): void
    {
        SchoolYear::create([
            'start_date' => '2025',
            'end_date' => '2026',
            'status' => \App\Enums\SchoolYearStatus::Active,
        ]);
    }
}
