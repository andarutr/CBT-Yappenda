<?php

use App\Models\User;
use App\Helpers\AccountHelper;
use function Livewire\Volt\{layout, title, state, computed, rules};

layout('components.layouts.dashboard');
title('Reset Password Account');

state([
    'statusPage' => 'list',
    'search', 
    'paginate' => 8,
    'user_uuid',

    'name',
    'new_password',
]);

rules([
    'new_password' => 'required|min:8'
]);

$accounts = computed(function(){
    $result = User::where('name','like','%'.$this->search.'%')
                    ->orwhere('email','like','%'.$this->search.'%')
                    ->paginate($this->paginate);

    return $this->search ? $result : User::orderByDesc('id')->paginate($this->paginate);
});

$toPage = function($page){
    $this->statusPage = $page;
};

$editPassword = function($uuid){
    $user = User::where('uuid', $uuid)->firstOrFail();
    $this->statusPage = 'editPassword';
    $this->user_uuid = $user->uuid;
    $this->name = $user->name;
};

$update = function(){
    $this->validate();

    $data = [
        'uuid' => $this->user_uuid,
        'new_password' => $this->new_password,
        'name' => $this->name,
    ];

    $update = AccountHelper::updatePassword($data);
    toastr()->success('Berhasil memperbarui password!');
    return $this->statusPage = 'list';
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            @if($statusPage == 'list')
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
            @else
            <button class="btn btn-sm btn-success mb-1" wire:click="toPage('list')">Kembali</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    @if($statusPage == 'list')
                        @include('components.tables.account-password')
                    @endif

                    @if($statusPage == 'editPassword')
                        @include('components.forms.edit-password-account')
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($statusPage == 'list')
        @include('components.buttons.btn-paginate')
    @endif
</div>