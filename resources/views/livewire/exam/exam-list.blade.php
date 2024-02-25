@section('title', 'Assessment Sumatif Harian')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-2">
                <a href="/{{ Request::segment(1) }}/assessment/ash/create" class="btn btn-primary" wire:navigate>Tambah data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="blog-card">
                            <h4 class="my-3">
                                <a href="" class="">Bahasa Indonesia</a>
                                <p>X IPA</p>
                                <p>Waktu Mulai : 26 February 2024, 08.00</p>
                                <p>Waktu Selesai : 26 February 2024, 08.00</p>
                                <p>Durasi : 60 Menit</p>
                            </h4>
                            <hr class="hr-dashed">
                            <div class="d-flex justify-content-between">
                                <div class="meta-box">
                                    <div class="media">
                                        <img src="/assets/images/users/user.png" alt=""
                                            class="thumb-sm rounded-circle me-2">
                                        <div class="media-body align-self-center text-truncate">
                                            <h6 class="m-0 text-dark">Nama Guru</h6>
                                            <ul class="p-0 list-inline mb-0">
                                            </ul>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                </div>
                                <!--end meta-box-->
                                <div class="align-self-center">
                                    <a href="{{ url('/user/ujian/bahasa-indonesia/sdnfjksf-sdfnjksdf-213nfdjk') }}" class="btn btn-sm btn-primary">Mulai Ujian</i></a>
                                </div>
                            </div>
                        </div>
                        <!--end blog-card-->

                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-4">
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="blog-card">
                            <h4 class="my-3">
                                <a href="" class="">Matematika</a>
                                <p>X IPA</p>
                                <p>Waktu Mulai : 26 February 2024, 08.00</p>
                                <p>Waktu Selesai : 26 February 2024, 08.00</p>
                                <p>Durasi : 60 Menit</p>
                            </h4>
                            <hr class="hr-dashed">
                            <div class="d-flex justify-content-between">
                                <div class="meta-box">
                                    <div class="media">
                                        <img src="/assets/images/users/user.png" alt=""
                                            class="thumb-sm rounded-circle me-2">
                                        <div class="media-body align-self-center text-truncate">
                                            <h6 class="m-0 text-dark">Nama Guru</h6>
                                            <ul class="p-0 list-inline mb-0">
                                            </ul>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                </div>
                                <!--end meta-box-->
                                <div class="align-self-center">
                                    <a class="btn btn-sm btn-secondary" disabled>Belum Mulai Ujian</i></a>
                                </div>
                            </div>
                        </div>
                        <!--end blog-card-->

                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-4">
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="blog-card">
                            <h4 class="my-3">
                                <a href="" class="">Bahasa Inggris</a>
                                <p>X IPA</p>
                                <p>Waktu Mulai : 26 February 2024, 08.00</p>
                                <p>Waktu Selesai : 26 February 2024, 08.00</p>
                                <p>Durasi : 60 Menit</p>
                            </h4>
                            <hr class="hr-dashed">
                            <div class="d-flex justify-content-between">
                                <div class="meta-box">
                                    <div class="media">
                                        <img src="/assets/images/users/user.png" alt=""
                                            class="thumb-sm rounded-circle me-2">
                                        <div class="media-body align-self-center text-truncate">
                                            <h6 class="m-0 text-dark">Nama Guru</h6>
                                            <ul class="p-0 list-inline mb-0">
                                            </ul>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                </div>
                                <!--end meta-box-->
                                <div class="align-self-center">
                                    <a class="btn btn-sm btn-warning" disabled>Ujian Telah Selesai</i></a>
                                </div>
                            </div>
                        </div>
                        <!--end blog-card-->

                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
    </div>
    <livewire:partials.footer />
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
              title: "{{ session('failed') }}",
              icon: "error"
            });
        </script>
    @endscript
@elseif(session('success'))
    @script
        <script>
            Swal.fire({
              title: "{{ session('success') }}",
              icon: "success"
            });
        </script>
    @endscript
@endif