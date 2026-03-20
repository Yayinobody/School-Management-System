<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');


});
