<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('program:id,code')->get();
        $data = subjects->map(
        function ($subject) {
            return [

            "code" => subject->code,
            "title" => subject->title,
            "program_code" => subject->program->code,
            "lecture" => subject->lecture,
            "lab" => subject->lab,
            "type" => subject->type,
            ];
        }
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $validated = $request->validate();

        $subject = Subject::create($validated);

        return response()->json(
        [
            "message" => "Subject Created Succesfully",
            "data" => $subject
        ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $subject->load(['program:id,code','sections:id,subject_id','faculties']);

        $data = [
            "code" => $subject->code,
            "title" => $subject->title,
            "description" => $subject->description,
            "program_code" => $subject->program->code,
            "lecture" => $subject->lecture,
            "lab" => subject->lab,
            "type" => subject->type,
            "total_sections" => $subject->sections->count(),
            "total_faculties" => $subject->faculties->count(),
        ];

        return response()->json([
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubjectRequest $request, Subject $subject)
    {
        $validated = $request->validate();

        $subject->update($validated);

        return response()->json(
        [
            "message" => "Subject Updated Succesfully",
            "data" => $subject
        ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();


        return response()->json(
        [
            "message" => "Subject Deleted Succesfully",
            "data" => $subject
        ]
        );
    }
}
