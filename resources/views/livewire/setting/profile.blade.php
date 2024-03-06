@section('title','Profile')
<div class="content-body">
    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mt-3 mb-2"
                                    src="{{ asset('storage/assets/images/users/'.Auth::user()->picture) }}"
                                    height="110" width="110" alt="User avatar" />
                                <div class="user-info text-center">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <span class="badge bg-light-secondary">{{ Auth::user()->role->role }}</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">Bio</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                @if(Auth::user()->role->role === 'User')
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">NIS:</span>
                                        <span>{{ Auth::user()->nis }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">NISN:</span>
                                        <span>{{ Auth::user()->nisn }}</span>
                                    </li>
                                @endif
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Nama:</span>
                                    <span>{{ Auth::user()->name }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Email:</span>
                                    <span>{{ Auth::user()->email }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Status:</span>
                                    <span class="badge bg-light-success">Active</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Role:</span>
                                    <span>{{ Auth::user()->role->role }}</span>
                                </li>
                                @if(Auth::user()->role->role === 'User')
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Kelas:</span>
                                        <span>{{ Auth::user()->kelas }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Fase:</span>
                                        <span>{{ Auth::user()->fase }}</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- User Pills -->
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                        <a class="nav-link @if($statusPage == 'editProfile') active @endif" wire:click="toPage('editProfile')">
                            <i class="bi-people" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Account</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($statusPage == 'editPassword') active @endif" wire:click="toPage('editPassword')">
                            <i class="bi-key" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Ganti Password</span>
                        </a>
                    </li>
                </ul>

                <div class="card">
                    <h4 class="card-header">Edit Profile</h4>
                    <div class="card-body pt-1">
                        @if($picture)
                            <center>
                                <img src="{{ $picture->temporaryUrl() }}" class="img-fluid rounded mb-3" width="100">
                            </center>
                        @endif

                        @if($statusPage == 'editProfile')
                        <form wire:submit="updateProfile">
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="file" class="form-control border border-3 rounded-3"
                                        wire:model="picture" id="updPicture">
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nama</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="text" class="form-control border border-3 rounded-3" wire:model.live="name">
                                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="text" class="form-control border border-3 rounded-3" wire:model.live="email">
                                    @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            @if(Auth::user()->role->role === 'User')
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NIS</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="number" class="form-control border border-3 rounded-3" wire:model="nis">
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NISN</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="number" class="form-control border border-3 rounded-3" wire:model="nisn">
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Kelas</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select wire:model="kelas">
                                        <option value="{{ $kelas }}">{{ $kelas }}</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Fase</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select wire:model="fase">
                                        <option value="{{ $fase }}">{{ $fase }}</option>
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
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                        @endif

                        @if($statusPage == 'editPassword')
                        <form wire:submit="updatePassword">
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Password Lama</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control border border-3 rounded-3" type="password" wire:model.live="old_password">
                                    @error('old_password')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Password Baru</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control border border-3 rounded-3" type="password" wire:model.live="new_password">
                                    @error('new_password')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                                </div>
                            </div> 
                        </form>  
                        @endif
                    </div>
                </div>
            </div>
            <!--/ User Content -->
        </div>
    </section>
</div>