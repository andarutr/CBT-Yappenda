<?php

use Ramsey\Uuid\Uuid;
use App\Helpers\AssessmentHelper;
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\{layout, title, state, rules, mount, computed};
use App\Models\{User, Lesson, AshResult, AshPurpose};

layout('components.layouts.dashboard');
title('Tambahkan Nilai TP');

state([
    'user_uuid',
    'ash_uuid',
    'statusPage' => 'list',

    'lesson_id',
    'ash_purpose_id',
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
    'lesson_id' => 'required',
    'ash_purpose_id' => 'required',
    'tp_1' => 'required',
    'tp_2' => 'required',
]);

mount(function(){
    $this->user_uuid = Request::segment(4);
});

$user = computed(function(){
    return User::where('uuid', $this->user_uuid)->first();
});

$lessons = computed(function(){
    return Lesson::all();
});

$purposes = computed(function(){
    return AshPurpose::all();
});

$ashPurposes = computed(function(){
    return AshResult::where('user_id', $this->user->id)->get();
});

$toPage = function($page){
    $this->statusPage = $page;
    $this->reset('lesson_id','ash_purpose_id','tp_1','tp_2','tp_3','tp_4','tp_5','tp_6','tp_7','tp_8');
};

$create = function(){
    $this->statusPage = 'create';
};

$store = function(){
    $this->validate();
    
    $user_id = User::where('uuid', $this->user_uuid)->first();

    $data = [
        'user_id' => $user_id->id,
        'lesson_id' => $this->lesson_id,
        'ash_purpose_id' => $this->ash_purpose_id,
        'tp_1' => $this->tp_1,
        'tp_2' => $this->tp_2,
        'tp_3' => $this->tp_3,
        'tp_4' => $this->tp_4,
        'tp_5' => $this->tp_5,
        'tp_6' => $this->tp_6,
        'tp_7' => $this->tp_7,
        'tp_8' => $this->tp_8,
    ];
    
    AssessmentHelper::storeAshResultId($data);
    $this->statusPage = 'list';
    toastr()->success('Berhasil membuat tujuan pembelajaran!');
};

$edit = function($uuid){
    $this->statusPage = 'edit';
    $ash = AshResult::where('uuid', $uuid)->first();
    $this->ash_uuid = $uuid;
    $this->lesson_id = $ash->lesson_id;
    $this->ash_purpose_id = $ash->ash_purpose_id;
    $this->tp_1 = $ash->tp_1;
    $this->tp_2 = $ash->tp_2;
    $this->tp_3 = $ash->tp_3;
    $this->tp_4 = $ash->tp_4;
    $this->tp_5 = $ash->tp_5;
    $this->tp_6 = $ash->tp_6;
    $this->tp_7 = $ash->tp_7;
    $this->tp_8 = $ash->tp_8;
};

$update = function(){
    $this->validate();

    $data = [
        'uuid' => $this->ash_uuid,
        'lesson_id' => $this->lesson_id,
        'ash_purpose_id' => $this->ash_purpose_id,
        'tp_1' => $this->tp_1,
        'tp_2' => $this->tp_2,
        'tp_3' => $this->tp_3,
        'tp_4' => $this->tp_4,
        'tp_5' => $this->tp_5,
        'tp_6' => $this->tp_6,
        'tp_7' => $this->tp_7,
        'tp_8' => $this->tp_8,
    ];

    AssessmentHelper::updateAshResultId($data);
    $this->statusPage = 'list';
    toastr()->success('Berhasil memperbarui tujuan pembelajaran!');
};

$destroy = function($uuid){
    AssessmentHelper::destroyAshResultId($uuid);
    toastr()->success('Berhasil menghapus tujuan pembelajaran!');
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-4">
            <p>Nama : <b>{{ $this->user->name }}</b></p>
            <p>Kelas : <b>{{ $this->user->kelas }}</b></p>
            <p>Fase : <b>{{ $this->user->fase }}</b></p>
            @if($statusPage == 'list')
            <button wire:click="create()" class="btn btn-sm btn-primary mb-2">Tambah data</button>
            @else
            <button wire:click="toPage('list')" class="btn btn-sm btn-success mb-2">Kembali</button>
            @endif
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($statusPage == 'list')
                        @include('components.tables.ash-result-list')
                    @endif

                    @if($statusPage == 'create')
                        @include('components.forms.post-ash-result-id')
                    @endif

                    @if($statusPage == 'edit')
                        @include('components.forms.edit-ash-result-id')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
