<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

use App\Livewire\User\Dashboard;
use App\Livewire\Rapor\{ShowRapor};

// Route
Route::middleware('isUser')->group(function(){
	Route::prefix('/user')->group(function(){
		Route::get('/dashboard', Dashboard::class);
		// Settings = untuk semua role
        Volt::route('/profile', 'settings/profile');
        Volt::route('/ganti-password', 'settings/change-password');

		// Ujian 
		Route::prefix('/ujian')->group(function(){
			Volt::route('/ash', 'exam/list-exam');
			Volt::route('/asts', 'exam/list-exam');
			Volt::route('/asas', 'exam/list-exam');
			// PG Exam & Essay Exam
			Volt::route('/pg/{uuid}', 'exam/pg-exam');
			Volt::route('/pg/{id}/{uuid}', 'exam/pg-exam-id');
			Volt::route('/essay/{id}/{uuid}', 'exam/essay-exam-id');
			Volt::route('/preview/{uuid}', 'exam/preview-exam');
		});
		// Remedial
		Route::prefix('/remedial')->group(function(){
			Volt::route('/asts', 'exam/remedial/list');
			Volt::route('/asas', 'exam/remedial/list');
			// Exam sess
			Volt::route('/pg/{uuid}', 'exam/remedial/pg-remedial');
			Volt::route('/pg/{id}/{uuid}', 'exam/remedial/pg-remedial-id');
			Volt::route('/essay/{id}/{uuid}', 'exam/remedial/essay-remedial-id');
			Volt::route('/preview/{uuid}', 'exam/remedial/preview-remedial');
		});
		// Hasil Ujian
		Route::prefix('/hasil-ujian')->group(function(){
			Volt::route('/ash', 'results/ash-result');
			Volt::route('/asts', 'results/show-result');
			Volt::route('/asas', 'results/show-result');
			Volt::route('/remedial/asts', 'results/show-remedial-result');
			Volt::route('/remedial/asas', 'results/show-remedial-result');
		});
		// Rapor
		Route::prefix('/rapor')->group(function(){
			Volt::route('/', 'rapor/show-rapor-id');
			Volt::route('/kelas/{kelas}/{user_id}/{uuid}/show', 'rapor/show-rapor-id');
		});
	});
});