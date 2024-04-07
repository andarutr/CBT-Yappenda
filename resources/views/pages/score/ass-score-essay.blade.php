<?php

use Illuminate\Support\Facades\Auth;
use App\Models\{Exam, User, EssayAnswer, EssayQuestion};
use function Livewire\Volt\{layout, title, state, mount};

layout('components.layouts.dashboard');
title('Lihat Nilai');

state([
    'uuid',
    'exam',
    'question',
    'essay',
    'user',
    'user_id',
    'essay_question',
    'count',
    'exam_type',
]);

mount(function(){
    $this->user_id = Request::segment(5);
    $this->uuid = Request::segment(6);
    $this->exam_type = Request::segment(3);
    $this->user = User::where('id', $this->user_id)->first();
    $this->exam = Exam::where('uuid', $this->uuid)->first();
    $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get();
    $this->essay = EssayAnswer::where(['user_id' => $this->user_id])->get();
});

$addScoreEssay = function($uuid){
    return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/'.$this->exam_type.'/nilai-essay/'.$uuid);
};

?>

<div class="content-body">
    <section class="app-user-view-account">
    <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/input-nilai/'.Request::segment(3)) }}" class="btn btn-sm btn-success mb-1">Kembali</a>
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <h5>Tipe Ujian : {{ $exam->exam_type }}</h5>
                        <h5>Mata Pelajaran : {{ $exam->lesson->name }}</h5>
                        <h5>Nama Siswa : {{ $user->name }}</h5>
                    </div>
                </div>
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card">
                    <h4 class="card-header">Pratinjau</h4>
                    <div class="card-body pt-1">
                        @foreach($essay_question as $key => $value)
                            <p>Soal {{ $key+1 }} : {{ $value->question }}</p>
                        @endforeach
                        @foreach($essay as $key => $value)
                            @if($value->esQuestion->exam_id == $exam->id)
                            <p>Jawaban No.{{ $key+1 }} :{{ $value->answer }} <a class="badge bg-success" wire:click="addScoreEssay('{{ $value->uuid }}')"><i class=" text-white bi-pencil-fill"></i></a></p>
                            <p>
                                <b>{{ $value->score ? $value->score : 'Belum Dinilai' }}</b>
                            </p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!--/ User Content -->
        </div>
    </section>
</div>
