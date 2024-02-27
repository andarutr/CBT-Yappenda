<?php

use App\Livewire\Exam\PgExam;
use App\Livewire\Exam\ExamList;
use App\Livewire\User\Dashboard;
use App\Livewire\Exam\EssayExam;
use App\Livewire\Exam\PreviewExam;
use App\Livewire\Setting\ProfileShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Setting\ChangePassword;

// Route
Route::middleware('isUser')->group(function(){
	Route::prefix('/user')->group(function(){
		Route::get('/dashboard', Dashboard::class);
		Route::get('/profile', ProfileShow::class);
		Route::get('/ganti-password', ChangePassword::class);
		
		Route::get('/ujian/ash', ExamList::class);
		Route::get('/ujian/pg/{uuid}', PgExam::class);
		Route::get('/ujian/essay/{uuid}', EssayExam::class);
		Route::get('/ujian/preview/{uuid}', PreviewExam::class);

		Route::get('/ujian/asts', function(){
			abort(503);
		});
		Route::get('/ujian/asas', function(){
			abort(503);
		});
		Route::get('/ujian/pas', function(){
			abort(503);
		});

		Route::get('/hasil-ujian/{name}', function(){
			abort(503);
		});
	});
});