<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['user:id,email,name','enrollment:id,student_id,status'])
        ->get()
        ->map( function ($student){
            return[
            'id' => $student->id,
            'name' => $student->user->name,
            'email' => $student->user->email,
            'studentNumber' => $student->student_number,
            'enrollmentStatus' => $student->enrollment->status,
            ];
            });
            return inertia('students',[
                'data' => $students
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
    public function show(Student $student)
    {
        $student->load(['user:id,email,name',
        'subjectEnrollments:id,student_id,section_id,status',
        'subjectEnrollments.section:id,subject_id,section_code',
        'enrollment:id,student_id,program_id,term_id,status',
        'enrollment.program:id,code',
        'enrollment.term:id,semester']);

        $data = [
            'id' => $student->id,
            'name' => $student->user->name,
            'email' => $student->user->email,
            'studentNumber' => $student->student_number,
            'enrollment' => $student->enrollment->program->code,
            'enrollmentTerm'=>$student->enrollment->term->semester,
            'enrollmentStatus'=>$student->enrollment->status,
            'subjects' => $student->subjectEnrollments
            ->map(function ($enrollment) {
                return [
                    'sectionCode' => $enrollment->section->section_code,
                    'subjectId' => $enrollment->section->subject_id,
                    'enrollmentStatus' => $enrollment->status,
                ];
            }),
        ];
        dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
