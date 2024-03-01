<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Guru\Dashboard;
use App\Livewire\Setting\ProfileShow;
use App\Livewire\Guru\LessonList;
use App\Livewire\Score\AshScorePg;
use App\Livewire\Score\AshScoreList;
use App\Livewire\Score\AshScoreEssay;
use App\Livewire\Score\AshScoreEssayId;
use App\Livewire\Setting\ChangePassword;
use App\Livewire\Assessment\ASHList;
use App\Livewire\Assessment\AstsList;
use App\Livewire\Assessment\AsasList;
use App\Livewire\Assessment\ASHCreate;
use App\Livewire\Assessment\ASHQuestionpr;
use App\Livewire\Assessment\ASHQuestionpg;
use App\Livewire\Assessment\ASHQuestionessay;
use App\Livewire\Assessment\ASHEditQuestionessay;

// Route
Route::middleware('isGuru')->group(function(){
    Route::prefix('/guru')->group(function(){
        Route::get('/dashboard', Dashboard::class);
        Route::get('/profile', ProfileShow::class);
        Route::get('/ganti-password', ChangePassword::class);

        // Mata Pelajaran
        Route::get('/mata-pelajaran', LessonList::class);
        
        // Assessment
        Route::prefix('/assessment')->group(function(){
            // Assessment Sumatif Harian
            Route::prefix('/ash')->group(function(){
                Route::get('/', ASHList::class);
                Route::get('/create', ASHCreate::class);
                Route::get('/input-soal/pg/{uuid}', ASHQuestionpg::class);
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Route::get('/', AstsList::class);
                Route::get('/create', ASHCreate::class);
                Route::get('/input-soal/pg/{uuid}', ASHQuestionpg::class);
                Route::get('/input-soal/essay/{uuid}', ASHQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', ASHQuestionpr::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Akhir Semester
            Route::prefix('/asas')->group(function(){
                Route::get('/', AsasList::class);
                Route::get('/create', ASHCreate::class);
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
            Route::get('/ash/', AshScoreList::class);
            Route::get('/ash/pg/{user_id}/{uuid}', AshScorePg::class);
            Route::get('/ash/essay/{id}/{uuid}', AshScoreEssay::class);
            Route::get('/ash/nilai-essay/{uuid}', AshScoreEssayId::class);
        });
    });
});
