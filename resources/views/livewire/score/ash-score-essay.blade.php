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
                        <h5>Hasil Essay</h5>
                    </div>
                    <div class="card-body">
                        @foreach($essay_question as $key => $value)
                            <p>Soal {{ $key+1 }} : {{ $value->question }}</p>
                        @endforeach
                        @foreach($essay as $key => $value)
                            <p>Jawaban No.{{ $key+1 }} :{{ $value->answer }} </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:partials.footer />             
</div>
