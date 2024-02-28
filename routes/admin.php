<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Account\RoleList;
use App\Livewire\Lesson\LessonList;
use App\Livewire\Account\RoleUpdate;
use App\Livewire\Assessment\ASHList;
use App\Livewire\Assessment\ASHCreate;
use App\Livewire\Assessment\ASHQuestionpg;
use App\Livewire\Assessment\ASHQuestionessay;
use App\Livewire\Assessment\ASHQuestionpr;
use App\Livewire\Assessment\ASHEditQuestionpg;
use App\Livewire\Assessment\ASHEditQuestionessay;
use App\Livewire\Account\AccountList;
use App\Livewire\Account\SuspendList;
use App\Livewire\Lesson\LessonCreate;
use App\Livewire\Lesson\LessonUpdate;
use App\Livewire\Setting\ProfileShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Account\AccountCreate;
use App\Livewire\Account\AccountUpdate;
use App\Livewire\Setting\ChangePassword;
use App\Livewire\Account\PasswordAccountList;
use App\Livewire\Account\PasswordAccountUpdate;

// Routes
Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::get('/dashboard', Dashboard::class);
        Route::get('/profile', ProfileShow::class);
        Route::get('/ganti-password', ChangePassword::class);

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

        Route::prefix('/mata-pelajaran')->group(function(){
            Route::get('/', LessonList::class);
            Route::get('/create', LessonCreate::class);
            Route::get('/edit/{uuid}', LessonUpdate::class);
        });

        Route::prefix('/assessment')->group(function(){
            Route::get('/ash', ASHList::class);
            Route::get('/ash/create', ASHCreate::class);
            Route::get('/ash/input-soal/pg/{uuid}', ASHQuestionpg::class);
            Route::get('/ash/input-soal/essay/{uuid}', ASHQuestionessay::class);
            Route::get('/ash/input-soal/preview/{uuid}', ASHQuestionpr::class);

            Route::get('/ash/edit-soal/pg/{uuid}', ASHEditQuestionpg::class);
            Route::get('/ash/edit-soal/essay/{uuid}', ASHEditQuestionessay::class);
            Route::get('/asts', function(){
                abort(503);
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