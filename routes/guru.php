<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

use App\Livewire\Guru\LessonList;
use App\Livewire\Rapor\{RaporList, ShowRapor, CreateRapor, RaporCreate, RaporKelasX, RaporUpdate, RaporKelasXI, RaporKelasXII};
use App\Livewire\Assessment\{AshResult, AshResultId};
use App\Livewire\Score\{AshScorePg, AshScoreList, AsasScoreList, AshScoreEssay, AstsScoreList, AshScoreEssayId, AshRemedialScorePg, AsasRemedialScoreList, AshRemedialScoreEssay, AstsRemedialScoreList, AshRemedialScoreEssayId};

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
                Route::get('/', AshResult::class);
                Route::get('/{uuid}', AshResultId::class);
            });

            // Input Nilai Assessment Sumatif Harian
            Route::prefix('/ash')->group(function(){
                Route::get('/', AshScoreList::class);
                Route::get('/tp', AshResult::class);
                Route::get('/tp/{uuid}', AshResultId::class);
                Route::get('/pg/{user_id}/{uuid}', AshScorePg::class);
                Route::get('/essay/{id}/{uuid}', AshScoreEssay::class);
                Route::get('/nilai-essay/{uuid}', AshScoreEssayId::class);
            });

            Route::prefix('/asts')->group(function(){
                Route::get('/', AstsScoreList::class);
                Route::get('/pg/{user_id}/{uuid}', AshScorePg::class);
                Route::get('/essay/{id}/{uuid}', AshScoreEssay::class);
                Route::get('/nilai-essay/{uuid}', AshScoreEssayId::class);
            });

            Route::prefix('/asas')->group(function(){
                Route::get('/', AsasScoreList::class);
                Route::get('/pg/{user_id}/{uuid}', AshScorePg::class);
                Route::get('/essay/{id}/{uuid}', AshScoreEssay::class);
                Route::get('/nilai-essay/{uuid}', AshScoreEssayId::class);
            });

            // Remedial
            Route::prefix('/remedial')->group(function(){
                Route::prefix('/asts')->group(function(){
                    Route::get('/', AstsRemedialScoreList::class);
                    Route::get('/pg/{user_id}/{uuid}', AshRemedialScorePg::class);
                    Route::get('/essay/{id}/{uuid}', AshRemedialScoreEssay::class);
                    Route::get('/nilai-essay/{uuid}', AshRemedialScoreEssayId::class);
                });

                Route::prefix('/asas')->group(function(){
                    Route::get('/', AsasRemedialScoreList::class);
                    Route::get('/pg/{user_id}/{uuid}', AshRemedialScorePg::class);
                    Route::get('/essay/{id}/{uuid}', AshRemedialScoreEssay::class);
                    Route::get('/nilai-essay/{uuid}', AshRemedialScoreEssayId::class);
                });
            });
        });

        // Rapor
        Route::prefix('/rapor')->group(function(){
            // Rapor Kelas X
            Route::get('/kelas/X', RaporKelasX::class);
            Route::get('/kelas/X/create', CreateRapor::class);
            Route::get('/kelas/X/{uuid}', RaporList::class);
            Route::get('/kelas/X/{user_id}/{uuid}/create', RaporCreate::class);
            Route::get('/kelas/X/{user_id}/{uuid}/edit', RaporUpdate::class);
            Route::get('/kelas/X/{user_id}/{uuid}/show', ShowRapor::class);

            // Rapor Kelas XI
            Route::get('/kelas/XI', RaporKelasXI::class);
            Route::get('/kelas/XI/create', CreateRapor::class);
            Route::get('/kelas/XI/{uuid}', RaporList::class);
            Route::get('/kelas/XI/{user_id}/{uuid}/create', RaporCreate::class);
            Route::get('/kelas/XI/{user_id}/{uuid}/edit', RaporUpdate::class);
            Route::get('/kelas/XI/{user_id}/{uuid}/show', ShowRapor::class);

            // Rapor Kelas XII
            Route::get('/kelas/XII', RaporKelasXII::class);
            Route::get('/kelas/XII/create', CreateRapor::class);
            Route::get('/kelas/XII/{uuid}', RaporList::class);
            Route::get('/kelas/XII/{user_id}/{uuid}/create', RaporCreate::class);
            Route::get('/kelas/XII/{user_id}/{uuid}/edit', RaporUpdate::class);
            Route::get('/kelas/XII/{user_id}/{uuid}/show', ShowRapor::class);

            Route::get('/contoh', function(){
                return view('contoh-rapor');
            });
        });
    });
});
