@section('title', 'Lihat Nilai')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-8">
                <h5>Tipe Ujian : {{ $exam->exam_type }}</h5>
                <h5>Mata Pelajaran : {{ $exam->lesson->name }}</h5>
                <h5>Nama Siswa : {{ $user->name }}</h5>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Hasil PG</h5>
                    </div>
                    <div class="card-body">
                         @foreach($pganswer as $value)
                        <p>Soal : {{ $value->pgQuestion->pgquestion }}
                            @if($value->correct)
                            <i class="fas fa-check"></i>
                            @else
                            <i class="fas fa-times"></i>
                            @endif
                        </p>
                        <p>Jawaban : {{ $value->answer }}</p>
                        <p>Jawaban Benar : {{ $value->pgQuestion->correct }}</p>
                        @endforeach

                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        @php 
                            $a = count($pganswer);
                            $b = 100/$a;
                        @endphp
                        <h1>Point PG</h1>
                        <h2>{{ ($pgscore*$b)*0.7 }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:partials.footer />             
</div>
