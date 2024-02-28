<?php

use App\Livewire\Guru\Dashboard;
use App\Livewire\Guru\LessonList;
use App\Livewire\Assessment\ASHList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Assessment\AstsList;
use App\Livewire\Setting\ProfileShow;
use App\Livewire\Assessment\ASHCreate;
use App\Livewire\Assessment\AstsCreate;
use App\Livewire\Setting\ChangePassword;
use App\Livewire\Assessment\ASHQuestionpg;
use App\Livewire\Assessment\ASHQuestionpr;
use App\Livewire\Assessment\AstsQuestionpg;
use App\Livewire\Assessment\AstsQuestionpr;
use App\Livewire\Assessment\ASHQuestionessay;
use App\Livewire\Assessment\AstsQuestionessay;
use App\Livewire\Assessment\ASHEditQuestionpg;
use App\Livewire\Assessment\AstsEditQuestionpg;
use App\Livewire\Assessment\ASHEditQuestionessay;
use App\Livewire\Assessment\AstsEditQuestionessay;

// Route
Route::middleware('isGuru')->group(function(){
    Route::prefix('/guru')->group(function(){
        Route::get('/dashboard', Dashboard::class);
        Route::get('/profile', ProfileShow::class);
        Route::get('/ganti-password', ChangePassword::class);

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

                Route::get('/edit-soal/pg/{uuid}', ASHEditQuestionpg::class);
                Route::get('/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            });

            // Assessment Sumatif Tengah Semester
            Route::prefix('/asts')->group(function(){
                Route::get('/', AstsList::class);
                Route::get('/create', AstsCreate::class);
                Route::get('/input-soal/pg/{uuid}', AstsQuestionpg::class);
                Route::get('/input-soal/essay/{uuid}', AstsQuestionessay::class);
                Route::get('/input-soal/preview/{uuid}', AstsQuestionpr::class);

                Route::get('/edit-soal/pg/{uuid}', AstsEditQuestionpg::class);
                Route::get('/edit-soal/essay/{uuid}', AstsEditQuestionessay::class);
            });

            Route::get('/asas', function(){
                abort(503);
            });
            Route::get('/pas', function(){
                abort(503);
            });
        });
    });
});
