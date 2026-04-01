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

        $student = User::create($validated);

        return response()->json([
        "message" => "User Created Successully"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = load(['student','faculty']);
        $data = [
            "name" => $user->name,
            "email" => $user->email,
            "role" => $user->role,
        ];

        if ($user->student){
            $data['type'] = 'student';
            $data['details'] = [
            $data['fname'] => $user->student->fname,
            $data['mname'] => $user->student->mname,
            $data['lname'] => $user->student->lname,
            $data['gender'] => $user->student->gender,
            $data['birthday'] => $user->student->birthday,
            $data['student_number'] = $user->student->student_number,
            $data['year_level'] = $user->student->year_level,
            ];
        }
        else if ($user->faculty) {
            $data['type'] = 'faculty';
            $data['details'] = [
            $data['fname'] => $user->faculty->fname,
            $data['mname'] => $user->faculty->mname,
            $data['lname'] => $user->faculty->lname,
            $data['gender'] => $user->faculty->gender,
            $data['birthday'] => $user->faculty->birthday,
            $data['employee_number'] = $user->faculty->employee_number,
            $data['program_id'] = $user->faculty->program_id,
            ];
        }
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
        "message" => "User Deleted Succesfully"
        ], 200);
    }
}
