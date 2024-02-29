<?php

use App\Livewire\Exam\PgExam;
use App\Livewire\Exam\PgExamId;
use App\Livewire\Exam\ExamList;
use App\Livewire\User\Dashboard;
use App\Livewire\Exam\EssayExam;
use App\Livewire\Exam\EssayExamId;
use App\Livewire\Exam\PreviewExam;
use App\Livewire\Setting\ProfileShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Setting\ChangePassword;

// Route
Route::middleware('isUser')->group(function(){
	Route::prefix('/user')->group(function(){
		Route::get('/dashboard', Dashboard::class);
		// Settings
		Route::get('/profile', ProfileShow::class);
		Route::get('/ganti-password', ChangePassword::class);

		// Ujian 
		Route::prefix('/ujian')->group(function(){
			Route::get('/ash', ExamList::class);
			Route::get('/pg/{uuid}', PgExam::class);
			Route::get('/pg/{id}/{uuid}', PgExamId::class);
			Route::get('/essay/{uuid}', EssayExam::class);
			Route::get('/essay/{id}/{uuid}', EssayExamId::class);
			Route::get('/preview/{uuid}', PreviewExam::class);

			Route::get('/asts', ExamList::class);
			Route::get('/asas', ExamList::class);
			Route::get('/pas', ExamList::class);
		});

		// Hasil Ujian
		Route::get('/hasil-ujian/{uuid}', function(){
			abort(503);
		});
	});
});