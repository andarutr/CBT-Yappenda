<?php

use Ramsey\Uuid\Uuid;
use App\Models\{Exam, Remedial};
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Remedial '.strtoupper(Request::segment(3)));

$remedials = computed(function(){
    return Remedial::where('user_id', Auth::user()->id)->get();
});

$toRemedial = function($uuid){
    $exam_id = Exam::where('uuid', $uuid)->first();
    
    Remedial::updateOrCreate([
        'user_id' => Auth::user()->id,
        'exam_id' => $exam_id->id
    ],[
        'uuid' => Uuid::uuid4()->toString(),
        'user_id' => Auth::user()->id,
        'exam_id' => $exam_id->id,
        'date_exam' => now(),
        'status' => 'Belum dinilai'
    ]);

    $results_id = Remedial::where(['user_id' => Auth::user()->id, 'exam_id' => $exam_id->id])->first();

    if($results_id->is_end == true)
    {
        toastr()->success('Anda sudah menyelesaikan ujian ini!');
        return redirect('/user/remedial/'.strtolower($exam_id->exam_type));
    }else{
        return redirect('/user/remedial/pg/'.$uuid);
    }
};

?>

<div class="content-body">
    <h1><u>Remedial {{ strtoupper(Request::segment(3)) }}</u></h1>
    <div class="row mt-1">
        @foreach($this->remedials as $remedial)
        @if($remedial->exam->exam_type == strtoupper(Request::segment(3)))
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>{{ \Carbon\Carbon::parse($remedial->exam->start_time)->format('d F Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                        @php 
                        $now = \Carbon\Carbon::now();
                        @endphp
                        <div class="role-heading">
                            <h4 class="fw-bolder">{{ $remedial->exam->lesson->name }}</h4>
                            <p>{{ $remedial->exam->grade.' '.$remedial->exam->major }}</p>
                            <p>Waktu Mulai : {{ \Carbon\Carbon::parse($remedial->exam->start_time)->format('H:i') }}</p>
                            <p>Waktu Selesai : {{ \Carbon\Carbon::parse($remedial->exam->end_time)->format('H:i') }}</p>
                            <p>Durasi : {{ $remedial->exam->duration }} Menit</p>
                            <p>Guru : {{ $remedial->exam->user->name }}</p>
                            @if($remedial->is_end)
                            <button class="btn btn-sm btn-danger">Sudah Dikerjakan</button>
                            @else
                                @if($now < $remedial->exam->start_time)
                                <button class="btn btn-sm btn-secondary">Belum Mulai</button>
                                @elseif($now >= $remedial->exam->start_time && $now <= $remedial->exam->end_time)
                                <button class="btn btn-sm btn-sm btn-primary" wire:click="toRemedial('{{ $remedial->exam->uuid }}')" wire:confirm="Yakin ingin memulai remedial?">Mulai Ujian</button>
                                @else
                                <button class="btn btn-sm btn-danger">Telah Berakhir</button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
