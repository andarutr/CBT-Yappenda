<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $password;

    public function login()
    {
        $this->validate();

        if(auth()->attempt(['email' => $this->email, 'password' => $this->password])){
            return redirect()->to('/admin/dashboard');
        }else{
            return redirect()->to('/login');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
