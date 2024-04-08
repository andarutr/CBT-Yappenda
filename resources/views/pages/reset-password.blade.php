<?php

use App\Models\User;
use Illuminate\Support\Facades\{DB, Hash};
use function Livewire\Volt\{layout, title, state, rules};

layout('components.layouts.auth');
title('Reset Password');

state([
    'new_password'
]);

rules([
    'new_password' => 'required|min:8'
]);

$update = function($tokens){
    $this->validate()
    $reset = DB::table('reset_password')->where('tokens', $tokens)->first();

    User::where('email', $reset->email)->update([
        'password' => Hash::make($this->new_password)
    ]);

    $delete_tokens = DB::table('reset_password')->where('tokens', $reset->tokens)->delete();

    toastr()->success('Berhasil memperbarui password!');
    return redirect('/login');
};

?>

<div class="container-md">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <center>
                <img src="{{ url('assets/images/logo.webp') }}" width="100" alt="logo" class="auth-logo mb-3">
                <h3>Reset Password</h3>
            </center>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card shadow">
                            <div class="card-body pt-0">                                    
                                <form class="my-4" wire:submit="update('{{ Request::segment(2) }}')">            
                                    <div class="form-group">
                                        <label class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" wire:model="new_password">
                                        @error('new_password')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div> 
                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid mt-1">
                                                <button class="btn btn-success text-white" type="submit">Reset Password <i class="fas fa-lock ms-1"></i></button>
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div><
            </div>
        </div>
    </div><
</div>
