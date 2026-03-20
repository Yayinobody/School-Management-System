<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Program;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $bsit = Program::where('code', 'BSInT')->first();
        $bscs = Program::where('code', 'BSCS')->first();

        DB::table('subjects')->insert([

            [
                'program_id' => $bsit->id,
                'code' => 'IT101',
                'title' => 'Introduction to Computing',
                'description' => 'Fundamentals of computer systems and IT concepts',
                'lecture' => 3,
                'lab' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_id' => $bsit->id,
                'code' => 'IT102',
                'title' => 'Computer Programming 1',
                'description' => 'Basic programming concepts using a high-level language',
                'lecture' => 3,
                'lab' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_id' => $bsit->id,
                'code' => 'IT201',
                'title' => 'Database Systems',
                'description' => 'Database design and SQL fundamentals',
                'lecture' => 3,
                'lab' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'program_id' => $bscs->id,
                'code' => 'CS101',
                'title' => 'Discrete Structures',
                'description' => 'Mathematical foundations for computer science',
                'lecture' => 3,
                'lab' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_id' => $bscs->id,
                'code' => 'CS102',
                'title' => 'Data Structures',
                'description' => 'Study of algorithms and data organization',
                'lecture' => 3,
                'lab' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_id' => $bscs->id,
                'code' => 'CS201',
                'title' => 'Operating Systems',
                'description' => 'Concepts of process management and system resources',
                'lecture' => 3,
                'lab' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
