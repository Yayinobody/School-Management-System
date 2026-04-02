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
                "total_faculties" => $college->programs->sum(function ($program) {
                                return $program->faculties->count();,
            ];
        });

        return inertia('college'[
            "data" => $college_data
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, College $college)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(College $college)
    {
        //
    }
}
