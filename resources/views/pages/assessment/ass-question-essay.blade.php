<?php

use Carbon\Carbon;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use App\Models\EssayQuestion;
use App\Helpers\AssessmentHelper;
use function Livewire\Volt\{layout, title, usesFileUploads, state, rules, mount};

layout('components.layouts.dashboard');
title('Input Soal Essay');

usesFileUploads();

state([
    'uuid',
    'exam',
    'picture',
    'question',
]);

rules([
    'question' => 'required'
]);

mount(function(){
    $this->uuid = \Request::segment(6);
    $this->exam = Exam::where('uuid', $this->uuid)->first();
});

$store_essay = function(){
    $this->validate();

    if($this->picture){
        $imageName = Carbon::parse(now())->format('dmYHis').$this->picture->getClientOriginalExtension();
        
        $data = [
            'exam_id' => $this->exam->id,
            'question' => $this->question,
            'picture' => $imageName
        ];

        $this->picture->storeAs('assets/images/exam', $imageName);
        $store = AssessmentHelper::storeEsQuestion($data);
    }else{
        $data = [
            'exam_id' => $this->exam->id,
            'question' => $this->question,
            'picture' => NULL
        ];

        $store = AssessmentHelper::storeEsQuestion($data);
    }
    
    $this->reset(['question','picture']);
    toastr()->success('Berhasil menambahkan soal essay!');
};

?>

<div class="content-body">
    <section class="app-ecommerce-details">
        <div class="item-features mb-5">
            <div class="row text-center">
                <div class="col-12 col-md-4">
                    <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($exam->exam_type).'/input-soal/pg/'.$uuid) }}" class="btn btn-primary form-control">Soal PG</a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="#" class="btn btn-success form-control">Essay</a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($exam->exam_type).'/input-soal/preview/'.$uuid) }}" class="btn btn-info form-control">Preview</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body mb-3">
                <div class="row my-2">
                    <div class="col-12 col-md-3">
                        <p>Preview Image</p>
                        <div class="d-flex align-items-center justify-content-center">
                            @if($picture)
                            <a href="{{ $picture->temporaryUrl() }}" data-lightbox="image-1">
                                <img src="{{ $picture->temporaryUrl() }}" class="img-fluid product-img" width="250">
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <h4>{{ $exam->lesson->name }} ({{ $exam->grade.' '.$exam->major}}) Semester {{ $exam->semester }} - {{ $exam->th_ajaran }}</h4>
                        <span class="card-text item-company">By <a href="#" class="company-name">{{ $exam->user->name }}</a></span>
                        <p class="card-text mt-2">
                        @include('components.forms.post-ash-question-essay')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
</div>

@assets
<link href="{{ url('assets/css/lightbox.css') }}" rel="stylesheet" />
<script src="{{ url('assets/js/lightbox-plus-jquery.min.js') }}"></script>
@endassets
