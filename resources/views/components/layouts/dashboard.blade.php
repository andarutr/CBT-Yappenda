<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <link href="{{ url('dashboard/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | CBT SMAS Yappenda</title>
    <link rel="stylesheet" href="{{ url('dashboard/css/app.css') }}" />
</head>
@auth
<body class="py-5">
    <livewire:partials.sidebar-mobile-app />
    <div class="flex mt-[4.7rem] md:mt-0">
    <livewire:partials.sidebar-app />
        <!-- BEGIN: Content -->
        <div class="content">
            <livewire:partials.navbar-app />
            {{ $slot }}
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <div data-url="side-menu-dark-button.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border"></div>
    </div>
    <!-- END: Dark Mode Switcher-->
    
    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
    <script src="{{ url('dashboard/js/app.js') }}"></script>
    <!-- END: JS Assets-->
</body>
@endauth
@guest
<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ url('dashboard/images/yappenda.png') }}" style="width: 50px important!">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                       CBT SMAS Yappenda
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your exam accounts in one place</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            {{ $slot }}
            <!-- END: Login Form -->
        </div>
    </div>
    
    <!-- BEGIN: JS Assets-->
    <script src="{{ url('dashboard/js/app.js') }}"></script>
    <!-- END: JS Assets-->
</body>
@endguest
</html>