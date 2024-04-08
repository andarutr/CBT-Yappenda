@php    
$kelas_ = [
    'Kelas XI-1' => 'XI-1',
    'Kelas XI-2' => 'XI-2',
    'Kelas XI-3' => 'XI-3',
    'Kelas XI-4' => 'XI-4',
    'Kelas XI-5' => 'XI-5',
    'Kelas XI-6' => 'XI-6',
    'Kelas XI-7' => 'XI-7',
    'Kelas XI-8' => 'XI-8'
];
@endphp

<?php

use App\Models\Rapor;
use Illuminate\Database\Eloquent\Builder;
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Rapor Kelas XI');

state(['kelas' => 'XI-1']);

$destroy = function($uuid){
    Rapor::where('uuid', $uuid)->delete();
    return redirect()->back()->with('success', 'Berhasil menghapus rapor!');
};

$rapors = computed(function(){
    $rapor = Rapor::whereHas('user', function(Builder $query){
        $query->where('kelas', 'XI-1');
    })->get();

    $result = Rapor::whereHas('user', function(Builder $query){
        $query->where('kelas', 'like','%'.$this->kelas.'%');
    })->get();

    return $this->kelas ? $result : $rapor;
});

?>

<div class="content-body">
    <div class="row">
        <div class="col-3">
            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XI/create') }}" class="btn btn-sm btn-primary mb-1">Tambah data</a>
            <select class="form-select" wire:model.live="kelas">
                <option>Pilih Kelas</option>          
                @foreach($kelas_ as $key => $value)      
                <option value="{{ $value }}">{{ $key }}</option>                
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mt-1">
                <div class="card-header">
                    <b>Rapor Kelas {{ $kelas }}</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-1">
                        @include('components.tables.kelas-all')
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>