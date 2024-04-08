<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

// Route
Route::redirect('/', '/login');
// Authentication
Volt::route('/login', '/auth');
Volt::route('/reset-password/{tokens}', '/reset-password');

require __DIR__.'/admin.php';
require __DIR__.'/guru.php';
require __DIR__.'/user.php';