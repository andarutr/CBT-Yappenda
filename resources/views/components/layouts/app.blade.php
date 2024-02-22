<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') | CBT Yappenda</title>
    <link rel="shortcut icon" href="{{ url('assets/images/yappenda.png') }}">

    <!-- App css -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="body" @guest class="auth-page" style="background-image: url('/assets/images/p-1.png'); background-size: cover; background-position: center center;" @endguest>
    <!-- Start Content -->
    {{ $slot }}
    <!-- End Content -->
    
    <!-- Javascript -->
    <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ url('assets/js/app.js') }}"></script>
</body>
</html>
