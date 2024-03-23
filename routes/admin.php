<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

use App\Livewire\Rapor\{RaporList, ShowRapor};
use App\Livewire\Assessment\{AshResult, AshResultId, ASHQuestionpg, ASHQuestionpr, ASHQuestionessay, ASHEditQuestionessay};
use App\Livewire\Score\{AshScorePg, AshScoreList, AsasScoreList, AshScoreEssay, AstsScoreList, AshScoreEssayId, AshRemedialScorePg, AsasRemedialScoreList, AshRemedialScoreEssay, AstsRemedialScoreList, AshRemedialScoreEssayId};
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
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Volt::route('/', 'assessment/asts-list');
                Volt::route('/input-soal/pg/{uuid}', 'assessment/ass-question-pg');
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Akhir Semester
            Route::prefix('/asas')->group(function(){
                Volt::route('/', 'assessment/asas-list');
                Volt::route('/input-soal/pg/{uuid}', 'assessment/ass-question-pg');
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
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
                Route::get('/pg/{user_id}/{uuid}', AshScorePg::class);
                Route::get('/essay/{id}/{uuid}', AshScoreEssay::class);
                Route::get('/nilai-essay/{uuid}', AshScoreEssayId::class);
            });

             // Input Nilai Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Route::get('/', AstsScoreList::class);
                Route::get('/pg/{user_id}/{uuid}', AshScorePg::class);
                Route::get('/essay/{id}/{uuid}', AshScoreEssay::class);
                Route::get('/nilai-essay/{uuid}', AshScoreEssayId::class);
            });

             // Input Nilai Assessment Sumatif Akhir Semester
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