@section('title', 'Login')

<div>
    <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <center>
                    <img src="{{ url('assets/images/yappenda.png') }}" width="100" alt="logo" class="auth-logo mb-3">
                </center>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="#" class="logo logo-admin">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">CBT Yappenda</h4>   
                                        <p class="text-muted  mb-0">Silahkan Login</p>  
                                    </div>
                                </div>
                                <div class="card-body pt-0">                                    
                                    <form class="my-4" wire:submit="login">            
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" wire:model.blur="email">
                                            @error('email')<p class="text-danger">{{ $message }}</p>@enderror                               
                                        </div> 
            
                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>                                            
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" wire:model.blur="password">    
                                            @error('password')<p class="text-danger">{{ $message }}</p>@enderror                           
                                        </div>
            
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6 text-end">
                                                <a href="#" class="text-muted font-13"><i class="dripicons-lock"></i> Lupa password?</a>                                    
                                            </div>
                                        </div>
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div>
                                        </div> 
                                    </form>
                                    <hr class="hr-dashed mt-4">
                                    <div class="text-center mt-n5">
                                        <h6 class="card-bg px-3 my-4 d-inline-block">Atau login dengan</h6>
                                    </div>
                                    <div class="d-flex justify-content-center mb-1">
                                        <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-danger rounded-circle">
                                            <i class="fab fa-google align-self-center"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><
                </div>
            </div>
        </div><
    </div>
</div>
