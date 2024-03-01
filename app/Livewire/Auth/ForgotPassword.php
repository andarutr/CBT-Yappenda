<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Helpers\AuthHelper;
use Livewire\Attributes\Validate;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;

    public function forgotPassword()
    {
        AuthHelper::forgotPassword($this->email);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
