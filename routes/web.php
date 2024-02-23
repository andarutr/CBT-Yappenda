<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\ForgotPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');

Route::get('/login', Login::class);
Route::get('/lupa-password', ForgotPassword::class);
Route::get('/reset-password/{tokens}', [ResetPasswordController::class, 'index']);
Route::post('/reset-password/{tokens}', [ResetPasswordController::class, 'update']);

require __DIR__.'/admin.php';
require __DIR__.'/guru.php';
require __DIR__.'/user.php';