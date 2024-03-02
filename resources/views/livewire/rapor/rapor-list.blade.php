@section('title','Rapor Kelas '.Request::segment(4))

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-12">
                <h5>Nama : {{ $rapor->user->name }}</h5>
                <h5>Kelas : {{ $rapor->user->kelas }}</h5>
                <h5>Semester : {{ $rapor->semester }}</h5>
                <h5>Tahun Ajaran : {{ $rapor->th_ajaran }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.Request::segment(4).'/'.$rapor->user_id.'/'.$rapor->uuid.'/create') }}" class="btn btn-primary" wire:navigate>Tambah data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="datatable_1">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Kelompok</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Capaian Pembelajaran</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($contents as $content)
                                    <tr>
                                        <td>{{ $content->kelompok_mpl }}</td>
                                        <td>{{ $content->exam->lesson->name }}</td>
                                        <td>{{ $content->nilai }}</td>
                                        <td>{{ $content->description }}</td>
                                        <td>
                                            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.Request::segment(4).'/'.$content->rapor->user_id.'/'.$content->rapor->uuid.'/edit') }}" class="btn btn btn-success" wire:navigate><i class="fas fa-edit"></i> </a>
                                            <button class="btn btn btn-danger" wire:click="destroy('{{ $content->uuid }}')" wire:confirm="Yakin ingin menghapus data?"><i class="fas fa-trash"></i></button>
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
            });
        </script>
    @endscript
@elseif(session('success'))
    @script
        <script>
            Swal.fire({
              title: "{{ session('success') }}",
              icon: "success"
            });
        </script>
    @endscript
@endif