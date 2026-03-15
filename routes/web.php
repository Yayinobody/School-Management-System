<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');

    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/profile/{student}', [StudentController::class, 'showProfile'])->name('studentShowProfile');
    Route::get('/students/subjects/{student}', [StudentController::class, 'showSubjects'])->name('studentShowSubjects');


});

require __DIR__.'/settings.php';
