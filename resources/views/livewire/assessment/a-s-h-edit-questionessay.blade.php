@section('title', 'Edit Soal Essay')

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
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="card-text mt-2">
                        <form wire:submit="update_essay">
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto (opsional)</label>
                            <div class="col-lg-9 col-xl-8">
                                <input type="file" class="form-control" wire:model="picture" />
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                            <div class="col-lg-9 col-xl-8">
                                <textarea class="form-control" type="text" wire:model="question" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                <button type="submit" class="btn btn-success">Update</button>
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
