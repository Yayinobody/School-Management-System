<?php

use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties');
    Route::post('/faculties/store',[FacultyController::class, 'store'])->name('storeFaculty');
    Route::get('/faculties/show/{faculty}',[FacultyController::class, 'show'])->name('showFaculty');
    Route::put('/faculties/update/{faculty}',[FacultyController::class, 'update'])->name('updateFaculty');
    Route::delete('/faculties/delete/{faculty}', [FacultyController::class,'destroy'])->name('deleteFaculty');
});
