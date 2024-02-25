<?php

use App\Livewire\Exam\ExamList;
use App\Livewire\User\Dashboard;
use App\Livewire\Exam\ExamCreate;
use App\Livewire\Setting\ProfileShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Setting\ChangePassword;

// Route
Route::middleware('isUser')->group(function(){
	Route::get('/user/dashboard', Dashboard::class);
	Route::get('/user/profile', ProfileShow::class);
	Route::get('/user/ganti-password', ChangePassword::class);
	
	Route::get('/user/ujian/ash', ExamList::class);
	Route::get('/user/ujian/{lesson}/{uuid}', ExamCreate::class);


	Route::get('/user/ujian/asts', function(){
		abort(503);
	});
	Route::get('/user/ujian/asas', function(){
		abort(503);
	});
	Route::get('/user/ujian/pas', function(){
		abort(503);
	});

	Route::get('/user/hasil-ujian/{name}', function(){
		abort(503);
	});
});