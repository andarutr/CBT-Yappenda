<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Account\RoleList;
use App\Livewire\Account\RoleUpdate;
use App\Livewire\Setting\ProfileShow;
use App\Livewire\Account\SuspendList;
use App\Livewire\Account\AccountList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Account\AccountCreate;
use App\Livewire\Account\AccountUpdate;
use App\Livewire\Account\PasswordAccountList;
use App\Livewire\Account\PasswordAccountUpdate;

// Routes
Route::middleware('isAdmin')->group(function(){
    Route::get('/admin/dashboard', Dashboard::class);
    Route::get('/admin/profile', ProfileShow::class);
    Route::get('/admin/ganti-password', function(){
        return "admin ganti-password";
    });

    Route::get('/admin/account', AccountList::class);
    Route::get('/admin/account/create', AccountCreate::class);
    Route::get('/admin/account/edit/{uuid}', AccountUpdate::class);
    Route::get('/admin/account/reset-password', PasswordAccountList::class);
    Route::get('/admin/account/reset-password/{uuid}', PasswordAccountUpdate::class);
    Route::get('/admin/account/role', RoleList::class);
    Route::get('/admin/account/role/{uuid}', RoleUpdate::class);
    Route::get('/admin/account/suspend', SuspendList::class);
});