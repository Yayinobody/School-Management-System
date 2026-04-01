<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with(['program'])
        ->get()
        ->map( function ($teacher){
            return[
                'id'=>$teacher->id,
                'fname' => $teacher->fname,
                'mname' => $teacher->mname,
                'lname' => $teacher->lname,
                'gender' =>$teacher->gender,
                'employee_number'=>$teacher->employee_number,
                'program_code' => $teacher->program->code,
            ];
        });

        return inertia('teachers',
        ['data'=>$teachers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $validated = $request->validated();

        $teacher = Teacher::create($validated);

        return response()->json(
        [
            "message"=>"Teacher Created Successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $teacher->load([
        'sections:id,section_code,subject_id',
        'section.subject:title'
        ]);

        $data = [
            'id' => $teacher->id,
            'fname' => $teacher->fname,
            'mname' => $teacher->mname,
            'lname' => $teacher->lname,
            'gender' => $teacher->gender,
            'employee_number' => $teacher->employee_number,
            'birthday' => $teacher->birthday,
        ];

        dd($data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTeacherRequest $request, Teacher $teacher)
    {
        $validated = $request->validated();
        $teacher = update($validated);

        return response()->json([
            "message" => "Teacher Updated Succesfully",
            "data" => $teacher
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json(
        [
            "message"=>"Teacher has been deleted."
        ], 200);
    }
}
