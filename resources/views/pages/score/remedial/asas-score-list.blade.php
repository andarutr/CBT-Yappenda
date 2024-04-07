<?php

use App\Models\Remedial;
use App\Helpers\ScoreHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Input Nilai Remedial ASAS');

state(['search'])->url();
state([
    'paginate' => 8
]);

$exams = computed(function(){
    $exam = Remedial::whereHas('exam', function(Builder $query){
        $query->where(['exam_type' => 'ASAS', 'user_id' => Auth::user()->id]);
    })->orderBy('date_exam','desc')->paginate($this->paginate);
    
    $result = Remedial::whereHas('user', function(Builder $query){
        $query->where('name', 'like','%'.$this->search.'%');
    })->orderBy('date_exam','desc')->paginate($this->paginate);

    return $this->search ? $result : $exam;
});

$toPgResult = function($user_id, $uuid){
    return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/remedial/asas/pg/'.$user_id.'/'.$uuid);
};

$toEssayResult = function($user_id, $uuid){
    return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/remedial/asas/essay/'.$user_id.'/'.$uuid);
};

$generateScoreRemedial = function($user_id, $exam_id){
    ScoreHelper::generateScoreRemedial($user_id, $exam_id);
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
                    @include('components.tables.asas-remedial-list')
                </div>
            </div>
        </div>
    </div>
    @include('components.buttons.btn-paginate')
</div>
