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
            @foreach($assessment as $ass)
            @if($ass->user_id == Auth::user()->id && $ass->exam_type === 'ASH')
            <div class="col-lg-4">
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="blog-card">
                            <h4 class="my-3">
                                <a href="" class="">{{ $ass->lesson->name }}</a>
                                <p>{{ $ass->grade.' '.$ass->major }}</p>
                                <p>Waktu Mulai : {{ \Carbon\Carbon::parse($ass->start_time)->format('d F Y H:i') }}</p>
                                <p>Waktu Selesai : {{ \Carbon\Carbon::parse($ass->end_time)->format('d F Y H:i') }}</p>
                                <p>Durasi : {{ $ass->duration/60 }} Menit</p>
                            </h4>
                            <hr class="hr-dashed">
                            <div class="d-flex justify-content-between">
                                <div class="meta-box">
                                    <div class="media">
                                        <img src="/assets/images/users/user.png" alt=""
                                            class="thumb-sm rounded-circle me-2">
                                        <div class="media-body align-self-center text-truncate">
                                            <h6 class="m-0 text-dark">{{ $ass->guru }}</h6>
                                            <ul class="p-0 list-inline mb-0">
                                            </ul>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                </div>
                                <!--end meta-box-->
                                <div class="align-self-center">
                                    <a wire:click="destroy('{{ $ass->uuid }}')" class="btn btn-sm btn-danger rounded-circle" wire:confirm="Yakin ingin menghapus ASH?"><i class="fas fa-trash"></i></a>&nbsp;
                                    <a href="{{ url('/'.Request::segment(1).'/assessment/ash/input-soal/'.$ass->uuid) }}" class="btn btn-sm btn-primary rounded-circle"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--end blog-card-->

                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            @endif
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