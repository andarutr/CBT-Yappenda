<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
        <li class="nav-item me-auto"><a class="navbar-brand" href="{{ url('/'.strtolower(Auth::user()->role->role)) }}">
            <span class="brand-logo">
                <img src="{{ url('assets/images/logo.png') }}" alt="">
            </span>
            <h2 class="brand-text">My CBT</h2></a></li>
        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
    </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('/'.strtolower(Auth::user()->role->role)) }}/dashboard"><i class="bi-rocket-takeoff"></i><span class="menu-title text-truncate mt-1" data-i18n="Dashboard">Dashboard</span></a>
        </li>
        @if(Auth::user()->role->role === 'Admin')
        <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('/'.strtolower(Auth::user()->role->role).'/mata-pelajaran') }}"><i class="bi-book"></i><span class="menu-title text-truncate mt-1" data-i18n="Mata Pelajaran">Mata Pelajaran</span></a>
        </li>
        <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('/'.strtolower(Auth::user()->role->role).'/tujuan-pembelajaran') }}"><i class="bi-bar-chart-steps"></i><span class="menu-title text-truncate mt-1" data-i18n="Tujuan Pembelajaran">Tujuan Pembelajaran</span></a>
        </li>
        @endif
        @if(Auth::user()->role->role === 'Guru' | Auth::user()->role->role === 'Admin')
        <li class=" nav-item mt-1"><a class="d-flex align-items-center" href="#"><i class="bi-journal-text"></i><span class="menu-title text-truncate" data-i18n="Assessment">Assessment</span></a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/assessment/ash') }}"><span class="menu-item text-truncate" data-i18n="Asessment ASH">Asessment ASH</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/assessment/asts') }}"><span class="menu-item text-truncate" data-i18n="Asessment ASTS">Asessment ASTS</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/assessment/asas') }}"><span class="menu-item text-truncate" data-i18n="Asessment ASAS">Asessment ASAS</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Input Nilai -->
        <li class=" nav-item mt-1"><a class="d-flex align-items-center" href="#"><i class="bi-journal-check"></i><span class="menu-title text-truncate" data-i18n="Input Nilai">Input Nilai</span></a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/input-nilai/ash') }}"><span class="menu-item text-truncate" data-i18n="Nilai ASH">Nilai ASH</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/input-nilai/asts') }}"><span class="menu-item text-truncate" data-i18n="Nilai ASTS">Nilai ASTS</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/input-nilai/asas') }}"><span class="menu-item text-truncate" data-i18n="Nilai ASAS">Nilai ASAS</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Rapor -->
        <li class=" nav-item mt-1"><a class="d-flex align-items-center" href="#"><i class="bi-journal-medical"></i><span class="menu-title text-truncate" data-i18n="Rapor">Rapor</span></a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/rapor/kelas/X') }}"><span class="menu-item text-truncate" data-i18n="Kelas X">Kelas X</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/rapor/kelas/XI') }}"><span class="menu-item text-truncate" data-i18n="Kelas XI">Kelas XI</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/'.Request::segment(1).'/rapor/kelas/XII') }}"><span class="menu-item text-truncate" data-i18n="Kelas XII">Kelas XII</span>
                    </a>
                </li>
            </ul>
        </li>
        @else
        <!-- Untuk Siswa -->
        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="bi-file-earmark-person"></i><span class="menu-title text-truncate" data-i18n="Ujian">Ujian</span></a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/user/ujian/ash') }}"><span class="menu-item text-truncate" data-i18n="Assessment ASH">Assessment ASH</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/user/ujian/asts') }}"><span class="menu-item text-truncate" data-i18n="Assessment ASTS">Assessment ASTS</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/user/ujian/asas') }}"><span class="menu-item text-truncate" data-i18n="Assessment ASAS">Assessment ASAS</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Hasil Ujian">Hasil Ujian</span></a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/user/hasil-ujian/ash') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Nilai ASH">Nilai ASH</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/user/hasil-ujian/asts') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Nilai ASTS">Nilai ASTS</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/user/hasil-ujian/asas') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Nilai ASAS">Nilai ASAS</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(Auth::user()->role->role === 'Admin')
        <li class=" nav-item mt-1"><a class="d-flex align-items-center" href="#"><i class="bi-file-earmark-person"></i><span class="menu-title text-truncate" data-i18n="Account">Account</span></a>
            <ul class="menu-content">
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/admin/account') }}"><span class="menu-item text-truncate" data-i18n="Account">Account</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/admin/account/reset-password') }}"><span class="menu-item text-truncate" data-i18n="Reset Password">Reset Password</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/admin/account/role') }}"><span class="menu-item text-truncate" data-i18n="Ganti Role">Ganti Role</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="{{ url('/admin/account/suspend') }}"><span class="menu-item text-truncate" data-i18n="Suspend">Suspend</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
    </div>
</div>
<!-- END: Main Menu-->