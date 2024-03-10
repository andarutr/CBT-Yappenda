@section('title','Input Soal PG')

<div class="content-body">
    <section class="app-ecommerce-details">
        <div class="item-features mb-5">
            <div class="row text-center">
                <div class="col-12 col-md-4">
                    <a href="#" class="btn btn-primary form-control">Soal PG</a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="{{ url('guru/assessment/'.strtolower($exam->exam_type).'/input-soal/essay/'.$uuid) }}" class="btn btn-success form-control">Essay</a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="{{ url('guru/assessment/'.strtolower($exam->exam_type).'/input-soal/preview/'.$uuid) }}" class="btn btn-info form-control">Preview</a>
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
                        <form wire:submit="store_pg">
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto (opsional)</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="file" class="form-control" wire:model="picture" />
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                                <div class="col-lg-9 col-xl-8">
                                    <textarea class="form-control" type="text" wire:model="pgquestion"></textarea>
                                    @error('pgquestion')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">A</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" wire:model="option.A">
                                    @error('option.A')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">B</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" wire:model="option.B">
                                        @error('option.B')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">C</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" wire:model="option.C">
                                        @error('option.C')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">D</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" wire:model="option.D">
                                        @error('option.D')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">E</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" wire:model="option.E">
                                        @error('option.E')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Jawaban Benar</label>
                                <div class="col-lg-9 col-xl-8">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="radio" wire:model="correct" value="A"> A
                                                </th>
                                                <th>
                                                    <input type="radio" wire:model="correct" value="B"> B
                                                </th>
                                                <th>
                                                    <input type="radio" wire:model="correct" value="C"> C
                                                </th>
                                                <th>
                                                    <input type="radio" wire:model="correct" value="D"> D
                                                </th>
                                                <th>
                                                    <input type="radio" wire:model="correct" value="E"> E
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                        @error('correct')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div> 
                        </form> 
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
