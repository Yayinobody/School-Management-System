<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::post('/students/store/', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/profile/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/subjects/{student}', [StudentController::class, 'showSubjects'])->name('students.showSubjects');
    Route::put('/students/update/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/destroy/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

});
