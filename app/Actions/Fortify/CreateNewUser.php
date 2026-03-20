<?php

namespace App\Actions\Fortify;

use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Models\User;
use App\Models\Student;
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
            'student_number' => ['required','string'],
            'password' => $this->passwordRules(),
        ])->validate();

        $student = Student::where('student_number', $input['student_number'])->first();

        if (! $student){
            throw ValidationException::withMessages([
            'student_number'=>['Student number not found.']
            ]);
        }

        if ($student->user){
            throw ValidationException::withMessages([
            'student_number'=>['User already has an account.'],
            ]);
        }

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $input['password'],
        ]);

        $student->update([
        'user_id'=>$user->id,
        ]);

        return $user;
    }
}
