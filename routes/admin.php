<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Account\AccountList;
use Illuminate\Support\Facades\Route;

// Routes
Route::get('/admin/dashboard', Dashboard::class);
Route::get('/admin/profile', function(){
    return "admin profile";
});
Route::get('/admin/ganti-password', function(){
    return "admin ganti-password";
});

Route::get('/admin/account', AccountList::class);