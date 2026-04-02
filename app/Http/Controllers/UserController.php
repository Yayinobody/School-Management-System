<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get()->map(
        function ($user){
            return [
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
                'role'=>$user->getRoleNames()->first(),
                'email_verified_at'=>optional($user->email_verified_at)->toDateString(),
            ];
            }
        );
        return inertia('users', ['data' => $users ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();


        $data = User::create($validated);

        return response()->json([
        "message" => "User Created Successully",
        "data" => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load(['student','faculty']);
        $data = [
            "name" => $user->name,
            "email" => $user->email,
            "role" => $user->role,
        ];

        if ($user->student){
            $data['type'] = 'student';
            $data['details'] = [
            'fname' => $user->student->fname,
            'mname' => $user->student->mname,
            'lname' => $user->student->lname,
            'gender' => $user->student->gender,
            'birthday' => $user->student->birthday,
            'student_number' => $user->student->student_number,
            'year_level' => $user->student->year_level,
            'program_code' => $user->student->program_code,
            ];
        }
        else if ($user->faculty) {
            $data['type'] = 'faculty';
            $data['details'] = [
            'fname' => $user->faculty->fname,
            'mname' => $user->faculty->mname,
            'lname' => $user->faculty->lname,
            'gender' => $user->faculty->gender,
            'birthday' => $user->faculty->birthday,
            'employee_number' => $user->faculty->employee_number,
            'program_code' => $user->faculty->program_code,
            ];
        }

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $data = $user->update($validated);

        return response()->json([
        "message" => "User Updated Successully",
        "data" => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
        "message" => "User Deleted Successully",
        ], 200);
    }
}
