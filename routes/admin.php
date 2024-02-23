<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Account\AccountList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Account\AccountCreate;

// Routes
Route::middleware('isAdmin')->group(function(){
    Route::get('/admin/dashboard', Dashboard::class);
    Route::get('/admin/profile', function(){
        return "admin profile";
    });
    Route::get('/admin/ganti-password', function(){
        return "admin ganti-password";
    });

    Route::get('/admin/account', AccountList::class);
    Route::get('/admin/account/create', AccountCreate::class);
});