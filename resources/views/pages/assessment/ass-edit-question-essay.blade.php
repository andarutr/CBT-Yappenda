<?php

use Carbon\Carbon;
use App\Helpers\AssessmentHelper;
use App\Models\{Exam, EssayQuestion};
use function Livewire\Volt\{layout, title, usesFileUploads, state, mount};

layout('components.layouts.dashboard');
title('Edit Soal Essay');

usesFileUploads();

state([
    'uuid',
    'picture',
    'question',
    'question_img',
    'redirect_url',
]);

mount(function(){
    $this->uuid = Request::segment(6);
    $essay = EssayQuestion::where('uuid', $this->uuid)->first();

    $this->question = $essay->question;
    $this->question_img = $essay->picture;
    $redirect = Exam::where('id', $essay->exam_id)->first();
    $this->redirect_url = '/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($redirect->exam_type).'/input-soal/preview/'.$redirect->uuid;
});

$update_essay = function(){
    if($this->picture){
        $imageName = Carbon::parse(now())->format('dmYHis').$this->picture->getClientOriginalExtension();
        
        $data = [
            'uuid' => $this->uuid,
            'question' => $this->question,
            'picture' => $imageName
        ];

        $this->picture->storeAs('assets/images/exam', $imageName);
        AssessmentHelper::updateEsQuestion($data);
    }else{
        $data = [
            'uuid' => $this->uuid,
            'question' => $this->question,
            'picture' => NULL
        ];

        AssessmentHelper::updateEsQuestion($data);
    }

    toastr()->success('Berhasil memperbarui soal essay!');
};

?>

<div class="content-body">
    <section class="app-ecommerce-details">
        
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
                            @if(!$picture)
                            <img src="{{ asset('/assets/images/exam/'.$question_img) }}" class="img-fluid product-img" width="250">
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="card-text mt-2">
                        @include('components.forms.edit-ash-question-essay')  
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
