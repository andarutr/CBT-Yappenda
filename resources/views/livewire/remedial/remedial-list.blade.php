@section('title', strtoupper(Request::segment(3)))

<div class="content-body">
    <div class="row">
        @foreach($remedials as $remedial)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>{{ \Carbon\Carbon::parse($remedial->exam->start_time)->format('d F Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                        @php 
                        $now = \Carbon\Carbon::now();
                        @endphp
                        <div class="role-heading">
                            <h4 class="fw-bolder">{{ $remedial->exam->lesson->name }}</h4>
                            <p>{{ $remedial->exam->grade.' '.$remedial->exam->major }}</p>
                            <p>Waktu Mulai : {{ \Carbon\Carbon::parse($remedial->exam->start_time)->format('H:i') }}</p>
                            <p>Waktu Selesai : {{ \Carbon\Carbon::parse($remedial->exam->end_time)->format('H:i') }}</p>
                            <p>Durasi : {{ $remedial->exam->duration }} Menit</p>
                            <p>Guru : {{ $remedial->exam->user->name }}</p>
                            @if($now < $remedial->exam->start_time)
                            <button class="btn btn-sm btn-secondary">Belum Mulai</button>
                            @elseif($now >= $remedial->exam->start_time && $now <= $remedial->exam->end_time)
                            <button class="btn btn-sm btn-sm btn-primary" wire:click="toRemedial('{{ $remedial->exam->uuid }}')" wire:confirm="Yakin ingin memulai ujian?">Mulai Ujian</button>
                            @else
                            <button class="btn btn-sm btn-danger">Telah Berakhir</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
