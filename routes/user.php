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
		Route::get('/profile', ProfileShow::class);
		Route::get('/ganti-password', ChangePassword::class);
		
		Route::get('/ujian/ash', ExamList::class);
		Route::get('/ujian/pg/{uuid}', PgExam::class);
		Route::get('/ujian/pg/{id}/{uuid}', PgExamId::class);
		Route::get('/ujian/essay/{uuid}', EssayExam::class);
		Route::get('/ujian/essay/{id}/{uuid}', EssayExamId::class);
		Route::get('/ujian/preview/{uuid}', PreviewExam::class);

		Route::get('/ujian/asts', ExamList::class);
		Route::get('/ujian/asas', ExamList::class);
		Route::get('/ujian/pas', ExamList::class);

		Route::get('/hasil-ujian/{uuid}', function(){
			abort(503);
		});
	});
});