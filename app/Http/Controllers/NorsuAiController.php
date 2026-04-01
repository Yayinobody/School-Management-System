<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NorsuAiController extends Controller
{
    public function chat(Request $request)
    {
        $user = auth()->user();

        $role = $user ? $user->getRoleNames()->first() : 'guest';

        $context = $this->buildSafeContext($user, $role);

        $payload = [
            'question' => $request->question,
            'role' => $role,
            'context' => $context,
        ];

        $response = Http::post('http://127.0.0.1:8003/chat', $payload);
        if ($response->failed()) {
            return response()->json([
                'error' => 'AI service unavailable'
            ], 500);
        }

        return response()->json($response->json());
    }

    private function buildSafeContext($user, $role)
    {
        if (!$user) {
            return [
                'type' => 'guest',
            ];
        }

        if ($role === 'student') {

            $student = $user->student;

            return [
                'type' => 'student',
                // 'year_level' => $student->year_level ?? null,
                // 'program' => $student->program->name ?? null,

                // 'completed_subjects' => $student->completedSubjects()
                    // ->pluck('code')
                    // ->toArray(),

                //needed to implement pa
                // 'missing_prerequisites' => $student->missingPrerequisites()
                //     ->pluck('code')
                //     ->toArray(),

                //need to implement pa
            ];
        }

        if ($role === 'faculty') {
            return [
                'type' => 'faculty',
            ];
        }

        return [
            'type' => $role,
        ];
    }
}
