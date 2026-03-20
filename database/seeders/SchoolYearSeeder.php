<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolYear;
use App\Enums\SchoolYearStatus;

class SchoolYearSeeder extends Seeder
{
    public function run(): void
    {
        $years = [
            [
                'start_date' => '2024',
                'end_date'   => '2025',
                'status'     => SchoolYearStatus::Inactive,
            ],
            [
                'start_date' => '2025',
                'end_date'   => '2026',
                'status'     => SchoolYearStatus::Active,
            ],
        ];

        foreach ($years as $year) {
            SchoolYear::updateOrCreate(
                ['start_date' => $year['start_date']],
                $year
            );
        }
    }
}
