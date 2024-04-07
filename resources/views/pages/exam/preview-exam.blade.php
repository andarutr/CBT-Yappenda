<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\{Auth, Request};
use function Livewire\Volt\{layout, title, state, mount};
use App\Models\{Exam, PGAnswer, PGQuestion, EssayQuestion};

layout('components.layouts.dashboard');
title('Preview Soal');

state([
    'uuid',
    'exam',
    'pg_answer',
    'pg_question',
    'essay_question',
]);

mount(function(){
    $this->uuid = Request::segment(4);
    $this->exam = Exam::where('uuid', $this->uuid)->first();

    $this->pg_question = PGQuestion::where('exam_id', $this->exam->id)->get(); 
    $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get(); 
});

?>

<div class="content-body">
    @php
        $now = Carbon::now();
        $end = Carbon::parse($this->exam->end_time);  
    @endphp    
    @if($now > $end)
    <section class="app-user-view-account">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card">
                    <h4 class="card-header">Waktu Ujian Telah Habis!</h4>
                    <div class="card-body pt-1">
                        <p>Waktu ujian kamu telah habis. Silahkan klik tombol dibawah untuk kembali...</p>
                        <a href="{{ url('/user/dashboard') }}" class="btn btn-sm btn-success">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($now < $end)
    <section class="app-user-view-account">
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card">
                    <h4 class="card-header">Selamat Mengerjakan</h4>
                    <div class="card-body pt-1">
                        <form wire:submit="">
                            <div class="form-group mb-3 row">
                                <div class="col-lg-12 col-xl-12">
                                    @foreach($pg_question as $key => $value)
                                    <p>{{ $key+1 }}. {{ $value->pgquestion }}</p>
                                    <ul>
                                        @foreach(json_decode($value->option) as $huruf => $opsi)
                                        <li>{{ $huruf }}. {{ $opsi }}</li>
                                        @endforeach
                                    </ul>
                                        @foreach($value->pgAnswer as $val)
                                        <p>Jawaban : <b>{{ $val->answer }}</b></p>
                                        @endforeach
                                    @endforeach

                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <form wire:submit="">
                            <div class="form-group mb-3 row">
                                <div class="col-lg-12 col-xl-12">
                                    @foreach($essay_question as $key => $value)
                                    <p>{{ $key+1 }}. {{ $value->question }}</p>
                                        @foreach($value->esAnswer as $v)
                                        <p>Jawaban : <b>{{ $v->answer }}</b></p>
                                        @endforeach
                                    @endforeach
                                    <p>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
                <a href="{{ url('/user/ujian/pg/'.$exam->uuid) }}" class="form-control btn btn-success mb-3" wire:navigate>Soal</a>
            </div>
        </div>
    </section>
    @endif
</div>