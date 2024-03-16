<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\User\Dashboard;
use App\Livewire\Setting\Profile;
use App\Livewire\Exam\{PgExam, ExamList, PgExamId, EssayExam, EssayExamId, PreviewExam, ShowAshResult, ShowExamResults, ShowRemedialResults};
use App\Livewire\Remedial\{RemedialList, PgRemedialExam, PgRemedialExamId, EssayRemedialExam, EssayRemedialExamId, PreviewRemedialExam};

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
		Route::prefix('/hasil-ujian')->group(function(){
			Route::get('/ash', ShowAshResult::class);
			Route::get('/asts', ShowExamResults::class);
			Route::get('/asas', ShowExamResults::class);
			Route::get('/remedial/asts', ShowRemedialResults::class);
			Route::get('/remedial/asas', ShowRemedialResults::class);
		});
	});
});