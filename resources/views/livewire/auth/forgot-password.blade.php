@section('title', 'Lupa Password')

<div>
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <center>
                    <img src="{{ url('assets/images/yappenda.png') }}" width="100" alt="logo" class="auth-logo mb-3">
                    <h3>Reset Password</h3>
                </center>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body pt-0">                                    
                                    <form class="my-4" wire:submit="forgotPassword">            
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" wire:model.blur="email" autocomplete="off">
                                            @error('email')<p class="text-danger">{{ $message }}</p>@enderror                               
                                        </div> 
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-success" type="submit">Reset Password <i class="fas fa-lock ms-1"></i></button>
                                                </div>
                                            </div>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><
                </div>
            </div>
        </div><
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