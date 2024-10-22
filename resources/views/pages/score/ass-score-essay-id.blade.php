<?php

use Illuminate\Support\Facades\Auth;
use App\Models\{Exam, EssayAnswer, EssayQuestion};
use function Livewire\Volt\{layout, title, state, mount};

layout('components.layouts.dashboard');
title('Nilai Essay');

state([
    'uuid',
    'score',
    'backToUrl',
    'essay_answer',
]);

mount(function(){
    $this->uuid = Request::segment(5);
    $this->essay_answer = EssayAnswer::where('uuid', $this->uuid)->first();
    $essay_question = EssayQuestion::where('id', $this->essay_answer->essay_question_id)->first();
    $exam = Exam::where('id', $essay_question->exam_id)->first();
    $this->backToUrl = $exam->uuid;
    $this->score = $this->essay_answer->score;
});

$update = function(){
    EssayAnswer::where('uuid', $this->uuid)
        ->update([
            'score' => $this->score
        ]);

    $essay_question = EssayQuestion::where('id', $this->essay_answer->essay_question_id)->first();
    $exam = Exam::where('id', $essay_question->exam_id)->first();

    toastr()->success('Berhasil menilai essay!');
    return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/'.strtolower($exam->exam_type).'/essay/'.$this->essay_answer->user_id.'/'.$this->backToUrl);
}

?>

<div class="content-body">
    <section class="app-user-view-account">
        <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/input-nilai/'.Request::segment(3)) }}" class="btn btn-sm btn-success mb-1">Kembali</a>
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card">
                    <h4 class="card-header">Koreksi Essay</h4>
                    <div class="card-body pt-1">
                    <form wire:submit="update">
                        <input type="number" class="form-control" wire:model="score" required>
                        <button class="btn btn-success mt-1">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
