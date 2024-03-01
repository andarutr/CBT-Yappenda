<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Helpers\AuthHelper;
use Livewire\Attributes\Validate;

class Login extends Component
{
    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $password;
    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function login()
    {
        $this->validate();
        $login = AuthHelper::login($this->email, $this->password);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
