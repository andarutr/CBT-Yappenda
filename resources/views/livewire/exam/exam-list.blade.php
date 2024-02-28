@section('title', 'Assessment Sumatif Harian')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            @foreach($exams as $exam)
            <div class="col-lg-4">
                <div class="card shadow mt-3">
                    <div class="card-header text-center">
                        <b>{{ \Carbon\Carbon::parse($exam->start_time)->format('d F Y') }}</b>
                    </div>
                    <div class="card-body">
                        <div class="blog-card">
                            <h4 class="my-3">
                                <a href="" class="">{{ $exam->lesson->name }}</a>
                                <p>{{ $exam->grade.' '.$exam->major }}</p>
                                <p>Waktu Mulai : {{ \Carbon\Carbon::parse($exam->start_time)->format('H:i') }}</p>
                                <p>Waktu Selesai : {{ \Carbon\Carbon::parse($exam->end_time)->format('H:i') }}</p>
                                <p>Durasi : {{ $exam->duration/60 }} Menit</p>
                            </h4>
                            <hr class="hr-dashed">
                            <div class="d-flex justify-content-between">
                                <div class="meta-box">
                                    <div class="media">
                                        <img src="/assets/images/users/user.png" alt=""
                                            class="thumb-sm rounded-circle me-2">
                                        <div class="media-body align-self-center text-truncate">
                                            <h6 class="m-0 text-dark">{{ $exam->user->name }}</h6>
                                            <ul class="p-0 list-inline mb-0">
                                            </ul>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                </div>
                                <!--end meta-box-->
                                @php 
                                $now = \Carbon\Carbon::now();
                                @endphp
                                <div class="align-self-center">
                                    @if($now < $exam->start_time)
                                    <button class="btn btn-sm btn-secondary">Belum Mulai</button>
                                    @elseif($now >= $exam->start_time && $now <= $exam->end_time)
                                    <button class="btn btn-sm btn-sm btn-primary" wire:click="toExam('{{ $exam->uuid }}')" wire:confirm="Yakin ingin memulai ujian?">Mulai Ujian</button>
                                    @else
                                    <button class="btn btn-sm btn-danger">Telah Berakhir</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end blog-card-->

                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            @endforeach
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