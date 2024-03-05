@section('title', 'Login')

<div>   
    <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-cover">
            <div class="auth-inner row m-0">
              <!-- Brand logo--><a class="brand-logo" href="index.html">
                
                <h2 class="brand-text text-primary ms-1">SMAS Yappenda</h2></a>
              <!-- /Brand logo-->
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ url('assets/images/pages/login-v2.svg') }}" alt="Login V2"/></div>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                  <h2 class="card-title fw-bold mb-1">Selamat Datang di <br>CBT SMAS Yappenda!</h2>
                  <p class="card-text mb-2">CBT for All Students</p>
                  <form class="auth-login-form mt-2" wire:submit="login">
                    <div class="mb-1">
                      <label class="form-label" for="login-email">Email</label>
                      <input class="form-control" id="login-email" type="text" wire:model.live="email" />
                       @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-1">
                      <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password">Password</label>
                        <a href="{{ url('/lupa-password') }}" wire:navigate><small>Lupa Password?</small></a>
                      </div>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="login-password" type="password" wire:model="password" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                      </div>
                        @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                  </form>
                </div>
              </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
      </div>
</div>

@assets
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
" rel="stylesheet">
@endassets

@if(session('failed'))
    @script
        <script>
            Swal.fire({
              title: "Login Gagal",
              text: "{{ session('failed') }}",
              icon: "error"
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.reload();
                }
            });
        </script>
    @endscript
@elseif(session('success'))
    @script
        <script>
            Swal.fire({
              title: "Logout Berhasil",
              text: "{{ session('success') }}",
              icon: "success"
            });
        </script>
    @endscript
@endif