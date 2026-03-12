<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
        [
            'department_id' => 1,
            'code'=> 'BSBio',
            'title'=> 'Bachelor of Science in Biology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 1,
            'code'=> 'BSChem',
            'title'=> 'Bachelor of Science in Chemistry',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 1,
            'code'=> 'BSCS',
            'title'=> 'Bachelor of Science in Computer Science',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 1,
            'code'=> 'BSGeol',
            'title'=> 'Bachelor of Science in Geology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 1,
            'code'=> 'BSInT',
            'title'=> 'Bachelor of Science in Information Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 1,
            'code'=> 'BMCom',
            'title'=> 'Bachelor of Mass Communication',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 1,
            'code'=> 'BSMath',
            'title'=> 'Bachelor of Science in Mathematics',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 1,
            'code'=> 'BSPsych',
            'title'=> 'Bachelor of Science in Psychology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 2,
            'code'=> 'BSFor',
            'title'=> 'Bachelor of Science in Forestry',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 2,
            'code'=> 'BSAgri',
            'title'=> 'Bachelor of Science in Agriculture (Major in Agronomy, Horticulture, Animal Science, Agricultural Extension)',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 3,
            'code'=> 'BSAcc',
            'title'=> 'Bachelor of Science in Accountancy',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 3,
            'code'=> 'BSBA',
            'title'=> 'Bachelor of Science in Business Administration(Major in Human Resource Development Management, Financial Management)',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 3,
            'code'=> 'BSOSM',
            'title'=> 'Bachelor of Science in Office Systems Management',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 4,
            'code'=> 'BSCrim',
            'title'=> 'Bachelor of Science in Criminology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 5,
            'code'=> 'BSArch',
            'title'=> 'Bachelor of Science in Architecture',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 5,
            'code'=> 'BSCE',
            'title'=> 'Bachelor of Science in Civil Engineering',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 5,
            'code'=> 'BSCompE',
            'title'=> 'Bachelor of Science in Computer Engineering ',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 5,
            'code'=> 'BSECE',
            'title'=> 'Bachelor of Science Electronics and Communication Engineering ',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 5,
            'code'=> 'BSGeodE',
            'title'=> 'Bachelor of Science in Geodetic Engineering',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 5,
            'code'=> 'BSGeotE',
            'title'=> 'Bachelor of Science in Geothermal Engineering',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 5,
            'code'=> 'BSME',
            'title'=> 'Bachelor of Science in Mechanical Engineering',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSAT',
            'title' => 'Bachelor of Science in Automotive Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSAM',
            'title' => 'Bachelor of Science in Aviation Maintenance',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSCT',
            'title' => 'Bachelor of Science in Civil Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSCET',
            'title' => 'Bachelor of Science in Computer and Electronics Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSET',
            'title' => 'Bachelor of Science in Electrical Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSFT',
            'title' => 'Bachelor of Science in Food Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSIT',
            'title' => 'Bachelor of Science in Industrial Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSMT',
            'title' => 'Bachelor of Science in Mechanical Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 6,
            'code' => 'BSRACT',
            'title' => 'Bachelor of Science in Refrigeration and Air-Conditioning Technology',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 7,
            'code' => 'BSNur',
            'title' => 'Bachelor of Science in Nursing',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 7,
            'code' => 'BSPhar',
            'title' => 'Bachelor of Science in Pharmacy',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 7,
            'code' => 'MID',
            'title' => 'Midwifery',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 7,
            'code' => 'AMDNA',
            'title' => 'Associate in Midwifery and Nursing Assistant (AMDNA)',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 8,
            'code' => 'BSEE',
            'title' => 'Bachelor of Science in Elementary Education',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 8,
            'code' => 'BSSE',
            'title' => 'Bachelor of Science in Secondary Education',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 9,
            'code' => 'BSHM',
            'title' => 'Bachelor of Science in Hospitality Management',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 9,
            'code' => 'BSTM',
            'title' => 'Bachelor of Science in Tourism Management',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 9,
            'code' => 'BSTour',
            'title' => 'Bachelor of Science in Tourism',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'department_id' => 10,
            'code' => 'BOL',
            'title' => 'Bachelor of Law',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }
}
