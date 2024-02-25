<?php

use App\Livewire\Guru\Dashboard;
use App\Livewire\Setting\ProfileShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Setting\ChangePassword;

// Route
Route::middleware('isGuru')->group(function(){
	Route::get('/guru/dashboard', Dashboard::class);
	Route::get('/guru/profile', ProfileShow::class);
	Route::get('/guru/ganti-password', ChangePassword::class);
});