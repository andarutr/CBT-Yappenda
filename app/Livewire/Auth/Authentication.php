<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Helpers\AuthHelper;
use App\Mail\ResetPasswordMail;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;

class Authentication extends Component
{
    // Jangan dihapus!
    public $statusPage = 'login';

    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $password;
    public $users;

    public function login()
    {
        $this->validate();
        $login = AuthHelper::login($this->email, $this->password);
    }

    public function toPage($page)
    {
        $this->email = '';
        $this->password = '';
        $this->statusPage = $page;
    }

    public function forgotPassword()
    {
        $user = User::where('email', $this->email)->first();

        if($user)
        {
            $uuid = Uuid::uuid4()->toString();

            $data = [
                'name' => $user->name,
                'tokens' => $uuid
            ];
            
            \DB::table('reset_password')->insert([
                'email' => $user->email,
                'tokens' => $uuid
            ]);
            
            Mail::to($this->email)->send(new ResetPasswordMail($data));
            toastr()->success('Silahkan periksa email kamu ya!');
        }else{
            toastr()->warning('Email kamu tidak terdaftar!');
        }
    }

    public function render()
    {
        return view('livewire.auth.authentication')
                ->layout('components.layouts.auth');
    }
}
