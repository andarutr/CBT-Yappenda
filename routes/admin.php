<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Dashboard;
use App\Livewire\Setting\Profile;
use App\Livewire\Lesson\LessonList;
use App\Livewire\Rapor\{RaporList, ShowRapor};
use App\Livewire\Assessment\{ASHList, AsasList, AstsList, AshResult, AshPurpose, AshResultId, ASHQuestionpg, ASHQuestionpr, ASHQuestionessay, ASHEditQuestionessay};
use App\Livewire\Account\{RoleList, AccountList, SuspendList, PasswordAccountList};
use App\Livewire\Score\{AshScorePg, AshScoreList, AsasScoreList, AshScoreEssay, AstsScoreList, AshScoreEssayId, AshRemedialScorePg, AsasRemedialScoreList, AshRemedialScoreEssay, AstsRemedialScoreList, AshRemedialScoreEssayId};
use App\Livewire\Rapor\{CreateRapor, RaporCreate, RaporKelasX, RaporUpdate, RaporKelasXI, RaporKelasXII};

// Routes
Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::redirect('/','/admin/dashboard');
        Route::get('/dashboard', Dashboard::class);
        
        // Settings
        Route::get('/profile', Profile::class);

        // Management Account
        Route::prefix('/account')->group(function(){
            Route::get('/', AccountList::class);
            Route::get('/reset-password', PasswordAccountList::class);
            Route::get('/role', RoleList::class);
            Route::get('/suspend', SuspendList::class);
        });

        // Mata Pelajaran
        Route::get('/mata-pelajaran', LessonList::class);

        // Tujuan Pembelajaran
        Route::get('/tujuan-pembelajaran', AshPurpose::class);
        // Assessment
        Route::prefix('/assessment')->group(function(){
            // Assessment Sumatif Harian
            Route::prefix('/ash')->group(function(){
                Route::get('/', ASHList::class);
                Route::get('/input-soal/pg/{uuid}', ASHQuestionpg::class);
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Route::get('/', AstsList::class);
                Route::get('/input-soal/pg/{uuid}', ASHQuestionpg::class);
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Akhir Semester
            Route::prefix('/asas')->group(function(){
                Route::get('/', AsasList::class);
                Route::get('/input-soal/pg/{uuid}', ASHQuestionpg::class);
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