<?php

use App\Livewire\Guru\Dashboard;
use App\Livewire\Guru\LessonList;
use App\Livewire\Assessment\ASHList;
use App\Livewire\Setting\ProfileShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Assessment\ASHCreate;
use App\Livewire\Assessment\ASHQuestion;
use App\Livewire\Setting\ChangePassword;

// Route
Route::middleware('isGuru')->group(function(){
    Route::prefix('/guru')->group(function(){
        Route::get('/dashboard', Dashboard::class);
        Route::get('/profile', ProfileShow::class);
        Route::get('/ganti-password', ChangePassword::class);

        Route::get('/mata-pelajaran', LessonList::class);
        
        Route::prefix('/assessment')->group(function(){
            Route::get('/ash', ASHList::class);
            Route::get('/ash/create', ASHCreate::class);
            Route::get('/ash/input-soal/{uuid}', ASHQuestion::class);

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
