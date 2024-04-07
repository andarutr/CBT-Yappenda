<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

use App\Livewire\Rapor\{RaporList, ShowRapor};
use App\Livewire\Score\{AshRemedialScorePg, AsasRemedialScoreList, AshRemedialScoreEssay, AstsRemedialScoreList, AshRemedialScoreEssayId};
use App\Livewire\Rapor\{CreateRapor, RaporCreate, RaporKelasX, RaporUpdate, RaporKelasXI, RaporKelasXII};

// Routes
Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::redirect('/','/admin/dashboard');
        Volt::route('/dashboard', 'admin/dashboard');
        // Settings = untuk semua role
        Volt::route('/profile', 'settings/profile');
        Volt::route('/ganti-password', 'settings/change-password');
        // Management Account = crud akun, reset pass, ganti role & suspend.
        Route::prefix('/account')->group(function(){
            Volt::route('/', 'account/account-list');
            Volt::route('/reset-password', 'account/password-account-list');
            Volt::route('/role', 'account/role-list');
            Volt::route('/suspend', 'account/suspend-list');
        });
        // Mata Pelajaran
        Volt::route('/mata-pelajaran', 'lesson/lesson-list');
        // Tujuan Pembelajaran
        Volt::route('/tujuan-pembelajaran', 'assessment/ash-purpose');
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
             // Input Nilai Assessment Sumatif Akhir Semester
            Route::prefix('/asas')->group(function(){
                Volt::route('/', 'score/asas-score-list');
                Volt::route('/pg/{user_id}/{uuid}', 'score/ass-score-pg');
                Volt::route('/essay/{id}/{uuid}', 'score/ass-score-essay');
                Volt::route('/nilai-essay/{uuid}', 'score/ass-score-essay-id');
            });
            // Remedial
            Route::prefix('/remedial')->group(function(){
                Route::prefix('/asts')->group(function(){
                    Volt::route('/', AstsRemedialScoreList::class);
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