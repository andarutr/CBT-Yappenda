<?php

use App\Livewire\Exam\PgExam;
use App\Livewire\Exam\PgExamId;
use App\Livewire\Exam\ExamList;
use App\Livewire\User\Dashboard;
use App\Livewire\Exam\EssayExam;
use App\Livewire\Setting\Profile;
use App\Livewire\Exam\EssayExamId;
use App\Livewire\Exam\PreviewExam;
use App\Livewire\Exam\ShowExamResults;
use Illuminate\Support\Facades\Route;

// Route
Route::middleware('isUser')->group(function(){
	Route::prefix('/user')->group(function(){
		Route::get('/dashboard', Dashboard::class);
		// Settings
		Route::get('/profile', Profile::class);

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
		Route::get('/hasil-ujian/ash', ShowExamResults::class);
		Route::get('/hasil-ujian/asts', ShowExamResults::class);
		Route::get('/hasil-ujian/asas', ShowExamResults::class);
		Route::get('/hasil-ujian/pas', function(){
			abort(503);
		});
	});
});