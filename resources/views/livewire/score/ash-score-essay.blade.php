@section('title', 'Lihat Nilai')

<div class="content-body">
    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <h5>Tipe Ujian : {{ $exam->exam_type }}</h5>
                        <h5>Mata Pelajaran : {{ $exam->lesson->name }}</h5>
                        <h5>Nama Siswa : {{ $user->name }}</h5>
                    </div>
                </div>
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card">
                    <h4 class="card-header">Pratinjau</h4>
                    <div class="card-body pt-1">
                        @foreach($essay_question as $key => $value)
                            <p>Soal {{ $key+1 }} : {{ $value->question }}</p>
                        @endforeach
                        @foreach($essay as $key => $value)
                            @if($value->esQuestion->exam_id == $exam->id)
                            <p>Jawaban No.{{ $key+1 }} :{{ $value->answer }} <a class="badge bg-success" wire:click="addScoreEssay('{{ $value->uuid }}')"><i class=" text-white bi-pencil-fill"></i></a></p>
                            <p>
                                <b>{{ $value->score ? $value->score : 'Belum Dinilai' }}</b>
                            </p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!--/ User Content -->
        </div>
    </section>
</div>