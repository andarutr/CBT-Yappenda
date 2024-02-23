<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Reset Password | CBT Yappenda</title>
    <link rel="shortcut icon" href="{{ url('assets/images/yappenda.png') }}">

    <!-- App css -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="body" class="auth-page" style="background-image: url('/assets/images/p-1.png'); background-size: cover; background-position: center center;">
    
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
                                    <form class="my-4" action="{{ url('/reset-password/'.$tokens) }}" method="POST">@csrf            
                                        <div class="form-group mb-2">
                                            <label class="form-label">Password Baru</label>
                                            <input type="password" class="form-control" name="new_password">
                                            @error('new_password')<p class="text-danger">{{ $message }}</p>@enderror
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

    <!-- Javascript -->
    <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ url('assets/js/app.js') }}"></script>
</body>
</html>
