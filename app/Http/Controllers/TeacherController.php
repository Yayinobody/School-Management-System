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
