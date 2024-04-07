<?php

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\{Auth, Request};
use App\Models\{Exam, PGQuestion, EssayQuestion};
use function Livewire\Volt\{layout, title, state, mount};

layout('components.layouts.dashboard');
title('Ketentuan Ujian');

state([
    'uuid',
    'exam',
    'answer',
    'box_question',
    'box_question_essay'
]);

mount(function(){
    $this->uuid = Request::segment(4);
    $this->exam = Exam::where('uuid', $this->uuid)->first();
    $this->box_question = PGQuestion::where('exam_id', $this->exam->id)->get();
    $this->box_question_essay = EssayQuestion::where('exam_id', $this->exam->id)->get();
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
                        <p>Mohon diperhatikan dan patuhi semua instruksi yang diberikan oleh pengawas ujian. Ini termasuk penggunaan waktu, larangan berkomunikasi, dan tata tertib lainnya.</p>
                        <ul>
                            <li>Etika Ujian: Harap menjalani ujian dengan integritas yang tinggi dan tidak melakukan tindakan kecurangan atau pelanggaran etika akademik apa pun.</li>
                            <li>Fokus dan Ketenangan: Coba untuk tetap tenang dan fokus selama ujian berlangsung. Jangan biarkan kecemasan mengganggu konsentrasi Anda.</li>
                            <li>Waktu: Pastikan Anda tiba tepat waktu di tempat ujian dan mengatur waktu dengan baik untuk menyelesaikan semua bagian ujian.</li>
                            <li>Bantuan dan Klarifikasi: Jika Anda memiliki pertanyaan atau membutuhkan klarifikasi mengenai instruksi ujian, jangan ragu untuk meminta bantuan dari pengawas ujian.</li>
                        </ul>
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
            </div>
        </div>
    </section>
    @endif
</div>
