<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $studentRole = Role::where('name', 'student')->first();
        $teacherRole = Role::where('name', 'teacher')->first();
        $adminRole = Role::where('name', 'admin')->first();

        $usedStudentNumbers = [];
        $usedEmployeeNumbers = [];

        User::factory(50)->create()->each(function ($user) use (
            $studentRole,
            $teacherRole,
            &$usedStudentNumbers,
            &$usedEmployeeNumbers
        ) {

            $isStudent = rand(1, 100) > 10;

            if ($isStudent) {

                $user->assignRole($studentRole);

                do {
                    $studentNumber = (string) rand(202300000, 202399999);
                } while (in_array($studentNumber, $usedStudentNumbers));

                $usedStudentNumbers[] = $studentNumber;

                $hasUser = rand(1, 100) > 30;

                Student::create([
                    'user_id' => $hasUser ? $user->id : null,
                    'fname' => $user->name,
                    'mname' => 'MiddleName',
                    'lname' => 'LastName',
                    'gender' => 'male',
                    'student_number' => $studentNumber,
                    'year_level' => rand(1, 5),
                    'birthday' => '2004-01-01',
                ]);

            } else {

                $user->assignRole($teacherRole);

                // 9–10 digit employee number
                do {
                    $employeeNumber = (string) rand(100000000, 999999999);
                } while (in_array($employeeNumber, $usedEmployeeNumbers));

                $usedEmployeeNumbers[] = $employeeNumber;

                Teacher::create([
                    'user_id' => $user->id,
                    'program_id' => 1,
                    'fname' => $user->name,
                    'mname' => 'MiddleName',
                    'lname' => 'LastName',
                    'gender' => 'female',
                    'employee_number' => $employeeNumber,
                    'birthday' => '1990-01-01',
                ]);
            }
        });

        // ADMIN
        $admin = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
        ]);

        $admin->assignRole('admin');

        Teacher::create([
            'user_id' => $admin->id,
            'program_id' => 1,
            'fname' => $admin->name,
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'gender' => 'male',
            'employee_number' => (string) rand(100000000, 999999999),
            'birthday' => '1985-01-01',
        ]);
    }
}
