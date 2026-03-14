<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
    /**
     * Run the database seeds.
     */
        $studentRole = Role::where('name', 'student')->first();
        $teacherRole = Role::where('name', 'teacher')->first();
        $adminRole = Role::where('name', 'admin')->first();

        User::factory(50)->create()->each(function ($user) use ($studentRole, $teacherRole) {

            $isStudent = rand(1, 100) > 10;

            if ($isStudent) {
                $user->assignRole($studentRole);

                Student::create([
                    'user_id' => $user->id,
                    'fname' => $user->name,
                    'lname' => 'Student',
                    'gender'=> 'male',
                    'student_number' => '2024-' . rand(1000,9999),
                    'year_level' => rand(1,5),
                    'birthday' => '2004-01-01',
                ]);
            } else {
                $user->assignRole($teacherRole);

                Teacher::create([
                    'user_id' => $user->id,
                    'program_id' => 1,
                    'fname' => $user->name,
                    'lname' => 'Teacher',
                    'gender'=> 'female',
                    'employee_number' => 'EMP-' . rand(100,999),
                    'birthday' => '1990-01-01',
                ]);
            }
        });

        $admin = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
        ]);

        $admin->assignRole('admin');
        Teacher::create([
            'user_id' => $admin->id,
            'program_id' => 1,
            'fname' => $admin->name,
            'lname' => 'Admin',
            'gender'=> 'male',
            'employee_number' => 'EMP-001',
            'birthday' => '1985-01-01',
        ]);
    }
}
