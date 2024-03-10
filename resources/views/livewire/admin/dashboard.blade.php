@section('title','Dashboard')
<div class="grid grid-cols-12 gap-6">
    <div class="content-body">
        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row match-height">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-congratulations">
                        <div class="card-body text-center">
                            <img src="{{ url('assets/images/elements/decore-left.png') }}"
                                class="congratulations-img-left" alt="card-img-left" />
                            <img src="{{ url('assets/images/elements/decore-right.png') }}"
                                class="congratulations-img-right" alt="card-img-right" />
                            <div class="avatar avatar-xl bg-primary shadow">
                                <div class="avatar-content">
                                    <i data-feather="award" class="font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-1 text-white">Selamat Datang {{ Auth::user()->name }}</h1>
                                <p class="card-text m-auto w-75">
                                "Pendidikan adalah seni membebaskan pikiran." <strong>Mahatma Gandhi</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row match-height">
            <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-center pb-0">
                            <div class="avatar bg-light-info p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="user" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $admin }}</h2>
                            <p class="card-text mb-1">Admin</p>
                        </div>
                        <div id="gained-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-center pb-0">
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="users" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $guru }}</h2>
                            <p class="card-text mb-1">Guru</p>
                        </div>
                        <div id="gained-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-center pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="award" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $siswa }}</h2>
                            <p class="card-text">Siswa</p>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-center pb-0">
                            <div class="avatar bg-light-success p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="book" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $lesson }}</h2>
                            <p class="card-text">Mata Pelajaran</p>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>