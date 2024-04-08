<?php

use App\Models\ExamResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use function Livewire\Volt\{layout, title, state, mount, computed};

layout('components.layouts.dashboard');
title('Hasil Ujian '.strtoupper(Request::segment(3)));

state([
    'exam_type',
    'paginate' => 8
]);

$exam_results = computed(function(){
    $exam_results = ExamResult::where('user_id', Auth::user()->id)
                                            ->whereHas('exam', function(Builder $query){
                                                $query->where('exam_type', $this->exam_type);
                                            })->paginate($this->paginate);
    
    return $exam_results;
});

mount(function(){
    $this->exam_type = Request::segment(3);
})

?>

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    @include('components.tables.exam-results-show')
                </div>
            </div>
        </div>
    </div>
    @include('components.buttons.btn-paginate')
</div>