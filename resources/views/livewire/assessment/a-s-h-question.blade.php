@section('title','Question')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="met-profile">
                            <div class="row">
                                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                    <div class="met-profile-main">
                                        <div class="met-profile_user-detail">
                                            <h5 class="met-user-name">Bahasa Indonesia (X IPA)</h5>                                                        
                                            <p class="mb-0 met-user-name-post">Nama Guru</p>                                                        
                                        </div>
                                    </div>                                                
                                </div><!--end col-->
                                
                                <div class="col-lg-4 ms-auto align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Durasi </b> : 60 menit</li>
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Mulai </b> : 26 February 2024 08:00</li>
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Selesai </b> : 26 February 2024 09:00</li>
                                    </ul>
                                   
                                </div>
                            </div><!--end row-->
                        </div><!--end f_profile-->                                                                                
                    </div><!--end card-body-->  
                    <div class="card-body p-0">    
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#SoalPG" role="tab" aria-selected="false">Soal PG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#SoalEssay" role="tab" aria-selected="false">Soal Essay</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Preview" role="tab" aria-selected="false">Preview</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane p-3 active" id="SoalPG" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-8">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal PG</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="">
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <textarea class="form-control border border-3 rounded-3" type="text"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">A</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">B</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">C</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">D</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Jawaban Benar</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div> 
                                                </form>  
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div> <!-- end col -->                                          
                                </div><!--end row-->
                            </div>
                            <div class="tab-pane p-3" id="SoalEssay" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-8">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal Essay</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="">
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <textarea class="form-control border border-3 rounded-3" type="text"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Bobot</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div> 
                                                </form>  
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div> <!-- end col -->                                          
                                </div><!--end row-->
                            </div>
                            <div class="tab-pane p-3" id="Preview" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal PG</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="">
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <p>1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia at tempora accusantium consequatur sequi error nobis eaque enim molestias tempore est quaerat, voluptates rem. Dolor aut pariatur officia dicta repellat.</p>
                                                        <ul>
                                                            <li>A .......</li>
                                                            <li>B .......</li>
                                                            <li>C .......</li>
                                                            <li>D .......</li>
                                                        </ul>
                                                        <p>Jawaban Benar : A .....</p>
                                                    </div>
                                                </div>
                                                </form>  
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div> <!-- end col -->
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal Essay</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="">
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <p>1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia at tempora accusantium consequatur sequi error nobis eaque enim molestias tempore est quaerat, voluptates rem. Dolor aut pariatur officia dicta repellat.</p>
                                                        <p>Bobot : 10</p>
                                                    </div>
                                                </div>
                                                </form>  
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div> <!-- end col -->                                          
                                </div><!--end row-->
                            </div>
                        </div>        
                    </div> <!--end card-body-->                            
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
    <livewire:partials.footer />             
</div>

@assets
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
" rel="stylesheet">
@endassets
