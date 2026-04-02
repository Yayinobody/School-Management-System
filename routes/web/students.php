<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::post('/students/store/', [StudentController::class, 'store'])->name('storeStudent');
    Route::get('/students/show/{student}', [StudentController::class, 'show'])->name('showStudent');
    Route::get('/students/subjects/{student}', [StudentController::class, 'showSubjects'])->name('showStudentSubjects');
    Route::put('/students/update/{student}', [StudentController::class, 'update'])->name('updateStudent');
    Route::delete('/students/delete/{student}', [StudentController::class, 'destroy'])->name('deleteStudent');
});
