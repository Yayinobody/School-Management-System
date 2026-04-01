<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/store',[UserController::class, 'store'])->name('storeUser');
    Route::get('/users/show/{user}',[UserController::class, 'show'])->name('showUser');
    Route::delete('/users/delete/{user}', [UserController::class,'destroy'])->name('deleteUser');


});
