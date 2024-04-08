<?php

use Ramsey\Uuid\Uuid;
use App\Models\{User, Rapor};
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\{layout, title, state, rules, mount};

layout('components.layouts.dashboard');
title('Buat rapor');

state([
    'users',
    'kelas_id',
    'user_id',
    'exam_type',
    'semester',
    'th_ajaran',
]);

rules([
    'kelas_id' => 'required',
    'user_id' => 'required',
    'exam_type' => 'required',
    'semester' => 'required',
    'th_ajaran' => 'required',
]);

mount(function(){
    $this->kelas_id = Request::segment(4);
    $this->users = User::where('role_id', 3)->get();
});

$store = function(){
    $this->validate();
    
    Rapor::create([
        'uuid' => Uuid::uuid4()->toString(),
        'user_id' => $this->user_id,
        'exam_type' => $this->exam_type,
        'semester' => $this->semester,
        'th_ajaran' => $this->th_ajaran,
        'wali_kelas' => Auth::user()->name
    ]);

    return redirect('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.$this->kelas_id)->with('success', 'Berhasil menambah rapor!');
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">@yield('title')</div>
                <div class="card-body">
                    <form wire:submit="store">
                        <div class="">
                            <label>Siswa</label>
                            <select class="form-select" wire:model.live="user_id">
                                <option value="">Pilih</option> 
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option> 
                                @endforeach               
                            </select>
                            @error('user_id')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Jenis Ujian</label>
                            <select class="form-select" wire:model.live="exam_type">
                                <option value="">Pilih</option> 
                                <option value="ASH">ASH</option> 
                                <option value="ASTS">ASTS</option> 
                                <option value="ASAS">ASAS</option> 
                            </select>
                            @error('exam_type')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Semester</label>
                            <select class="form-select" wire:model.live="semester">
                                <option value="">Pilih</option> 
                                <option value="1 (Ganjil)">1 (Ganjil)</option> 
                                <option value="2 (Genap)">2 (Genap)</option> 
                            </select>
                            @error('semester')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Tahun Ajaran</label>
                            <select class="form-select" wire:model.live="th_ajaran">
                                <option value="">Pilih</option> 
                                <option value="2024/2025">2024/2025</option> 
                                <option value="2025/2026">2025/2026</option> 
                                <option value="2026/2027">2026/2027</option> 
                            </select>
                            @error('th_ajaran')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
