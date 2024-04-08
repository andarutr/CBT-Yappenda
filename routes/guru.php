<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

use App\Livewire\Guru\LessonList;
use App\Livewire\Rapor\{RaporList, ShowRapor, CreateRapor, RaporCreate, RaporKelasX, RaporUpdate, RaporKelasXI, RaporKelasXII};

// Route
Route::middleware('isGuru')->group(function(){
    Route::prefix('/guru')->group(function(){
        Route::redirect('/','/guru/dashboard');
        Volt::route('/dashboard', 'guru/dashboard');
        // Settings = untuk semua role
        Volt::route('/profile', 'settings/profile');
        Volt::route('/ganti-password', 'settings/change-password');
        // Mata Pelajaran
        Route::get('/mata-pelajaran', LessonList::class);
        // Assessment
        Route::prefix('/assessment')->group(function(){
            // Assessment Sumatif Harian
            Route::prefix('/ash')->group(function(){
                Volt::route('/', 'assessment/ash-list');
                Volt::route('/input-soal/pg/{uuid}', 'assessment/ass-question-pg');
                Volt::route('/input-soal/essay/{uuid}', 'assessment/ass-question-essay');
                Volt::route('/input-soal/preview/{uuid}', 'assessment/ass-question-pr');
                Volt::route('/edit-soal/essay/{uuid}', 'assessment/ass-edit-question-essay');
            });
            // Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Volt::route('/', 'assessment/asts-list');
                Volt::route('/input-soal/pg/{uuid}', 'assessment/ass-question-pg');
                Volt::route('/input-soal/essay/{uuid}', 'assessment/ass-question-essay');
                Volt::route('/input-soal/preview/{uuid}', 'assessment/ass-question-pr');
                Volt::route('/edit-soal/essay/{uuid}', 'assessment/ass-edit-question-essay');
            });

            // Assessment Sumatif Akhir Semester
            Route::prefix('/asas')->group(function(){
                Volt::route('/', 'assessment/asas-list');
                Volt::route('/input-soal/pg/{uuid}', 'assessment/ass-question-pg');
                Volt::route('/input-soal/essay/{uuid}', 'assessment/ass-question-essay');
                Volt::route('/input-soal/preview/{uuid}', 'assessment/ass-question-pr');
                Volt::route('/edit-soal/essay/{uuid}', 'assessment/ass-edit-question-essay');
            });
        });
        // Input Nilai
        Route::prefix('/input-nilai')->group(function(){
             // Input Nilai TP
             Route::prefix('/tp')->group(function(){
                Volt::route('/', 'assessment/ass-tp');
                Volt::route('/{uuid}', 'assessment/ass-tp-result');
            });
            // Input Nilai Assessment Sumatif Harian
            Route::prefix('/ash')->group(function(){
                Volt::route('/', 'score/ash-score-list');
                Volt::route('/pg/{user_id}/{uuid}', 'score/ass-score-pg');
                Volt::route('/essay/{id}/{uuid}', 'score/ass-score-essay');
                Volt::route('/nilai-essay/{uuid}', 'score/ass-score-essay-id');
            });
            // Input Nilai Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Volt::route('/', 'score/asts-score-list');
                Volt::route('/pg/{user_id}/{uuid}', 'score/ass-score-pg');
                Volt::route('/essay/{id}/{uuid}', 'score/ass-score-essay');
                Volt::route('/nilai-essay/{uuid}', 'score/ass-score-essay-id');
            });
            // Input Nilai Assessment Sumatif Akhir
            Route::prefix('/asas')->group(function(){
                Volt::route('/', 'score/asas-score-list');
                Volt::route('/pg/{user_id}/{uuid}', 'score/ass-score-pg');
                Volt::route('/essay/{id}/{uuid}', 'score/ass-score-essay');
                Volt::route('/nilai-essay/{uuid}', 'score/ass-score-essay-id');
            });
            // Remedial
            Route::prefix('/remedial')->group(function(){
                Route::prefix('/asts')->group(function(){
                    // Input Nilai remedial ASTS
                    Volt::route('/', 'score/remedial/asts-score-list');
                    Volt::route('/pg/{user_id}/{uuid}', 'score/remedial/ass-score-pg');
                    Volt::route('/essay/{id}/{uuid}', 'score/remedial/ass-score-essay');
                    Volt::route('/nilai-essay/{uuid}', 'score/remedial/ass-score-essay-id');
                });
                // Input Nilai remedial ASAS
                Route::prefix('/asas')->group(function(){
                    Volt::route('/', 'score/remedial/asas-score-list');
                    Volt::route('/pg/{user_id}/{uuid}', 'score/remedial/ass-score-pg');
                    Volt::route('/essay/{id}/{uuid}', 'score/remedial/ass-score-essay');
                    Volt::route('/nilai-essay/{uuid}', 'score/remedial/ass-score-essay-id');
                });
            });
        });
        // Rapor
        Route::prefix('/rapor')->group(function(){
            // Rapor Kelas X
            Volt::route('/kelas/X', 'rapor/kelas-x');
            Volt::route('/kelas/X/create', 'rapor/create-rapor');
            Volt::route('/kelas/X/{uuid}', 'rapor/list');
            Volt::route('/kelas/X/{user_id}/{uuid}/create', 'rapor/create-rapor-id');
            Volt::route('/kelas/X/{user_id}/{uuid}/edit', 'rapor/update-rapor-id');
            Volt::route('/kelas/X/{user_id}/{uuid}/show', 'rapor/show-rapor-id');

            // Rapor Kelas XI
            // Route::get('/kelas/XI', RaporKelasXI::class);
            // Route::get('/kelas/XI/create', CreateRapor::class);
            // Route::get('/kelas/XI/{uuid}', RaporList::class);
            // Route::get('/kelas/XI/{user_id}/{uuid}/create', RaporCreate::class);
            // Route::get('/kelas/XI/{user_id}/{uuid}/edit', RaporUpdate::class);
            // Route::get('/kelas/XI/{user_id}/{uuid}/show', ShowRapor::class);

            // Rapor Kelas XII
            // Route::get('/kelas/XII', RaporKelasXII::class);
            // Route::get('/kelas/XII/create', CreateRapor::class);
            // Route::get('/kelas/XII/{uuid}', RaporList::class);
            // Route::get('/kelas/XII/{user_id}/{uuid}/create', RaporCreate::class);
            // Route::get('/kelas/XII/{user_id}/{uuid}/edit', RaporUpdate::class);
            // Route::get('/kelas/XII/{user_id}/{uuid}/show', ShowRapor::class);
        });
    });
});
