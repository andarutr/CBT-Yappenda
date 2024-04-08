<?php

use Ramsey\Uuid\Uuid;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use function Livewire\Volt\{layout, title, state, mount, rules};
use App\Models\{User, Rapor, Exam, ExamResult, Remedial, AshResult, ContentRapor};

layout('components.layouts.dashboard');
title('Tambahkan nilai');

state([
    'uuid',
    'user_id',
    'rapor',
    'exams',
    'user',
    'kelas',
    'exam_id',
    'description',
]);

rules([
'exam_id' => 'required',
'description' => 'required',
]);

mount(function(){
    $this->kelas = Request::segment(4);
    $this->user_id = Request::segment(5);
    $this->uuid = Request::segment(6);
    $this->rapor = Rapor::where('uuid', $this->uuid)->first();
    $this->exams = Exam::all();
    $this->user = User::where('id', $this->rapor->user_id)->first();
});

$store = function(){
    $this->validate();
    $exam = Exam::where('id', $this->exam_id)->first();
    if($exam->exam_type == 'ASTS'){
        $asts = ExamResult::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
            ->whereHas('exam', function(Builder $query) use($exam){
                $query->where('exam_type', $exam->exam_type);
            })->sum('score');
        $asts_remedial = Remedial::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
            ->whereHas('exam', function(Builder $query) use($exam){
                $query->where('exam_type', $exam->exam_type);
            })->sum('score');
        // Nilai asli + remed :2
        $asts_ = ($asts + $asts_remedial)/2;

        $tp_count = AshResult::where(['user_id' => $this->user->id, 'lesson_id' => $exam->lesson_id])->count();  
        $tp = AshResult::where(['user_id' => $this->user->id, 'lesson_id' => $exam->lesson_id])->sum('total');
        $tp_ = $tp/$tp_count;

        $total = number_format(round(($tp_ + $asts_)/2),0,'.','');
    }

    if($exam->exam_type === 'ASAS'){
        $asts = ExamResult::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
            ->whereHas('exam', function(Builder $query) use($exam){
                $query->where('exam_type', 'ASTS');
            })->sum('score');
        $asts_remedial = Remedial::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
            ->whereHas('exam', function(Builder $query) use($exam){
                $query->where('exam_type', 'ASTS');
            })->sum('score');
        // Nilai asli + remed :2
        $asts_ = ($asts + $asts_remedial)/2;

        $asas = ExamResult::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
            ->whereHas('exam', function(Builder $query) use($exam){
                $query->where('exam_type', $exam->exam_type);
            })->sum('score');
        $asas_remedial = Remedial::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
            ->whereHas('exam', function(Builder $query) use($exam){
                $query->where('exam_type', $exam->exam_type);
            })->sum('score');
        // Nilai asli + remed :2
        $asas_ = ($asas + $asas_remedial)/2;

        $tp_count = AshResult::where(['user_id' => $this->user->id, 'lesson_id' => $exam->lesson_id])->count();  
        $tp = AshResult::where(['user_id' => $this->user->id, 'lesson_id' => $exam->lesson_id])->sum('total');
        $tp_ = $tp/$tp_count;

        $total = number_format(round(($tp_ + $asts_ + $asas_)/3),0,'.','');
    }

    ContentRapor::create([
        'uuid' => Uuid::uuid4()->toString(),
        'rapor_id' => $this->rapor->id,
        'exam_id' => $this->exam_id,
        'nilai' => $total,
        'description' => $this->description,
    ]);
    
    toastr()->success('Berhasil memperbarui nilai!');
    return redirect('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.$this->kelas.'/'.$this->uuid);
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form wire:submit="store">
                        <div class="mt-1">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="{{ $user->name }}" disabled>
                        </div>
                        <div class="mt-1">
                            <label>Mata Pelajaran</label>
                            <select class="form-control" wire:model.live="exam_id">
                                <option value="">Pilih</option> 
                                @foreach($exams as $exam)
                                <option value="{{ $exam->id }}">{{ $exam->lesson->name }} ({{ $exam->grade }})[{{ $exam->exam_type }}] {{ $exam->semester.' '.$exam->th_ajaran }}</option> 
                                @endforeach               
                            </select>
                            @error('exam_id')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Deskripsi</label>
                            <textarea class="form-control" wire:model.live="description" rows="8"></textarea> 
                            @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
