<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::with(['college','enrollments','faculties','subjects'])->get();
        $program_data = $programs->map(
        function ($program){
            return [
                "code" => $program->code,
                "title" => $program->title,
                "college_code" => $program->college->code,
                "total_faculties" =>$program->faculties->count(),
                "total_enrollments" =>$program->enrollments->sum(),
            ];
        });

        // return inertia('program',[ "data" => $program_data,]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $validated = $request->validated();

        $data = Program::create($validated);

        return response()->json([
            "message" => "Program created Succesfully",
            "data" => $data
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $program->load('college:id,code','college.rooms:id,college_id');
        $data = [
            "code" => $program->code,
            "title" => $program->title,
            "college_code" => $program->college->code,
            "total_rooms" => $program->college->rooms->count(),
            "total_enrollments" => $program->enrollments->count(),
            "total_subjects" => $program->subjects->count(),
        ];

        return response()->json([
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProgramRequest $request, Program $program)
    {
        $validated = $request->validated();

        $program->update($validated);

        return response()->json([
            "data" => $program,
            "message" => "Program Updated Sucessfully"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return response()->json([
            "message"=> "Program Deleted Succesfully"
        ]);
    }
}
