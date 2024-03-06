@section('title', strtoupper(Request::segment(3)))

<div class="content-body">
    <div class="row">
        @foreach($exams as $exam)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>{{ \Carbon\Carbon::parse($exam->start_time)->format('d F Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                        @php 
                        $now = \Carbon\Carbon::now();
                        @endphp
                        <div class="role-heading">
                            <h4 class="fw-bolder">{{ $exam->lesson->name }}</h4>
                            <p>{{ $exam->grade.' '.$exam->major }}</p>
                            <p>Waktu Mulai : {{ \Carbon\Carbon::parse($exam->start_time)->format('H:i') }}</p>
                            <p>Waktu Selesai : {{ \Carbon\Carbon::parse($exam->end_time)->format('H:i') }}</p>
                            <p>Durasi : {{ $exam->duration }} Menit</p>
                            <p>Guru : {{ $exam->user->name }}</p>
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
            </div>
        </div>
        @endforeach
    </div>
</div>
