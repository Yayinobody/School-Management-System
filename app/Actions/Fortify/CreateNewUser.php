<?php

namespace App\Actions\Fortify;

use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, ProfileValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
     public function create(array $input): User
     {
         Validator::make($input, [
             ...$this->profileRules(),
             'role' => ['required','in:student,teacher'],
             'password' => $this->passwordRules(),
         ])->validate();

         $record = null;

         if ($input['role'] === 'student') {
             Validator::make($input, [
                 'student_number' => ['required', 'string'],
             ])->validate();

             $record = Student::where('student_number', $input['student_number'])->first();

             if (! $record) {
                 throw ValidationException::withMessages([
                     'student_number' => ['Student number not found.']
                 ]);
             }

             if ($record->user_id) {
                 throw ValidationException::withMessages([
                     'student_number' => ['User already has an account.']
                 ]);
             }
         }

         if ($input['role'] === 'teacher') {
             Validator::make($input, [
                 'employee_number' => ['required', 'string'],
             ])->validate();

             $record = Teacher::where('employee_number', $input['employee_number'])->first();

             if (! $record) {
                 throw ValidationException::withMessages([
                     'employee_number' => ['Employee number not found.']
                 ]);
             }

             if ($record->user_id) {
                 throw ValidationException::withMessages([
                     'employee_number' => ['User already has an account.']
                 ]);
             }
         }

         $user = User::create([
             'name' => $input['name'],
             'email' => $input['email'],
             'password' => $input['password'],
         ]);

         $user->assignRole($input['role']);

         if ($record) {
             $record->update([
                 'user_id' => $user->id,
             ]);
         }

         return $user;
     }
}
