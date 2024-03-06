@section('title', 'Hasil Ujian '.Request::segment(3))

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                    <th>Waktu Ujian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exam_results as $exam)
                                <tr>
                                    <td>
                                        {{ $exam->exam->user->name }}
                                    </td>
                                    <td>{{ $exam->exam->lesson->name }}</td>
                                    <td>{{ $exam->score }}</td>
                                    <td>
                                    @if($exam->status === 'Belum dinilai')
                                    <span class="badge bg-warning">{{ $exam->status }}</span>
                                    @else
                                    <span class="badge bg-primary">{{ $exam->status }}</span>
                                    @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($exam->date_exam)->format('d F Y, H:i') }}</td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.buttons.btn-paginate')
</div>