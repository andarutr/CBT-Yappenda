<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Mail\ResetPasswordMail;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;

    public function forgotPassword()
    {
        $user = User::where('email', $this->email)->first();

        if($user)
        {
            Mail::to($this->email)->send(new ResetPasswordMail());
            session()->flash('success', 'Silahkan periksa email kamu ya!');
        }else{
            session()->flash('failed', 'Email kamu tidak terdaftar!');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
