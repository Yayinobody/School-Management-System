<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/profile/{student}', [StudentController::class, 'show'])->name('show');
    Route::get('/students/subjects/{student}', [StudentController::class, 'showSubjects'])->name('showSubjects');

});
