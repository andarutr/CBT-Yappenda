<?php

use App\Models\{Rapor, ContentRapor};
use function Livewire\Volt\{layout, title, state, mount};

layout('components.layouts.dashboard');
title('Rapor');

state([
    'uuid',
    'rapor',
    'contents',
]);

mount(function(){
    $this->uuid = Request::segment(5);
    $this->rapor = Rapor::where('uuid', $this->uuid)->first();
    $this->contents = ContentRapor::where('rapor_id', $this->rapor->id)->get();
});

$destroy = function($uuid){
    ContentRapor::where('uuid', $uuid)->delete();
    toastr()->success('Berhasil menghapus nilai!');
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <h5>Nama : {{ $rapor->user->name }}</h5>
            <h5>Kelas : {{ $rapor->user->kelas }}</h5>
            <h5>Semester : {{ $rapor->semester }}</h5>
            <h5>Tahun Ajaran : {{ $rapor->th_ajaran }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.Request::segment(4).'/'.$rapor->user_id.'/'.$rapor->uuid.'/create') }}" class="btn btn-sm btn-primary" wire:navigate>Tambah data</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mt-1">
                <div class="card-body">
                    <div class="table-responsive mt-1">
                        <table class="table" id="datatable_1">
                            <thead class="thead-light">
                              <tr>
                                <th>Mata Pelajaran</th>
                                <th>Nilai</th>
                                <th>Capaian Pembelajaran</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($contents as $content)
                                <tr>
                                    <td>{{ $content->exam->lesson->name }}</td>
                                    <td>{{ $content->nilai }}</td>
                                    <td>{{ $content->description }}</td>
                                    <td>
                                        <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.Request::segment(4).'/'.$content->rapor->user_id.'/'.$content->rapor->uuid.'/edit') }}" class="btn btn-sm btn-success" wire:navigate><i class="bi-pencil-fill"></i> </a>
                                        <button class="btn btn-sm btn-danger" wire:click="destroy('{{ $content->uuid }}')" wire:confirm="Yakin ingin menghapus data?"><i class="bi-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach                      
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
