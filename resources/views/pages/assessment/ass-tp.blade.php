<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Tambah Nilai TP');

state(['search'])->url();
state([
    'statusPage' => 'list',
    'kelas',
    'search',
]);

$users = computed(function(){
    $users = User::where('kelas', $this->kelas)->get();
    $result = User::where('name', 'like','%'.$this->search.'%')->get();
    return $this->search ? $result : $users;
});

$showScore = function($uuid){
    return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/tp/'.$uuid);
};

$toPage = function($page){
    $this->statusPage = $page;
};

$show = function($kelas){
    $this->statusPage = 'show';
    $this->kelas = $kelas;
};

?>

@php
$kelas = [
    ["kelas" => "X-1"],["kelas" => "X-2"],["kelas" => "X-3"],["kelas" => "X-4"],["kelas" => "X-5"],["kelas" => "X-6"],["kelas" => "X-7"],["kelas" => "X-8"],["kelas" => "XI-1"],["kelas" => "XI-2"],["kelas" => "XI-3"],["kelas" => "XI-4"],["kelas" => "XI-5"],["kelas" => "XI-6"],["kelas" => "XI-7"],["kelas" => "XI-8"],["kelas" => "XII-1"],["kelas" => "XII-2"],["kelas" => "XII-3"],["kelas" => "XII-4"],["kelas" => "XII-5"],["kelas" => "XII-6"],["kelas" => "XII-7"],["kelas" => "XII-8"]
];
@endphp

<div class="content-body">
    @if($statusPage == 'list')
    <div class="row">
        @foreach($kelas as $kls)
        <div class="col-lg-3">
            <div class="card mb-1">
            <div class="card-header header-elements">
                <span class=" me-2">Kelas {{ $kls['kelas'] }}</span>
                <div class="card-header-elements ms-auto">
                <button wire:click="show('{{ $kls['kelas'] }}')" class="badge bg-primary text-white"><i class="bi-eye"></i></button>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    @if($statusPage == 'show')
    <button wire:click="toPage('list')" class="btn btn-sm btn-success mb-2"> Kembali</button>
    <div class="row">
        <div class="col-4">
            <input type="text" class="form-control mb-2" wire:model.live="search" placeholder="Cari data...">
        </div>
    </div>
    <div class="row">
        @foreach($this->users as $user)
        <div class="col-lg-3">
            <div class="card mb-1">
            <div class="card-header">
                <p>{{ $user->name }}</p>
            </div>
            <div class="card-body">
                <p>Kelas : {{ $user->kelas }}</p>
                <p>Fase : {{ $user->fase }}</p>
            </div>
            <div class="card-footer">
                <button wire:click="showScore('{{ $user->uuid }}')" class="badge bg-primary text-white"><i class="bi-eye"></i> Nilai</button>
            </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
