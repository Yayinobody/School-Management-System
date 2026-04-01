<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/store/', [StudentController::class, 'store'])->name('store');
    Route::get('/students/profile/{student}', [StudentController::class, 'show'])->name('show');
    Route::get('/students/subjects/{student}', [StudentController::class, 'showSubjects'])->name('showSubjects');
    Route::get('/students/update/{student}', [StudentController::class, 'update'])->name('update');
    Route::get('/students/destroy/{student}', [StudentController::class, 'destroy'])->name('destroy');

});
