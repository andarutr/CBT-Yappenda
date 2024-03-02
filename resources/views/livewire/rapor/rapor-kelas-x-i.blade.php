@section('title', 'Rapor Kelas XI')

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
                                    <th>Kelas</th>
                                    <th>Jenis Ujian</th>
                                    <th>Semester</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($rapors as $rapor)
                                    <tr>
                                        <td><img src="{{ url('assets/images/users/'.$rapor->user->picture) }}" alt="" class="rounded-circle thumb-xs me-1">
                                            {{ $rapor->user->name }}
                                        </td>
                                        <td>{{ $rapor->user->kelas }}</td>
                                        <td>{{ $rapor->exam_type }}</td>
                                        <td>{{ $rapor->semester }}</td>
                                        <td>{{ $rapor->th_ajaran }}</td>
                                        <td>
                                            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XI/'.$rapor->uuid) }}" class="btn btn btn-primary" wire:navigate><i class="fas fa-plus"></i> </a>
                                            <button class="btn btn btn-success" wire:click=""><i class="fas fa-eye"></i></button>
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