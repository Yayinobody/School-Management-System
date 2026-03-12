<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'code' => 'CAS',
                'title' => 'College of Arts and Sciences',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CAFF',
                'title' => 'College of Agriculture, Forestry and Fishery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'=> 'CBA',
                'title' => 'College of Business Administration',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'=> 'CCJE',
                'title' => 'College of Criminal Justice Education',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CEA',
                'title' => 'College of Engineering and Architecture',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CIT',
                'title' => 'College of Industrial Technology',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CNPAHS',
                'title' => 'College of Nursing, Pharmacy and Allied Health Sciences',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CTE',
                'title' => 'College of Teacher Education',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'CTHM',
                'title' => 'College of Tourism and Hospitality Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SOL',
                'title' => 'School of Law',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ]);
    }
}
