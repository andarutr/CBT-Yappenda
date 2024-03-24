<?php

use App\Helpers\AssessmentHelper;
use App\Models\{Exam, PGQuestion, EssayQuestion};
use function Livewire\Volt\{layout, title, state, mount};

layout('components.layouts.dashboard');
title('Preview Soal Ujian PG dan Essay');

state([
    'uuid',
    'exam',
    'essay_question',
    'pg_question',
]);

mount(function(){
    $this->uuid = \Request::segment(6);
    $this->exam = Exam::where('uuid', $this->uuid)->first();
    $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get();
    $this->pg_question = PGQuestion::where('exam_id', $this->exam->id)->get();
});

$destroy_pg = function($id_quest){
    AssessmentHelper::destroyPg($id_quest);
    toastr()->success('Berhasil menghapus soal PG!');
};

$destroy_essay = function($id_quest){
    AssessmentHelper::destroyEs($id_quest);
    toastr()->success('Berhasil menghapus soal Essay!');
};

?>

<div class="content-body">
    <section class="app-ecommerce-details">
        <div class="item-features mb-5">
            <div class="row text-center">
                <div class="col-12 col-md-4">
                    <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($exam->exam_type).'/input-soal/pg/'.$uuid) }}" class="btn btn-primary form-control">Soal PG</a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="#" class="btn btn-success form-control">Essay</a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($exam->exam_type).'/input-soal/preview/'.$uuid) }}" class="btn btn-info form-control">Preview</a>
                </div>
            </div>
        </div>
        <h4>{{ $exam->lesson->name }} ({{ $exam->grade.' '.$exam->major}}) Semester {{ $exam->semester }} - {{ $exam->th_ajaran }}</h4>
        <span class="card-text item-company">By <a href="#" class="company-name">{{ $exam->user->name }}</a></span>
        <div class="card" wire:poll.keep-alive>
            <div class="card-body mb-3">
                <div class="row my-2">
                    <div class="col-12 col-md-7">
                        <h5>Soal PG</h5>
                        @foreach($pg_question as $key => $pg)
                            @if($pg->picture)
                                <img src="{{ asset('assets/images/exam/'.$pg->picture) }}" class="img-fluid mb-3" width="250">
                            @endif
                            <p>{{ $key + 1 }} {{ $pg->pgquestion }} 
                                <a class="text-white badge bg-danger" wire:click="destroy_pg('{{ $pg->id }}')" wire:confirm="Yakin ingin menghapus data?"><i class="bi-trash"></i></a>
                            </p>
                            @foreach(json_decode($pg->option) as $key => $value)
                            <ul>
                                <li>{{ $key }}. {{ $value }}</li>
                            </ul>
                            @endforeach
                            <p>Jawaban Benar : <b>{{ $pg->correct }}</b></p>
                            <hr>
                        @endforeach
                    </div>
                    <div class="col-12 col-md-5">
                        <h5>Soal Essay</h5>
                        @foreach($essay_question as $key => $essay)
                        @if($essay->picture)
                            <img src="{{ asset('assets/images/exam/'.$essay->picture) }}" class="img-fluid mb-3" width="250">
                        @endif
                        <p>{{ $key + 1 }}.{{ $essay->question }} 
                            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($essay->exam->exam_type).'/edit-soal/essay/'.$essay->uuid) }}" class="badge bg-success"><i class="bi-pencil-fill"></i></a>
                            <a class=" text-white badge bg-danger" wire:click="destroy_essay('{{ $essay->id }}')" wire:confirm="Yakin ingin menghapus data?"><i class="bi-trash"></i></a>
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
</div>

@assets
<link href="{{ url('assets/css/lightbox.css') }}" rel="stylesheet" />
<script src="{{ url('assets/js/lightbox-plus-jquery.min.js') }}"></script>
@endassets
