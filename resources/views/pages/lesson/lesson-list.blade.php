<?php

use App\Models\Lesson;
use App\Helpers\LessonHelper;
use function Livewire\Volt\{layout, title, usesPagination, state, rules, computed};

layout('components.layouts.dashboard');
title('List Mata Pelajaran');

usesPagination();

state(['search'])->url();
state([
'lesson_uuid',
'search',
'paginate' => 8,
'statusPage' => 'list',
]);

rules([
    'name' => 'required|unique:lessons'
]);

$lessons = computed(function(){
    $result = Lesson::where('name','like','%'.$this->search.'%')->paginate($this->paginate);    
    $lessons = Lesson::orderBy('name','asc')->paginate($this->paginate);
    return $this->search ? $result : $lessons;
});

$toPage = function($page){
    $this->statusPage = $page;
    $this->name = '';
};

$store = function(){
    $this->validate();
    LessonHelper::store($this->name);
    $this->statusPage = 'list';
};

$edit = function($uuid){
    $this->statusPage = 'edit';
    $lesson = Lesson::where('uuid', $uuid)->firstOrFail();
    $this->lesson_uuid = $uuid;   
    $this->name = $lesson->name;
    $this->statusPage = 'list';
};

$update = function(){
    $data = [
        'uuid' => $this->lesson_uuid,
        'name' => $this->name
    ];

    LessonHelper::update($data);
    $this->statusPage = 'list';
};

$destroy = function($uuid){
    LessonHelper::destroy($uuid);
    toastr()->success('Berhasil menghapus data!');
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
            <button class="btn btn-sm btn-success mb-1" wire:click="toPage('list')">Kembali</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    @if($statusPage == 'list')
                        @include('components.tables.lesson-list')                        
                    @endif

                    @if($statusPage == 'create')
                        @include('components.forms.post-lesson')
                    @endif
                        
                    @if($statusPage == 'edit')
                        @include('components.forms.edit-lesson')
                    @endif
                </div>
            </div>
            @if($statusPage == 'list')
            {{ $this->lessons->links() }}
            @endif
        </div>
    </div>
</div>
