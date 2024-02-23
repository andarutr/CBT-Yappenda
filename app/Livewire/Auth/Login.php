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
            $this->reset();
            return session()->flash('failed','Email dan password salah!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
