<?php

use App\Models\User;
use App\Helpers\AccountHelper;
use function Livewire\Volt\{layout, title, usesPagination, state, computed};

layout('components.layouts.dashboard');
title('Suspend Account');

usesPagination();

state(['search'])->url();
state(['paginate' => 8]);

$accounts = computed(function(){
    $account = User::orderByDesc('id')->paginate($this->paginate);
    $result = User::where('name','like','%'.$this->search.'%')
                    ->orwhere('email','like','%'.$this->search.'%')
                    ->paginate($this->paginate);

    return $this->search ? $result : $account;
});

$suspend = function($uuid){
    $data = [
        'uuid' => $uuid,
    ];

    $suspend = AccountHelper::suspend($data);
    toastr()->success('Berhasil suspend akun!');
    return redirect()->to('/admin/account/suspend');
};

$unSuspend = function($uuid){
    $data = [
        'uuid' => $uuid,
    ];

    $suspend = AccountHelper::unSuspend($data);
    toastr()->success('Berhasil un-suspend akun!');
    return redirect()->to('/admin/account/suspend');
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Suspend Account</h4>
                </div>
                <div class="card-body">
                    @include('components.tables.account-suspend')
                </div>
            </div>
        </div>
    </div>
    {{ $this->accounts->links() }}
</div>