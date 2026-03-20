<?php

use App\Http\Controllers\NorsuAiController;
use Illuminate\Support\Facades\Route;

Route::post('/chat', [NorsuAiController::class, 'chat']);
