<?php

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Helpers\AuthHelper;
use Livewire\Volt\Component;
use App\Mail\ResetPasswordMail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;

new
#[Layout('components.layouts.auth')]
class extends Component{
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
}

?>

<div>   
    <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-cover">
            <div class="auth-inner row m-0">
              <a class="brand-logo" href="{{ url('/login') }}">
                <h2 class="brand-text text-primary ms-1">SMAS Yappenda</h2>
              </a>
              <!-- /Brand logo-->
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <img class="img-fluid" src="{{ url('assets/images/login.png') }}" alt="Background Login"/>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                  <center>
                    <img src="{{ url('assets/images/logo.png') }}" class="img-fluid" width="100">
                    <h4 class="card-title fw-bold mb-1 mt-1">Selamat Datang di <br>CBT SMAS Yappenda!</h4>
                    <p class="card-text mb-2">CBT for All Students</p>
                  </center>
                  @if($statusPage == 'login')
                  <h5 class="card-text mb-2">Login</h5>
                  <form class="auth-login-form mt-2" wire:submit="login">
                    <div class="mb-1">
                      <label class="form-label" for="login-email">Email</label>
                      <input class="form-control" id="login-email" type="text" wire:model.live="email" autocomplete="off" />
                       @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-1">
                      <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password">Password</label>
                        <a wire:click="toPage('forgotPassword')"><small>Lupa Password?</small></a>
                      </div>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="login-password" type="password" wire:model="password" /><span class="input-group-text cursor-pointer"><i class="bi-key"></i></span>
                      </div>
                        @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                  </form>
                  @endif

                  @if($statusPage == 'forgotPassword')
                  <h5 class="card-text mb-2">Lupa Password</h5>
                  <form class="auth-reset-password-form mt-2" wire:submit="forgotPassword">
                    <div class="mb-1">
                      <div class="d-flex justify-content-between">
                        <label class="form-label">Email</label>
                      </div>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input type="text" class="form-control form-control-merge" wire:model="email" autocomplete="off" />
                      </div>
                      <div class="d-flex justify-content-between">
                        <a wire:click="toPage('login')"><small>Sudah ingat? kembali login</small></a>
                      </div>
                      @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    <button class="btn btn-primary w-100" tabindex="3">Submit</button>
                  </form>
                  @endif
                </div>
              </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
    </div>
</div>