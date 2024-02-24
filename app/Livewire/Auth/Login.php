<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
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

        if(auth()->attempt(['email' => $this->email, 'password' => $this->password])){
            if(auth()->user()->role->role === 'Admin'){
                return redirect()->to('/admin/dashboard');
            }elseif(auth()->user()->role->role === 'Guru'){
                return redirect()->to('/guru/dashboard');
            }elseif(auth()->user()->role->role === 'User'){
                return redirect()->to('/user/dashboard');
            }else{
                abort(403);
            }
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
