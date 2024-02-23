<?php

use Illuminate\Support\Facades\Route;

// Route
Route::middleware('isUser')->group(function(){
	Route::get('/user/dashboard', function(){
		return "USER";
	});
});