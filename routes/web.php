<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

require __DIR__.'/settings.php';
require __DIR__.'/web/dashboard.php';
require __DIR__.'/web/users.php';
require __DIR__.'/web/teachers.php';
require __DIR__.'/web/students.php';
// require __DIR__.'/norsuai.php';
