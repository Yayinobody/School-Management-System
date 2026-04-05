<?php

use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs');
    Route::post('/programs/store',[ProgramController::class, 'store'])->name('storeProgram');
    Route::get('/programs/show/{program}',[ProgramController::class, 'show'])->name('showProgram');
    Route::put('/programs/update/{program}',[ProgramController::class, 'update'])->name('updateProgram');
    Route::delete('/programs/delete/{program}', [ProgramController::class,'destroy'])->name('deleteProgram');
});
