<!-- leftbar-tab-menu -->
<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a href="index.html" class="logo logo-metrica d-block text-center">
            <span>
                <img src="/assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <div class="main-icon-menu-body">
            <div class="position-reletive h-100" data-simplebar style="overflow-x: hidden;">
                <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard" data-bs-trigger="hover">
                        <a href="#CBTDashboard" id="dashboard-tab" class="nav-link active">
                            <i class="ti ti-smart-home menu-icon"></i>
                        </a><!--end nav-link-->
                    </li><!--end nav-item-->
                </ul><!--end nav-->
            </div><!--end /div-->
        </div><!--end main-icon-menu-body-->
    </div>
    <!--end main-icon-menu-->

    <div class="main-menu-inner">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="index.html" class="logo">
                <span>
                    <img src="/assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                    <img src="/assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                </span>
            </a><!--end logo-->
        </div><!--end topbar-left-->
        <!--end logo-->
        <div class="menu-body navbar-vertical tab-content" data-simplebar>
            <div id="CBTDashboard" class="main-icon-menu-pane tab-pane active" role="tabpanel"
                aria-labelledby="dasboard-tab">
                <div class="title-box">
                    <h6 class="menu-title">Main Menu</h6>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/{{ Request::segment(1) }}/dashboard" wire:navigate><i class="fas fa-rocket"></i>&nbsp;Dashboard</a>
                    </li>
                </ul><!--end nav-->
                @if(Auth::user()->role->role === 'Guru' | Auth::user()->role->role === 'Admin')
                <div class="title-box">
                    <h6 class="menu-title">Assets</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/mata-pelajaran') }}" wire:navigate><i class="fas fa-shapes"></i>&nbsp;Mata Pelajaran</a>
                        </li>
                    </ul>
                    <h6 class="menu-title">Assessment</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/assessment/ash') }}" wire:navigate><i class="fas fa-book-open"></i>&nbsp;Asessment ASH</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/assessment/asts') }}" wire:navigate><i class="fas fa-book-open"></i>&nbsp;Asessment ASTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/assessment/asas') }}" wire:navigate><i class="fas fa-book-open"></i>&nbsp;Asessment ASAS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/assessment/pas') }}" wire:navigate><i class="fas fa-book-open"></i>&nbsp;Asessment PAS</a>
                        </li>
                    </ul>
                    <h6 class="menu-title">Input Nilai</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/input-nilai/ash') }}" wire:navigate><i class="fas fa-star"></i>&nbsp; Nilai ASH</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/input-nilai/asts') }}" wire:navigate><i class="fas fa-star"></i>&nbsp; Nilai ASTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/input-nilai/asas') }}" wire:navigate><i class="fas fa-star"></i>&nbsp; Nilai ASAS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/input-nilai/pas') }}" wire:navigate><i class="fas fa-star"></i>&nbsp;Nilai PAS</a>
                        </li>
                    </ul>
                    <h6 class="menu-title">Rapor</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/rapor/kelas/X') }}" wire:navigate><i class="fas fa-book"></i>&nbsp; Kelas X</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/rapor/kelas/XI') }}" wire:navigate><i class="fas fa-book"></i>&nbsp; Kelas XI</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/'.Request::segment(1).'/rapor/kelas/XII') }}" wire:navigate><i class="fas fa-book"></i>&nbsp; Kelas XII</a>
                        </li>
                    </ul>
                </div>
                @else
                <h6 class="menu-title">Ujian</h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/ujian/ash') }}" wire:navigate><i class="fas fa-user-graduate"></i>&nbsp; Assessment ASH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/ujian/asts') }}" wire:navigate><i class="fas fa-user-graduate"></i>&nbsp; Assessment ASTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/ujian/asas') }}" wire:navigate><i class="fas fa-user-graduate"></i>&nbsp; Assessment ASAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/ujian/pas') }}" wire:navigate><i class="fas fa-user-graduate"></i>&nbsp; Assessment PAS</a>
                    </li>
                </ul>
                <h6 class="menu-title">Hasil Ujian</h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/hasil-ujian/ash') }}" wire:navigate><i class="fas fa-award"></i>&nbsp; Nilai ASH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/hasil-ujian/asts') }}" wire:navigate><i class="fas fa-award"></i>&nbsp; Nilai ASTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/hasil-ujian/asas') }}" wire:navigate><i class="fas fa-award"></i>&nbsp; Nilai ASAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/hasil-ujian/pas') }}" wire:navigate><i class="fas fa-award"></i>&nbsp; Nilai PAS</a>
                    </li>
                </ul>
                @endif
                @if(Auth::user()->role->role === 'Admin')
                <div class="title-box">
                    <h6 class="menu-title">Account Management</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/account') }}" wire:navigate><i class="fas fa-users"></i>&nbsp;Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/account/reset-password') }}" wire:navigate><i class="fas fa-lock"></i>&nbsp;Reset Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/account/role') }}" wire:navigate><i class="fas fa-user"></i>&nbsp;Ganti Role</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/account/suspend') }}" wire:navigate><i class="fas fa-times"></i>&nbsp;Suspend</a>
                    </li>
                </ul><!--end nav-->
                @endif
            </div>
        </div>
        <!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>
<!-- end leftbar-tab-menu-->
