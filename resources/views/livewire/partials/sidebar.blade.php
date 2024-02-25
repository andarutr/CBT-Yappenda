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
                        <a class="nav-link" href="/{{ Request::segment(1) }}/dashboard" wire:navigate>Dashboard</a>
                    </li>
                </ul><!--end nav-->
                @if(Auth::user()->role->role === 'Admin')
                <div class="title-box">
                    <h6 class="menu-title">Account Management</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/account') }}" wire:navigate>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/account/reset-password') }}" wire:navigate>Reset Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/account/role') }}" wire:navigate>Ganti Role</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/account/suspend') }}" wire:navigate>Suspend</a>
                    </li>
                </ul><!--end nav-->
                @endif
            </div>
        </div>
        <!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>
<!-- end leftbar-tab-menu-->
