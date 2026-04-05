<?php

use App\Http\Controllers\CollegeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges');
    Route::post('/colleges/store',[CollegeController::class, 'store'])->name('storeCollege');
    Route::get('/colleges/show/{college}',[CollegeController::class, 'show'])->name('showCollege');
    Route::put('/colleges/update/{college}',[CollegeController::class, 'update'])->name('updateCollege');
    Route::delete('/colleges/delete/{college}', [CollegeController::class,'destroy'])->name('deleteCollege');
});
