<?php

use App\Models\{Role, User};
use App\Helpers\AccountHelper;
use function Livewire\Volt\{layout, title, usesPagination, state, computed, with};

layout('components.layouts.dashboard');
title('Ganti Role Account');

usesPagination();

state(['search'])->url();
state([
    'statusPage' => 'list',
    'user_uuid',
    'paginate' => 8,
    'name',
    'role_id',
]);

$accounts = computed(function(){
    $account = User::orderByDesc('id')->paginate($this->paginate);
    $result = User::where('name','like','%'.$this->search.'%')
                    ->orwhere('email','like','%'.$this->search.'%')
                    ->paginate($this->paginate);

    return $this->search ? $result : $account;
});

with(fn() => [
    'roles' => Role::all()
]);

$toPage = function($page){
    $this->statusPage = $page;
};

$editRole = function($uuid){
    $user = User::where('uuid', $uuid)->firstOrFail();
    $this->statusPage = 'editRole';
    $this->user_uuid = $user->uuid;
    $this->name = $user->name;
    $this->role_id = $user->role_id;
};

$update = function(){
    $data = [
        'uuid' => $this->user_uuid,
        'role_id' => $this->role_id
    ];

    $update = AccountHelper::updateRole($data);
    toastr()->success('Berhasil memperbarui role!');
    $this->statusPage = 'list';
}

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
                    <h4 class="card-title">Ganti Role Account</h4>
                </div>
                <div class="card-body">
                    @if($statusPage == 'list')
                        @include('components.tables.account-role')
                    @endif

                    @if($statusPage == 'editRole')
                        @include('components.forms.edit-role-account')
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{ $this->accounts->links() }}
</div>