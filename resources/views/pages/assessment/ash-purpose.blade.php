<?php

use Ramsey\Uuid\Uuid;
use App\Models\AshPurpose;
use App\Helpers\AssessmentHelper;
use function Livewire\Volt\{layout, title, state, rules, computed};

layout('components.layouts.dashboard');
title('Tujuan Pembelajaran (TP)');

state(['search'])->url();
state([
    'search',
    'paginate' => 8,
    'statusPage' => 'list',
    'ash_uuid',
    'title',
    'tp_1',
    'tp_2',
    'tp_3',
    'tp_4',
    'tp_5',
    'tp_6',
    'tp_7',
    'tp_8',
]);    

rules([
    'title' => 'required',
    'tp_1' => 'required',
    'tp_2' => 'required',
]);

$purposes = computed(function(){
    $purposes = AshPurpose::paginate($this->paginate);
    $result = AshPurpose::where('title', 'like','%'.$this->search.'%')->paginate($this->paginate);
    return $this->search ? $result : $purposes;
});

$toPage = function($page){
    $this->statusPage = $page;
    $this->reset('title','tp_1','tp_2','tp_3','tp_4','tp_5','tp_6','tp_7','tp_8');
};

$store = function(){
    $this->validate();

    $data = [
        'uuid' => Uuid::uuid4()->toString(),
        'title' => $this->title,
        'tp_1' => $this->tp_1,
        'tp_2' => $this->tp_2,
        'tp_3' => $this->tp_3,
        'tp_4' => $this->tp_4,
        'tp_5' => $this->tp_5,
        'tp_6' => $this->tp_6,
        'tp_7' => $this->tp_7,
        'tp_8' => $this->tp_8,
    ];

    AssessmentHelper::storeAshPurpose($data);
    toastr()->success('Berhasil membuat tujuan pembelajaran!');
    $this->statusPage = 'list';
};

$edit = function($uuid){
    $this->statusPage = 'edit';

    $purpose = AshPurpose::where('uuid', $uuid)->first();
    $this->ash_uuid = $purpose->uuid;
    $this->title = $purpose->title;
    $this->tp_1 = $purpose->tp_1;
    $this->tp_2 = $purpose->tp_2;
    $this->tp_3 = $purpose->tp_3;
    $this->tp_4 = $purpose->tp_4;
    $this->tp_5 = $purpose->tp_5;
    $this->tp_6 = $purpose->tp_6;
    $this->tp_7 = $purpose->tp_7;
    $this->tp_8 = $purpose->tp_8;
};

$update = function(){
    $data = [
        'uuid' => $this->ash_uuid,
        'title' => $this->title,
        'tp_1' => $this->tp_1,
        'tp_2' => $this->tp_2,
        'tp_3' => $this->tp_3,
        'tp_4' => $this->tp_4,
        'tp_5' => $this->tp_5,
        'tp_6' => $this->tp_6,
        'tp_7' => $this->tp_7,
        'tp_8' => $this->tp_8,
    ];

    AssessmentHelper::updateAshPurpose($data);
    toastr()->success('Berhasil memperbarui tujuan pembelajaran!');
    $this->statusPage = 'list';
};

$destroy = function($uuid){
    AssessmentHelper::destroyAshPurpose($uuid);
    toastr()->success('Berhasil menghapus tujuan pembelajaran!');
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
                    <h4 class="card-title">List Tujuan Pembelajaran</h4>
                </div>
                <div class="card-body">
                    @if($statusPage == 'list')
                        @include('components.tables.ash-purpose-list')
                    @endif

                    @if($statusPage == 'create')
                        @include('components.forms.post-ash-purpose')
                    @endif
                        
                    @if($statusPage == 'edit')
                        @include('components.forms.edit-ash-purpose')
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($statusPage == 'list')
        {{ $this->purposes->links() }}
    @endif
</div>
