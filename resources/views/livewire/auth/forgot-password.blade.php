@section('title', 'Lupa Password')

<div>
    <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
          <!-- Reset Password basic -->
          <div class="card mb-0">
            <div class="card-body">
              <a href="index.html" class="brand-logo">
                <img src="{{ url('assets/images/logo.png') }}" class="img-fluid" width="100">
              </a>

              <h4 class="card-title text-center mb-1">Lupa Password</h4>
              <p class="card-text mb-2">Masukkan email yg terdaftar di google. Jika tidak terdaftar, silahkan hubungi administrasi untuk di reset secara manual.</p>

              <form class="auth-reset-password-form mt-2" wire:submit="forgotPassword">
                <div class="mb-1">
                  <div class="d-flex justify-content-between">
                    <label class="form-label">Email</label>
                  </div>
                  <div class="input-group input-group-merge form-password-toggle">
                    <input type="text" class="form-control form-control-merge" wire:model="email" />
                    @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                  </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="3">Submit</button>
              </form>

              <p class="text-center mt-2">
                <a href="{{ url('/login') }}"> <i data-feather="chevron-left"></i> Kembali ke login </a>
              </p>
            </div>
          </div>
          <!-- /Reset Password basic -->
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
              title: "Reset Password Gagal",
              text: "{{ session('failed') }}",
              icon: "error"
            });
        </script>
    @endscript
@elseif(session('success'))
    @script
        <script>
            Swal.fire({
              title: "Reset Password Berhasil",
              text: "{{ session('success') }}",
              icon: "success"
            });
        </script>
    @endscript
@endif