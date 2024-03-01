@section('title', 'Hasil Ujian '.Request::segment(3))

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-12">
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="datatable_1">
                                <thead class="thead-light">
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
                                        <td><img src="{{ asset('storage/assets/images/users/'.$exam->exam->user->picture) }}" alt="" class="rounded-circle thumb-xs me-1">
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
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <livewire:partials.footer />             
</div>