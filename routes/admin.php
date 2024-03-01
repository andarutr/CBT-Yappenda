<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Dashboard;
use App\Livewire\Account\RoleList;
use App\Livewire\Lesson\LessonList;
use App\Livewire\Account\RoleUpdate;
use App\Livewire\Account\AccountList;
use App\Livewire\Account\SuspendList;
use App\Livewire\Lesson\LessonCreate;
use App\Livewire\Lesson\LessonUpdate;
use App\Livewire\Setting\ProfileShow;
use App\Livewire\Account\AccountCreate;
use App\Livewire\Account\AccountUpdate;
use App\Livewire\Account\PasswordAccountUpdate;
use App\Livewire\Setting\ChangePassword;
use App\Livewire\Account\PasswordAccountList;
use App\Livewire\Assessment\ASHList;
use App\Livewire\Assessment\AsasList;
use App\Livewire\Assessment\AstsList;
use App\Livewire\Assessment\ASHQuestionpr;
use App\Livewire\Assessment\ASHQuestionpg;
use App\Livewire\Assessment\ASHQuestionessay;
use App\Livewire\Assessment\ASHCreate;
use App\Livewire\Assessment\ASHEditQuestionessay;

// Routes
Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::get('/dashboard', Dashboard::class);
        
        // Settings
        Route::get('/profile', ProfileShow::class);
        Route::get('/ganti-password', ChangePassword::class);

        // Management Account
        Route::prefix('/account')->group(function(){
            Route::get('/', AccountList::class);
            Route::get('/create', AccountCreate::class);
            Route::get('/edit/{uuid}', AccountUpdate::class);
            Route::get('/reset-password', PasswordAccountList::class);
            Route::get('/reset-password/{uuid}', PasswordAccountUpdate::class);
            Route::get('/role', RoleList::class);
            Route::get('/role/{uuid}', RoleUpdate::class);
            Route::get('/suspend', SuspendList::class);
        });

        // Mata Pelajaran
        Route::prefix('/mata-pelajaran')->group(function(){
            Route::get('/', LessonList::class);
            Route::get('/create', LessonCreate::class);
            Route::get('/edit/{uuid}', LessonUpdate::class);
        });

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

            // Penilaian Akhir Semester
            Route::get('/pas', function(){
                abort(503);
            });
        });
    });
});