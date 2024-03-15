<?php

use App\Livewire\Exam\PgExam;
use App\Livewire\Exam\ExamList;
use App\Livewire\Exam\PgExamId;
use App\Livewire\Exam\EssayExam;
use App\Livewire\User\Dashboard;
use App\Livewire\Setting\Profile;
use App\Livewire\Exam\EssayExamId;
use App\Livewire\Exam\PreviewExam;
use App\Livewire\Exam\ShowAshResult;
use Illuminate\Support\Facades\Route;
use App\Livewire\Exam\ShowExamResults;
use App\Livewire\Remedial\RemedialList;
use App\Livewire\Remedial\PgRemedialExam;
use App\Livewire\Remedial\PgRemedialExamId;
use App\Livewire\Remedial\EssayRemedialExam;
use App\Livewire\Remedial\EssayRemedialExamId;
use App\Livewire\Remedial\PreviewRemedialExam;

// Route
Route::middleware('isUser')->group(function(){
	Route::prefix('/user')->group(function(){
		Route::get('/dashboard', Dashboard::class);
		// Settings
		Route::get('/profile', Profile::class);

		// Ujian 
		Route::prefix('/ujian')->group(function(){
			Route::get('/ash', ExamList::class);
			Route::get('/asts', ExamList::class);
			Route::get('/asas', ExamList::class);
			// PG Exam & Essay Exam
			Route::get('/pg/{uuid}', PgExam::class);
			Route::get('/pg/{id}/{uuid}', PgExamId::class);
			Route::get('/essay/{uuid}', EssayExam::class);
			Route::get('/essay/{id}/{uuid}', EssayExamId::class);
			Route::get('/preview/{uuid}', PreviewExam::class);
		});

		// Remedial
		Route::prefix('/remedial')->group(function(){
			Route::get('/asts', RemedialList::class);
			Route::get('/asas', RemedialList::class);

			Route::get('/pg/{uuid}', PgRemedialExam::class);
			Route::get('/pg/{id}/{uuid}', PgRemedialExamId::class);
			Route::get('/essay/{uuid}', EssayRemedialExam::class);
			Route::get('/essay/{id}/{uuid}', EssayRemedialExamId::class);
			Route::get('/preview/{uuid}', PreviewRemedialExam::class);
		});

		// Hasil Ujian
		Route::get('/hasil-ujian/ash', ShowAshResult::class);
		Route::get('/hasil-ujian/asts', ShowExamResults::class);
		Route::get('/hasil-ujian/asas', ShowExamResults::class);
		Route::get('/hasil-ujian/pas', function(){
			abort(503);
		});
	});
});