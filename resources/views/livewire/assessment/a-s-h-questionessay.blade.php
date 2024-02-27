@section('title','Input Soal Essay')

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
                                            <h5 class="met-user-name">{{ $exam->lesson->name }} ({{ $exam->grade.' '.$exam->major}})</h5>                                                        
                                            <p class="mb-0 met-user-name-post">{{ $exam->user->name }}</p>                                                        
                                        </div>
                                    </div>                                                
                                </div><!--end col-->
                                
                                <div class="col-lg-4 ms-auto align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class="mt-2"><i class="fas fa-clock text-secondary font-22 align-middle mr-2"></i> <b> Durasi </b> : {{ $exam->duration/60 }} menit</li>
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Mulai </b> : {{ \Carbon\Carbon::parse($exam->start_time)->format('d F Y, H:i') }}</li>
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Selesai </b> : {{ \Carbon\Carbon::parse($exam->end_time)->format('d F Y, H:i') }}</li>
                                    </ul>
                                   
                                </div>
                            </div><!--end row-->
                        </div><!--end f_profile-->                                                                                
                    </div><!--end card-body-->  
                    <div class="card-body p-0">    
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="{{ url('guru/assessment/ash/input-soal/pg/'.$uuid) }}" class="nav-link" wire:navigate>Soal PG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#SoalEssay" role="tab" aria-selected="false">Soal Essay</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('guru/assessment/ash/input-soal/preview/'.$uuid) }}" class="nav-link" wire:navigate>Preview</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane p-3 active" id="SoalEssay" role="tabpanel">
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
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal Essay</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="store_essay">
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <textarea class="form-control border border-3 rounded-3" type="text" wire:model="question" rows="5"></textarea>
                                                        @error('question')<p class="text-danger">{{ $message }}</p>@enderror
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
                        </div>        
                    </div> <!--end card-body-->                            
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
    <livewire:partials.footer />             
</div>