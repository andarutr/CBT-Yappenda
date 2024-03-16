<?php

use App\Livewire\Guru\Dashboard;

use App\Livewire\Guru\LessonList;
use App\Livewire\Rapor\RaporList;
use App\Livewire\Rapor\ShowRapor;
use App\Livewire\Setting\Profile;
use App\Livewire\Score\AshScorePg;
use App\Livewire\Rapor\CreateRapor;
use App\Livewire\Rapor\RaporCreate;
use App\Livewire\Rapor\RaporKelasX;
use App\Livewire\Rapor\RaporUpdate;
use App\Livewire\Assessment\ASHList;
use App\Livewire\Rapor\RaporKelasXI;
use App\Livewire\Score\AshScoreList;
use App\Livewire\Assessment\AsasList;
use App\Livewire\Assessment\AstsList;
use App\Livewire\Rapor\RaporKelasXII;
use App\Livewire\Score\AsasScoreList;
use App\Livewire\Score\AshScoreEssay;
use App\Livewire\Score\AstsScoreList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Assessment\AshResult;
use App\Livewire\Score\AshScoreEssayId;
use App\Livewire\Assessment\AshResultId;
use App\Livewire\Assessment\ASHQuestionpg;
use App\Livewire\Assessment\ASHQuestionpr;
use App\Livewire\Score\AshRemedialScorePg;
use App\Livewire\Assessment\ASHQuestionessay;
use App\Livewire\Score\AsasRemedialScoreList;
use App\Livewire\Score\AshRemedialScoreEssay;
use App\Livewire\Score\AstsRemedialScoreList;
use App\Livewire\Score\AshRemedialScoreEssayId;
use App\Livewire\Assessment\ASHEditQuestionessay;

// Route
Route::middleware('isGuru')->group(function(){
    Route::prefix('/guru')->group(function(){
        Route::redirect('/','/guru/dashboard');
        Route::get('/dashboard', Dashboard::class);
        Route::get('/profile', Profile::class);

        // Mata Pelajaran
        Route::get('/mata-pelajaran', LessonList::class);
        
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

            Route::get('/pas', function(){
                abort(503);
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
            Route::get('/kelas/X', function(){
                abort(503);
            });
            // Route::get('/kelas/X', RaporKelasX::class);
            // Route::get('/kelas/X/create', CreateRapor::class);
            // Route::get('/kelas/X/{uuid}', RaporList::class);
            // Route::get('/kelas/X/{user_id}/{uuid}/create', RaporCreate::class);
            // Route::get('/kelas/X/{user_id}/{uuid}/edit', RaporUpdate::class);
            // Route::get('/kelas/X/{user_id}/{uuid}/show', ShowRapor::class);

            // Rapor Kelas XI
            Route::get('/kelas/XI', function(){
                abort(503);
            });
            // Route::get('/kelas/XI', RaporKelasXI::class);
            // Route::get('/kelas/XI/create', CreateRapor::class);
            // Route::get('/kelas/XI/{uuid}', RaporList::class);
            // Route::get('/kelas/XI/{user_id}/{uuid}/create', RaporCreate::class);
            // Route::get('/kelas/XI/{user_id}/{uuid}/edit', RaporUpdate::class);
            // Route::get('/kelas/XI/{user_id}/{uuid}/show', ShowRapor::class);

            // Rapor Kelas XII
            Route::get('/kelas/XII', function(){
                abort(503);
            });
            // Route::get('/kelas/XII', RaporKelasXII::class);
            // Route::get('/kelas/XII/create', CreateRapor::class);
            // Route::get('/kelas/XII/{uuid}', RaporList::class);
            // Route::get('/kelas/XII/{user_id}/{uuid}/create', RaporCreate::class);
            // Route::get('/kelas/XII/{user_id}/{uuid}/edit', RaporUpdate::class);
            // Route::get('/kelas/XII/{user_id}/{uuid}/show', ShowRapor::class);

            Route::get('/contoh', function(){
                return view('contoh-rapor');
            });
        });
    });
});
