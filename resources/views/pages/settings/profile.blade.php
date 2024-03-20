<?php

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\SettingHelper;
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\{layout, title, usesFileUploads, state, rules, mount};

layout('components.layouts.dashboard');
title('Profile');

usesFileUploads();

state([
    'name', 
    'email', 
    'nis', 
    'nisn', 
    'kelas', 
    'fase', 
    'picture',
]);

rules([
    'name' => 'required',
    'email' => 'required',
]);

mount(function(){
    $this->name = Auth::user()->name;
    $this->email = Auth::user()->email;
    $this->nis = Auth::user()->nis;
    $this->nisn = Auth::user()->nisn;
    $this->kelas = Auth::user()->kelas;
    $this->fase = Auth::user()->fase;
});

$toPage = function($role){
    return redirect()->to('/'.strtolower($role).'/ganti-password');
};

$updateProfile = function(){
    $this->validate();
    
    if($this->picture){
        $imageName = Carbon::parse(now())->format('dmYHis').'.'.$this->picture->getClientOriginalExtension();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'nis' => $this->nis,
            'nisn' => $this->nisn,
            'kelas' => $this->kelas,
            'fase' => $this->fase,
            'picture' => $imageName
        ];

        $this->picture->storeAs('assets/images/users', $imageName);
        $update = SettingHelper::updateProfile($data);
    }else{
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'nis' => $this->nis,
            'nisn' => $this->nisn,
            'kelas' => $this->kelas,
            'fase' => $this->fase,
            'picture' => Auth::user()->picture
        ];

        $update = SettingHelper::updateProfile($data);
    }

    toastr()->success('Berhasil memperbarui profile!');

    return redirect('/'.strtolower(Auth::user()->role->role.'/profile'));
}

?>

<div class="content-body">
    <section class="app-user-view-account">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mt-3 mb-2"
                                    src="{{ asset('assets/images/users/'.Auth::user()->picture) }}"
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

            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- User Pills -->
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="bi-people" class="font-medium-3 me-50"></i>
                            <span class="fw-bold">Account</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" wire:click="toPage('{{ Auth::user()->role->role }}')">
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

                        <form wire:submit="updateProfile">
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="file" class="form-control" wire:model="picture" id="updPicture">
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nama</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="text" class="form-control" wire:model.live="name">
                                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="text" class="form-control" wire:model.live="email">
                                    @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            @if(Auth::user()->role->role === 'User')
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NIS</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="number" class="form-control" wire:model="nis">
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">NISN</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="number" class="form-control" wire:model="nisn">
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Kelas</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select wire:model="kelas" class="select2 form-select">
                                        <optgroup label="Kelas X">
                                            <option value="X-1">X-1</option>
                                            <option value="X-2">X-2</option>
                                            <option value="X-3">X-3</option>
                                            <option value="X-4">X-4</option>
                                            <option value="X-5">X-5</option>
                                            <option value="X-6">X-6</option>
                                            <option value="X-7">X-7</option>
                                            <option value="X-8">X-8</option>
                                        </optgroup>
                                        <optgroup label="Kelas XI">
                                            <option value="XI-1">XI-1</option>
                                            <option value="XI-2">XI-2</option>
                                            <option value="XI-3">XI-3</option>
                                            <option value="XI-4">XI-4</option>
                                            <option value="XI-5">XI-5</option>
                                            <option value="XI-6">XI-6</option>
                                            <option value="XI-7">XI-7</option>
                                            <option value="XI-8">XI-8</option>
                                        </optgroup>
                                        <optgroup label="Kelas XII">
                                            <option value="XII-1">XII-1</option>
                                            <option value="XII-2">XII-2</option>
                                            <option value="XII-3">XII-3</option>
                                            <option value="XII-4">XII-4</option>
                                            <option value="XII-5">XII-5</option>
                                            <option value="XII-6">XII-6</option>
                                            <option value="XII-7">XII-7</option>
                                            <option value="XII-8">XII-8</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-1 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Kelas</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select wire:model="fase" class="select2 form-select">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
