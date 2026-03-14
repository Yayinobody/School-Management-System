<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');

});

require __DIR__.'/settings.php';
