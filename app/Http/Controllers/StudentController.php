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
        $students = Student::with(['enrollment:id,student_id,program_id','enrollment.program:id,code'])
        ->get()
        ->map( function ($student){
            return[
            'id' => $student->id,
            'fname' => $student->fname,
            'mname' => $student->mname,
            'lname' => $student->lname,
            'gender' => $student->gender,
            'student_number' => $student->student_number,
            'year_level' => $student->year_level,
            'program_code' => $student->enrollment->program->code,
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

        $student = new Student;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student;


    }

    /**
     * Display the specified resource.
     */
    public function showProfile(Student $student)
    {
        $student->load(['user:id,email,name',
        'enrollment:id,student_id,program_id,term_id,status',
        'enrollment.program:id,code',
        'enrollment.term:id,semester']);

        $data = [
            'id' => $student->id,
            'fname' => $student->fname,
            'mname' => $student->mname,
            'lname' => $student->lname,
            'gender' => $student->gender,
            'studentNumber' => $student->student_number,
            'year_level' => $student->year_level,
            'program_code' => $student->enrollment->program->code,
            'birthday'=> $student->birthday,
            'enrollment' => $student->enrollment->program->code,
            'enrollment_term'=>$student->enrollment->term->semester,
            'enrollment_status'=>$student->enrollment->status,
        ];
        return response()->json($data);

    }

    public function showSubjects(Student $student)
    {
        $student->load(['subjectEnrollments:id,student_id,section_id,status',
        'subjectEnrollments.section:id,subject_id,section_code', 'subjectEnrollments.section.subject:id,code']);

        $data = $student->subjectEnrollments
            ->map(function ($enrollment) {
                return [
                    'section_code' => $enrollment->section->section_code,
                    'subject_code' => $enrollment->section->subject->code,
                    'enrollment_status' => $enrollment->status,
                ];
            });

        return response()->json($data);
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
