<?php

use App\Helpers\AccountHelper;
use App\Models\{User, Role};
use function Livewire\Volt\{layout, title, state, with, computed};

layout('components.layouts.dashboard');
title('Account Management');

state(['search'])->url();

state([
    'statusPage' => 'list',
    'user_uuid',
    'search',
    'paginate' => 8,
    
    'name',
    'email',
    'role_id',
]);

$accounts = computed(function(){
    $result = User::where('name','like','%'.$this->search.'%')
                    ->orwhere('email','like','%'.$this->search.'%')
                    ->paginate($this->paginate);
    return $this->search ? $result : User::orderByDesc('id')->paginate($this->paginate);
});

with(fn() => [
    'roles' => Role::all(),
]);

$toPage = function($page){
    $this->statusPage = $page;
    $this->name = '';
    $this->email = '';
    $this->role_id = '';
};

$store = function(){
    $this->validate([
        'name' => 'required',
        'email' => 'required|unique:users|email',
        'role_id' => 'required',
    ]);

    $data = [
        'role_id' => $this->role_id,
        'name' => $this->name,
        'email' => $this->email,
    ];

    $store = AccountHelper::store($data);
    toastr()->success('Berhasil menambah akun!');
    $this->statusPage = 'list';
};

$edit = function($uuid){
    $this->statusPage = 'edit';
    $account = User::where('uuid', $uuid)->firstOrFail();

    $this->user_uuid = $account->uuid;
    $this->name = $account->name;
    $this->email = $account->email;
    $this->role_id = $account->role_id;
};

$update = function(){
    $this->validate([
        'name' => 'required',
        'email' => 'required|email',
        'role_id' => 'required',
    ]);

    $data = [
        'uuid' => $this->user_uuid,
        'name' => $this->name,
        'email' => $this->email,
        'role_id' => $this->role_id,
    ];

    $update = AccountHelper::update($data);
    toastr()->success('Berhasil memperbarui akun!');
    $this->statusPage = 'list';
};

$destroy = function($uuid){
    $data = [
        'uuid' => $uuid
    ];

    $destroy = AccountHelper::destroy($data);
    toastr()->success('Berhasil menghapus akun!');
    $this->statusPage = 'list';
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            @if($statusPage == 'list')
            <button class="btn btn-sm btn-primary mb-1" wire:click="toPage('create')">Tambah data</button>
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
            @else
            <button class="btn btn-sm btn-success" wire:click="toPage('list')">Kembali</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Account Management</h4>
                </div>
                <div class="card-body">
                    @if($statusPage == 'list')
                        @include('components.tables.account-list')
                    @endif

                    @if($statusPage == 'create')
                        @include('components.forms.post-account')
                    @endif
                        
                    @if($statusPage !== 'list' AND $statusPage !== 'create')
                        @include('components.forms.edit-account')
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($statusPage == 'list')
        @include('components.buttons.btn-paginate')
    @endif
</div>