<?php

use App\Http\Controllers\NorsuAiController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/chat', [NorsuAiController::class, 'chat'])->name('chat');


});
