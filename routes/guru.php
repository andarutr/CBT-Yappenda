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
	Route::get('/guru/dashboard', Dashboard::class);
	Route::get('/guru/profile', ProfileShow::class);
	Route::get('/guru/ganti-password', ChangePassword::class);
	
	Route::get('/guru/mata-pelajaran', LessonList::class);

	Route::get('/guru/assessment/ash', ASHList::class);
	Route::get('/guru/assessment/ash/create', ASHCreate::class);
	Route::get('/guru/assessment/ash/input-soal/{uuid}', ASHQuestion::class);

	Route::get('/guru/assessment/asts', function(){
        abort(503);
    });
    Route::get('/guru/assessment/asas', function(){
        abort(503);
    });
    Route::get('/guru/assessment/pas', function(){
        abort(503);
    });
});