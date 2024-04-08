@php    
$kelas_ = [
    'Kelas X-1' => 'X-1',
    'Kelas X-2' => 'X-2',
    'Kelas X-3' => 'X-3',
    'Kelas X-4' => 'X-4',
    'Kelas X-5' => 'X-5',
    'Kelas X-6' => 'X-6',
    'Kelas X-7' => 'X-7',
    'Kelas X-8' => 'X-8'
];
@endphp

<?php

use App\Models\Rapor;
use Illuminate\Database\Eloquent\Builder;
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Rapor Kelas X');

state(['kelas' => 'X-1']);

$rapors = computed(function(){
    $rapor = Rapor::whereHas('user', function(Builder $query){
        $query->where('kelas', 'X-1');
    })->get();

    $result = Rapor::whereHas('user', function(Builder $query){
        $query->where('kelas', 'like','%'.$this->kelas.'%');
    })->get();

    return $this->kelas ? $result : $rapor;
});

$destroy = function($uuid){
    Rapor::where('uuid', $uuid)->delete();
    toastr()->success('Berhasil menghapus data!');
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-3">
            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/X/create') }}" class="btn btn-sm btn-primary mb-1">Tambah data</a>
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
