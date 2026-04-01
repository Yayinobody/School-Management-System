<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Http\Requests\StoreFacultyRequest;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::with(['program'])
        ->get()
        ->map( function ($faculty){
            return[
                'id'=>$faculty->id,
                'fname' => $faculty->fname,
                'mname' => $faculty->mname,
                'lname' => $faculty->lname,
                'gender' =>$faculty->gender,
                'employee_number'=>$faculty->employee_number,
                'program_code' => $faculty->program->code,
            ];
        });

        return inertia('faculties',
        ['data'=>$faculties,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        $validated = $request->validated();

        $faculty = Faculty::create($validated);

        return response()->json(
        [
            "message"=>"Faculty Created Successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        $faculty->load([
        'sections:id,section_code,subject_id',
        'section.subject:title'
        ]);

        $data = [
            'id' => $faculty->id,
            'fname' => $faculty->fname,
            'mname' => $faculty->mname,
            'lname' => $faculty->lname,
            'gender' => $faculty->gender,
            'employee_number' => $faculty->employee_number,
            'birthday' => $faculty->birthday,
        ];

        dd($data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFacultyRequest $request, Faculty $faculty)
    {
        $validated = $request->validated();
        $faculty = update($validated);

        return response()->json([
            "message" => "Faculty Updated Succesfully",
            "data" => $faculty
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return response()->json(
        [
            "message"=>"Faculty has been deleted."
        ], 200);
    }
}
