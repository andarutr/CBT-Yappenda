@section('title', 'Input Nilai ASH')

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
                                    <th>Nama</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                    <th>Waktu Ujian</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($exam_results as $exam)
                                    @if($exam->exam->exam_type == 'ASH')
                                    <tr>
                                        <td><img src="{{ url('assets/images/users/'.$exam->user->picture) }}" alt="" class="rounded-circle thumb-xs me-1">
                                            {{ $exam->user->name }}
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
                                        <td>
                                            <a class="btn btn-success" wire:click="toExamResult('{{ $exam->user_id }}', '{{ $exam->exam->uuid }}')" wire:navigate><i class="fas fa-school"></i></a>
                                        </td>
                                    </tr>
                                    @endif
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
