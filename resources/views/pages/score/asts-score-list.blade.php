<?php

use App\Models\ExamResult;
use App\Helpers\ScoreHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Nilai Assessment Sumatif Tengah Semester');

state(['search'])->url();
state([
    'paginate' => 8,
]);

$exams = computed(function(){
    $exam = ExamResult::whereHas('exam', function(Builder $query){
        $query->where(['exam_type' => 'ASTS', 'user_id' => Auth::user()->id]);
    })->orderBy('date_exam','desc')->paginate($this->paginate);
    
    $result = ExamResult::whereHas('user', function(Builder $query){
        $query->where('name', 'like','%'.$this->search.'%');
    })->orderBy('date_exam','desc')->paginate($this->paginate);

    return $this->search ? $result : $exam;
});

$toPgResult = function($user_id, $uuid){
    return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/asts/pg/'.$user_id.'/'.$uuid);
};

$toEssayResult = function($user_id, $uuid){
    return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/asts/essay/'.$user_id.'/'.$uuid);
};

$generateScore = function($user_id, $exam_id){
    ScoreHelper::generateScore($user_id, $exam_id);
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    @include('components.tables.asts-score-list')
                </div>
            </div>
        </div>
    </div>
    @include('components.buttons.btn-paginate')
</div>