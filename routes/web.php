<?php

use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
   Route::get('timeline', TimelineController::class)->name('timeline');
   Route::view('/dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/auth.php';
