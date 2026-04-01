<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([CollegeSeeder::class,
        ProgramSeeder::class,
        SubjectSeeder::class,
        RoleSeeder::class,
        UserSeeder::class,
        SchoolYearSeeder::class,
        TermSeeder::class,
        EnrollmentSeeder::class,
        TeacherSubjectSeeder::class,
        RoomSeeder::class,
        SectionSeeder::class,
        SubjectEnrollmentSeeder::class
        ]);
    }
}
