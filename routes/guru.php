<?php

use Illuminate\Support\Facades\Route;

// Route
Route::middleware('isGuru')->group(function(){
	Route::get('/guru/dashboard', function(){
		return "GURU";
	});
});