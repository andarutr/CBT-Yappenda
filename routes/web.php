<?php

use Livewire\Volt\Volt;
use App\Livewire\Auth\Authentication;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;

// Route
Route::redirect('/', '/login');
// Authentication
// Route::get('/login', Authentication::class)->name('login');
Volt::route('/login', 'auth');
Route::get('/reset-password/{tokens}', [ResetPasswordController::class, 'index']);
Route::post('/reset-password/{tokens}', [ResetPasswordController::class, 'update']);

require __DIR__.'/admin.php';
require __DIR__.'/guru.php';
require __DIR__.'/user.php';