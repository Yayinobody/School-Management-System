<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Section;
use App\Models\Program;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::role('student')->count();
        $enrollments = Enrollment::count();
        $sections = Section::count();
        $teachers = User::role('teacher')->count();

        $enrollmentByProgram = Program::select('code')->withCount('enrollments')->get()->toArray();
        dd($enrollmentByProgram);

        return inertia (
        'dashboard', [
            'students'=>$students,
            'enrollments'=> $enrollments,
            'sections'=> $sections,
            'teachers'=>$teachers
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
