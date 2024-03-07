<div>
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
            </div>
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span
                                class="user-name fw-bolder">{{ explode(' ', Auth::user()->name)[0] }}</span><span
                                class="user-status">{{ Auth::user()->role->role }}</span></div><span
                            class="avatar"><img class="round"
                                src="{{ asset('storage/assets/images/users/'.Auth::user()->picture) }}"
                                alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="/{{ Request::segment(1) }}/profile">
                            <i class="bi-people"></i> Profile
                        </a>
                        <a class="dropdown-item" href="/{{ Request::segment(1) }}/profile">
                            <i class="bi-key"></i> Ganti Password
                        </a>
                        <a class="dropdown-item" wire:click="logout"><i class="bi-box-arrow-left"></i> Logout</a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="bi-moon"></i></a></li>
            </ul>
        </div>
    </nav>
    
</div>