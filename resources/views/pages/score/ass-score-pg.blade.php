<?php

use App\Models\{User, Exam, PGQuestion, PGAnswer};
use function Livewire\Volt\{layout, title, state, mount};

layout('components.layouts.dashboard');
title('Lihat Nilai');

state([
    'uuid',
    'exam',
    'user',
    'user_id',
    'pgscore',
    'pganswer',
    'pgquestion',
    'toEssayUrls',
]);

mount(function(){
    $this->user_id = Request::segment(5);
    $this->uuid = Request::segment(6);
    $this->exam = Exam::where('uuid', $this->uuid)->first();
    $this->user = User::where('id', $this->user_id)->first();
    $this->pgquestion = PGQuestion::where('exam_id', $this->exam->id)->get();
    $linktopgquest = PGQuestion::where('exam_id', $this->exam->id)->first();
    $this->pganswer = PGAnswer::where(['user_id' => $this->user_id])->get();
    $this->pgscore = PGAnswer::where(['user_id' => $this->user_id, 'correct' => true])->count();
    $this->toEssayUrls = $linktopgquest->uuid;
});

$toEssayScore = function(){
    return redirect('/guru/input-nilai/ash/essay/'.$this->user_id.'/'.$this->toEssayUrls);
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
                        @foreach($pganswer as $value)
                        <p>Soal : {{ $value->pgQuestion->pgquestion }}
                            <br>
                            @if($value->correct)
                            <i class="fas fa-check"></i>
                            @else
                            <i class="fas fa-times"></i>
                            @endif
                        </p>
                        <p>Jawaban : {{ $value->answer }}</p>
                        <p>Jawaban Benar : {{ $value->pgQuestion->correct }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--/ User Content -->
        </div>
    </section>
</div>