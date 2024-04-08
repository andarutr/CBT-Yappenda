@php    
$kelas_ = [
    'Kelas XII-1' => 'XII-1',
    'Kelas XII-2' => 'XII-2',
    'Kelas XII-3' => 'XII-3',
    'Kelas XII-4' => 'XII-4',
    'Kelas XII-5' => 'XII-5',
    'Kelas XII-6' => 'XII-6',
    'Kelas XII-7' => 'XII-7',
    'Kelas XII-8' => 'XII-8'
];
@endphp

<?php

use App\Models\Rapor;
use Illuminate\Database\Eloquent\Builder;
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Rapor Kelas XII');

state(['kelas' => 'XII-1']);

$rapors = computed(function(){
    $rapor = Rapor::whereHas('user', function(Builder $query){
        $query->where('kelas', 'XII-1');
    })->get();

    $result = Rapor::whereHas('user', function(Builder $query){
        $query->where('kelas', 'like','%'.$this->kelas.'%');
    })->get();

    return $this->kelas ? $result : $rapor;
});

$destroy = function($uuid){
    Rapor::where('uuid', $uuid)->delete();
    return redirect()->back()->with('success', 'Berhasil menghapus rapor!');
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-3">
            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XII/create') }}" class="btn btn-sm btn-primary mb-1">Tambah data</a>
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
