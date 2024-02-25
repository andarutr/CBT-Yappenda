<?php

use App\Livewire\User\Dashboard;
use App\Livewire\Setting\ProfileShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Setting\ChangePassword;

// Route
Route::middleware('isUser')->group(function(){
	Route::get('/user/dashboard', Dashboard::class);
	Route::get('/user/profile', ProfileShow::class);
	Route::get('/user/ganti-password', ChangePassword::class);
});