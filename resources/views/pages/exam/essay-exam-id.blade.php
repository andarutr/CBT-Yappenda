<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\{ Auth, Request };
use function Livewire\Volt\{layout, title, state, mount};
use App\Models\{Exam, Remedial, ExamResult, PGQuestion, EssayQuestion, EssayAnswer};

layout('components.layouts.dashboard');
title('Essay');

state([
    'uuid',
    'exam',
    'answer',
    'id_quest',
    'picture',
    'question',
    'box_question',
    'box_question_essay',
]);

mount(function(){
    $this->id_quest = Request::segment(4); 
    $this->uuid = Request::segment(5);
    $this->exam = Exam::where('uuid', $this->uuid)->first();
    $essay = EssayQuestion::where('id', $this->exam->id)->first();
    $this->question = EssayQuestion::where(['exam_id' => $this->exam->id, 'id' => $this->id_quest])->first();
    $this->picture = $this->question->picture;
    $this->box_question = PGQuestion::where('exam_id', $this->exam->id)->get();
    $this->box_question_essay = EssayQuestion::where('exam_id', $this->exam->id)->get();
    
    $fulled = EssayAnswer::where(['user_id' => Auth::user()->id, 'essay_question_id' => $this->id_quest])->first();
    
    if($fulled){
        $this->answer = $fulled->answer;
    }
});

$store = function(){
    EssayAnswer::updateOrCreate([
        'user_id' => Auth::user()->id,
        'essay_question_id' => $this->id_quest
    ],
    [
        'uuid' => Uuid::uuid4()->toString(),
        'essay_question_id' => $this->question->id,
        'user_id' => Auth::user()->id,
        'answer' => $this->answer
    ]);

    toastr()->success('Jawaban tersimpan!');
};

$endExam = function(){
    $remed = Remedial::where(['user_id' => Auth::user()->id, 'exam_id' => $this->exam->id])->exists();
    
    if($remed){
        Remedial::where(['exam_id' => $this->exam->id, 'user_id' => Auth::user()->id])
                    ->updateOrCreate([
                        'exam_id' => $this->exam->id, 
                        'user_id' => Auth::user()->id
                    ],[
                        'is_end' => true
                    ]);
    }else{
        ExamResult::where(['exam_id' => $this->exam->id, 'user_id' => Auth::user()->id])
                    ->updateOrCreate([
                        'exam_id' => $this->exam->id, 
                        'user_id' => Auth::user()->id
                    ],[
                        'is_end' => true
                    ]);
    }
    
    toastr()->success('Selamat anda telah menyelesaikan ujian!');
    return redirect('/user/ujian/'.strtolower($this->exam->exam_type));
};

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
                        @include('components.forms.post-edit-essay-exam')
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                    @php
                    $now = \Carbon\Carbon::now();
                    $end = \Carbon\Carbon::parse($exam->end_time);
                    @endphp 
                    <h3 class="mb-0 met-user-name-post text-center mb-3 mt-1" wire:poll.keep-alive>Sisa Waktu : <br>{{ $end->diffInMinutes($now) }} menit</h3>  
                        @foreach($box_question as $key => $value)
                        <div class="col-lg-3 mb-2">
                            <a href="{{ url('/user/ujian/pg/'.$value->id.'/'.$uuid) }}" class="btn btn-primary text-white" wire:navigate>{{ $key+1 }}</a><br>
                        </div>
                        @endforeach
                        </div>
                        <div class="row">
                            <p class="mt-1">
                                <b>Essay</b>
                            </p>
                            @foreach($box_question_essay as $key => $value)
                            <div class="col-lg-3 mb-2">
                                <a href="{{ url('/user/ujian/essay/'.$value->id.'/'.$uuid) }}" class="btn btn-warning text-white" wire:navigate>{{ $key+1 }}</a>
                            </div>
                            @endforeach
                            <a href="{{ url('/user/ujian/preview/'.$exam->uuid) }}" class="text-center" wire:navigate>Preview Jawaban</a>
                        </div>
                    </div>
                </div>
                <button class="form-control btn btn-success mb-3" wire:click="endExam" wire:confirm="Yakin ingin menyelesaikan ujian ini? Pastikan semua soal telah terisi...">Selesai</button>
            </div>
        </div>
    </section>
    @endif
</div>

@assets
<link href="{{ url('assets/css/lightbox.css') }}" rel="stylesheet" />
<script src="{{ url('assets/js/lightbox-plus-jquery.min.js') }}"></script>
@endassets
