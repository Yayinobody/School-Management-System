<?php

use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects');
    Route::post('/subjects/store',[SubjectController::class, 'store'])->name('storeSubject');
    Route::get('/subjects/show/{subject}',[SubjectController::class, 'show'])->name('showSubject');
    Route::put('/subjects/update/{subject}',[SubjectController::class, 'update'])->name('updateSubject');
    Route::delete('/subjects/delete/{subject}', [SubjectController::class,'destroy'])->name('deleteSubject');
});
