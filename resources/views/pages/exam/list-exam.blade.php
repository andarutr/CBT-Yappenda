<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\{Exam, ExamResult};
use Illuminate\Support\Facades\{ Auth, Request };
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Ujian '.strtoupper(Request::segment(3)));

state(['search'])->url();

$exams = computed(function(){
    $exam = Exam::where('exam_type', Request::segment(3))->get();
    $result = Exam::where('exam_type', Request::segment(3))
                    ->orWhereHas('lesson', function($query){
                        $query->where('name','like','%'.$this->search.'%');
                    })
                    ->orWhereHas('user', function($query){
                        $query->where('name','like','%'.$this->search.'%');
                    })
                    ->get();
    
    return $this->search ? $result : $exam;
});

$toExam = function($uuid){
    $exam_id = Exam::where('uuid', $uuid)->first();
    
    ExamResult::updateOrCreate([
        'user_id' => Auth::user()->id,
        'exam_id' => $exam_id->id
    ],[
        'uuid' => Uuid::uuid4()->toString(),
        'user_id' => Auth::user()->id,
        'exam_id' => $exam_id->id,
        'date_exam' => now(),
        'status' => 'Belum dinilai'
    ]);

    $results_id = ExamResult::where(['user_id' => Auth::user()->id, 'exam_id' => $exam_id->id])->first();

    if($results_id->is_end == true)
    {
        toastr()->success('Anda sudah menyelesaikan ujian ini!');
        return redirect('/user/ujian/'.strtolower($exam_id->exam_type));
    }else{
        return redirect('/user/ujian/pg/'.$uuid);
    }
}

?>

<div class="content-body">
    <h1><u>Ujian</u></h1>
    <div class="row mt-1">
        @foreach($this->exams as $exam)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>{{ \Carbon\Carbon::parse($exam->start_time)->format('d F Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                        @php 
                        $now = \Carbon\Carbon::now();
                        @endphp
                        <div class="role-heading">
                            <h4 class="fw-bolder">{{ $exam->lesson->name }}</h4>
                            <p>{{ $exam->grade.' '.$exam->major }}</p>
                            <p>Waktu Mulai : {{ \Carbon\Carbon::parse($exam->start_time)->format('H:i') }}</p>
                            <p>Waktu Selesai : {{ \Carbon\Carbon::parse($exam->end_time)->format('H:i') }}</p>
                            <p>Durasi : {{ $exam->duration }} Menit</p>
                            <p>Guru : {{ $exam->user->name }}</p>
                            @if($now < $exam->start_time)
                            <button class="btn btn-sm btn-secondary">Belum Mulai</button>
                            @elseif($now >= $exam->start_time && $now <= $exam->end_time)
                            <button class="btn btn-sm btn-sm btn-primary" wire:click="toExam('{{ $exam->uuid }}')" wire:confirm="Yakin ingin memulai ujian?">Mulai Ujian</button>
                            @else
                            <button class="btn btn-sm btn-danger">Telah Berakhir</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
