<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCollegeRequest;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::with('rooms','programs.faculties')->get();
        $college_data = $colleges->map(
        function ($college){
            return[
                "code" => $college->code,
                "title" => $college->title,
                "total_programs" => $college->programs->count(),
                "total_rooms" => $college->rooms->count(),
                "total_faculties" => $college->programs->sum(function ($program){
                    return $program->faculties->count();
                })
            ];
        });

        return inertia('college',[
            "data" => $college_data,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollegeRequest $request)
    {
        $validated = $request->validated();

        $college = College::create($validated);

        return response()->json(
        [
            "message" => "College created Succesfully",
            "data" => $college
        ],200
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
         $college->load('programs:id,college_id',
         'programs.faculties:id,program_id',
         'programs.enrollments:id,program_id',
         'programs.subjects:id,program_id');

         $data_college = [
            "code" => college->code,
            "title" => college->title,
            "total_programs" => college->programs->count(),
            "total_rooms" => college->rooms->count(),
            "total_faculties" => college->programs->faculties->count(),
            "total_enrollments" => college->programs->enrollments->count(),
            "total_subjects" => college->programs->subjects->count(),
         ];

         return response()->json([
            "data" => $data_college,
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCollegeRequest $request, College $college)
    {
        $validated = $request->validated();

        $college->update($request);

        return response()->json([
            "message" => "College Updated Succesfully",
            "data" => $college,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(College $college)
    {
        $college->delete();

        return response()->json([
            "message" => "College Deleted Succesfully"
        ]);
    }
}
