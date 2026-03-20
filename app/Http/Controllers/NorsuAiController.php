<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NorsuAiController extends Controller
{
    public function chat (Request $request) {

        $user = auth()->user();

        $payload = [
        'message' => $request->message,
        ];

        if ($user) {
                $payload['user'] = [
                    'id' => $user->id,
                    'role' => $user->role,
                    'name' => $user->name,
                ];
            } else {
                $payload['user'] = [
                    'role' => 'guest',
                ];
            }

                // implement rag
    }
}
