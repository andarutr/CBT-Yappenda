@section('title', 'Rapor Kelas X')

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
                                    <th>Mata Pelajaran</th>
                                    <th>Nama</th>
                                    <th>Semester</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($exam_results as $exam)
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
                                            <a class="btn btn btn-success" wire:click="toPgResult('{{ $exam->user_id }}', '{{ $exam->exam->uuid }}')"><i class="fas fa-school"></i> PG</a>
                                            <a class="btn btn btn-success" wire:click="toEssayResult('{{ $exam->user_id }}', '{{ $exam->exam->uuid }}')"><i class="fas fa-school"></i> Essay</a>
                                            <button class="btn btn btn-success" wire:click="generateScore('{{ $exam->user_id }}', '{{ $exam->exam->uuid }}')"><i class="fas fa-book"></i> Nilai</button>
                                        </td>
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
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        </script>
    @endscript
@elseif(session('success'))
    @script
        <script>
            Swal.fire({
              title: "{{ session('success') }}",
              icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        </script>
    @endscript
@endif