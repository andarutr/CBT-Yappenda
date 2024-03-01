@section('title', 'Edit Soal Essay')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-8 col-xl-8">
                @if(session('success'))
                <div wire:transition>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                <a href="{{ url($redirect_url) }}" class="btn btn-success mb-3">Kembali</a>
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title">Soal Essay</h4>
                    </div><!--end card-header-->
                    <div class="card-body"> 
                        <form wire:submit="update_essay">
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto (opsional)</label>
                            <div class="col-lg-9 col-xl-8">
                                <input type="file" class="form-control border border-3 rounded-3" wire:model="picture" />
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                            <div class="col-lg-9 col-xl-8">
                                <textarea class="form-control border border-3 rounded-3" type="text" wire:model="question" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div> 
                        </form>  
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->  
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <p>Preview Foto</p>
                    </div>
                    <div class="card-body">
                        @if ($picture) 
                        <center>
                            <a href="{{ $picture->temporaryUrl() }}" data-lightbox="image-1">
                                <img src="{{ $picture->temporaryUrl() }}" class="img-fluid rounded mb-3" width="250">
                            </a>
                        </center>
                        @endif
                    </div>
                </div>
            </div>                                        
        </div>
    </div>
    <livewire:partials.footer />           
    <link href="{{ url('assets/css/lightbox.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/lightbox-plus-jquery.min.js') }}"></script>  
</div>
