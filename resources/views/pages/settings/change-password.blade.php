<?php

use App\Helpers\SettingHelper;
use function Livewire\Volt\{layout, title, state, rules};

layout('components.layouts.dashboard');
title('Ganti Password');

state([
    'old_password',
    'new_password'
]);

rules([
    'old_password' => 'required|min:8',
    'new_password' => 'required|min:8'
]);

$toPage = function($role){
    return redirect()->to('/'.strtolower($role).'/profile');
};

$updatePassword = function(){
    $this->validate();

    $data = [
        'old_password' => $this->old_password,
        'new_password' => $this->new_password,
    ];

    $this->old_password = '';
    $this->new_password = '';
    
    $update = SettingHelper::updatePassword($data);
}

?>

<div class="content-body">
    <section class="app-user-view-account">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mt-3 mb-2"
                                    src="{{ asset('assets/images/users/'.Auth::user()->picture) }}"
                                    height="110" width="110" alt="User avatar" />
                                <div class="user-info text-center">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <span class="badge bg-light-secondary">{{ Auth::user()->role->role }}</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">Bio</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                @if(Auth::user()->role->role === 'User')
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">NIS:</span>
                                        <span>{{ Auth::user()->nis }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">NISN:</span>
                                        <span>{{ Auth::user()->nisn }}</span>
                                    </li>
                                @endif
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Nama:</span>
                                    <span>{{ Auth::user()->name }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Email:</span>
                                    <span>{{ Auth::user()->email }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Status:</span>
                                    <span class="badge bg-light-success">Active</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Role:</span>
                                    <span>{{ Auth::user()->role->role }}</span>
                                </li>
                                @if(Auth::user()->role->role === 'User')
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Kelas:</span>
                                        <span>{{ Auth::user()->kelas }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Fase:</span>
                                        <span>{{ Auth::user()->fase }}</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                        <a class="nav-link" wire:click="toPage('{{ Auth::user()->role->role }}')">
                            <i class="bi-people" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Account</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="bi-key" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Ganti Password</span>
                        </a>
                    </li>
                </ul>

                <div class="card">
                    <h4 class="card-header">Edit Profile</h4>
                    <div class="card-body pt-1">
                        <form wire:submit="updatePassword">
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Password Lama</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="password" wire:model.live="old_password">
                                    @error('old_password')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Password Baru</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="password" wire:model.live="new_password">
                                    @error('new_password')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                                </div>
                            </div> 
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
