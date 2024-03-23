<?php

use App\Models\Exam;
use App\Models\Lesson;
use App\Helpers\AssessmentHelper;
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\{layout, title, state, rules, computed};

layout('components.layouts.dashboard');
title('List Asessment Akhir');

state([
    'statusPage' => 'list',
    'lessons',
    'exam_uuid',
    'lesson_id',
    'exam_type',
    'grade',
    'major',
    'semester',
    'th_ajaran',
    'duration',
    'start_time',
    'end_time',
]);

rules([
    'lesson_id',
    'exam_type',
    'grade',
    'major',
    'semester',
    'th_ajaran',
    'duration',
    'start_time',
    'end_time',
]);

$toPage = function($page){
    $this->statusPage = $page;

    $this->lesson_id = '';
    $this->exam_type = '';
    $this->grade = '';
    $this->major = '';
    $this->semester = '';
    $this->th_ajaran = '';
    $this->duration = '';
    $this->start_time = '';
    $this->start_time = '';
    $this->end_time = '';
};

$assessment = computed(function(){
    return Exam::where('exam_type','ASAS')->orderByDesc('start_time')->get();
});

$create = function(){
    $this->statusPage = 'create';
    $this->lessons = Lesson::all();
};

$store = function(){
    $this->validate();

    $data = [
        'lesson_id' => $this->lesson_id,
        'exam_type' => $this->exam_type,
        'grade' => $this->grade,
        'major' => $this->major,
        'semester' => $this->semester,
        'th_ajaran' => $this->th_ajaran,
        'duration' => $this->duration,
        'start_time' => $this->start_time,
        'end_time' => $this->end_time,
    ];
    
    AssessmentHelper::store($data);
    toastr()->success('Berhasil menambahkan assessment!');
    return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($this->exam_type));
};

$edit = function($uuid){
    $this->statusPage = 'edit';
    $exam = Exam::where('uuid', $uuid)->firstOrFail();
    $this->exam_uuid = $exam->uuid;
    $this->lesson_id = $exam->lesson->name;
    $this->exam_type = $exam->exam_type;
    $this->grade = $exam->grade;
    $this->major = $exam->major;
    $this->semester = $exam->semester;
    $this->th_ajaran = $exam->th_ajaran;
    $this->duration = $exam->duration;
    $this->start_time = $exam->start_time;
    $this->start_time = $exam->start_time;
    $this->end_time = $exam->end_time;
};

$update = function(){
    $this->validate();

    $data = [
        'uuid' => $this->exam_uuid,
        'exam_type' => $this->exam_type,
        'grade' => $this->grade,
        'major' => $this->major,
        'semester' => $this->semester,
        'th_ajaran' => $this->th_ajaran,
        'duration' => $this->duration,
        'start_time' => $this->start_time,
        'end_time' => $this->end_time,
    ];
    
    AssessmentHelper::update($data);
    toastr()->success('Berhasil menambah Assessment!');
    return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($this->exam_type));
};

$destroy = function($uuid){
    AssessmentHelper::destroyExam($uuid);
    toastr()->success('Berhasil menghapus assessment!');
    return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/asas');
};

?>

<div class="content-body">
    @if($statusPage == 'list')
    <button class="btn btn-primary mb-2" wire:click="create">Tambah data</button>
    @else
    <button class="btn btn-success mb-2" wire:click="toPage('list')">Kembali</button>
    @endif

    @if($statusPage == 'list')
    <div class="row">
        @foreach($this->assessment as $ass)
        @if($ass->user_id == Auth::user()->id || Auth::user()->role->role === 'Admin')
        <div class="col-lg-4">
            <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $ass->lesson->name }}</h5>
                <p class="card-text">
                    <p>{{ $ass->grade.' '.$ass->major }}</p>
                    <p>Waktu Mulai : {{ \Carbon\Carbon::parse($ass->start_time)->format('d-m-Y H:i') }}</p>
                    <p>Waktu Selesai : {{ \Carbon\Carbon::parse($ass->end_time)->format('d-m-Y H:i') }}</p>
                    <p>Durasi : {{ $ass->duration }} Menit</p>
                    <p>Semester : {{ $ass->semester }}</p>
                    <p>Tahun Ajaran : {{ $ass->th_ajaran }}</p>
                    <p>Guru : {{ $ass->user->name }}</p>
                </p>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-success rounded-circle"><i class="bi-pencil-fill" wire:click="edit('{{ $ass->uuid }}')"></i></button>&nbsp;
                <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/assessment/asas/input-soal/pg/'.$ass->uuid) }}" class="btn btn-sm btn-primary rounded-circle"><i class="bi-plus"></i></a>
                <button wire:click="destroy('{{ $ass->uuid }}')" class="btn btn-sm btn-danger rounded-circle" wire:confirm="Yakin ingin menghapus ASH?"><i class="bi-trash"></i></button>&nbsp;
            </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endif

    @if($statusPage == 'create')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    @include('components.forms.post-assessment')
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($statusPage == 'edit')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    @include('components.forms.edit-assessment')
                </div>
            </div>
        </div>
    </div>
    @endif
</div>