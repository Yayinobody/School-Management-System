<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
// use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with(['user:id,email,name','program:id,code,department_id','program.department:id,code'])
        ->get()
        ->map( function ($teacher){
            return[
                'id'=>$teacher->id,
                'name' => $teacher->user->name,
                'email'=>$teacher->user->email,
                'employeeNumber'=>$teacher->employee_number,
                'department'=>$teacher->program->department->code,
                'program'=>$teacher->program->code,
            ];
        });

        return inertia('teachers',
        ['data'=>$teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
