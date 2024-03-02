@section('title','Profile')

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
                                        <div class="met-profile-main-pic">
                                            <img src="{{ asset('storage/assets/images/users/'.Auth::user()->picture) }}" alt="" width="120" height="120" class="rounded-circle">
                                            <span class="met-profile_main-pic-change">
                                                <a href="#updPicture">
                                                    <i class="fas fa-camera"></i>
                                                </a>
                                            </span>
                                        </div>
                                        <div class="met-profile_user-detail">
                                            <h5 class="met-user-name">{{ Auth::user()->name }}</h5>                                                        
                                            <p class="mb-0 met-user-name-post">{{ Auth::user()->role->role }}</p>                                                        
                                        </div>
                                    </div>                                                
                                </div><!--end col-->
                                
                                <div class="col-lg-4 ms-auto align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class="mt-2"><i class="fas fa-envelope text-secondary font-22 align-middle mr-2"></i> <b> Email </b> : {{ Auth::user()->email }}</li>
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Bergabung </b> : {{ Auth::user()->created_at }}</li>
                                    </ul>
                                   
                                </div>
                            </div><!--end row-->
                        </div><!--end f_profile-->                                                                                
                    </div><!--end card-body-->  
                    <div class="card-body p-0">    
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#Profiles" role="tab" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/'.Request::segment(1).'/ganti-password') }}" wire:navigate>Ganti Password</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane p-3 active" id="Profiles" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">                      
                                                        <h4 class="card-title">Edit Profile</h4>
                                                    </div>                        
                                                </div>                           
                                            </div>
                                            <div class="card-body">   
                                                <form wire:submit="update_profile">                    
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nama</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text" wire:model.live="name">
                                                        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                                    </div>
                                                </div>
                                                @if(Auth::user()->role->role == 'User')
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NIS</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text" wire:model="nis" placeholder="Opsional">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NISN</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text" wire:model="nisn" placeholder="Opsional">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Kelas</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <select class="form-control" wire:model="kelas">
                                                            <option value="">Pilih</option>
                                                            <option value="X">X</option>
                                                            <option value="XI">XI</option>
                                                            <option value="XII">XII</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Fase</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <select class="form-control" wire:model="fase">
                                                            <option value="">Pilih</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                            <option value="D">D</option>
                                                            <option value="E">E</option>
                                                            <option value="F">F</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control border border-3 rounded-3" type="text" wire:model.live="email">
                                                        @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </div>        
                                                </form>                                            
                                            </div>                                            
                                        </div>
                                    </div> <!--end col--> 
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Upload Foto</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                @if ($picture) 
                                                <center>
                                                    <img src="{{ $picture->temporaryUrl() }}" class="img-fluid rounded mb-3" width="150">
                                                </center>
                                                @endif
                                                <form wire:submit="upload_picture">
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input type="file" class="form-control border border-3 rounded-3" wire:model="picture" id="updPicture">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                        <button type="submit" class="btn btn-primary">Update</button>
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

@if(session('failed'))
    @script
        <script>
            Swal.fire({
              title: "{{ session('failed') }}",
              icon: "error"
            });
        </script>
    @endscript
@elseif(session('success'))
    @script
        <script>
            Swal.fire({
              title: "{{ session('success') }}",
              icon: "success"
            })
            .then((result) => {
              location.reload();
            });
        </script>
    @endscript
@endif