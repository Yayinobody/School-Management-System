<?php

use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties');
    Route::get('/faculties/show/{faculty}',[FacultyController::class, 'show'])->name('faculties.show');
});
