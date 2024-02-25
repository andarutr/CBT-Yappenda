@section('title', 'Mata Pelajaran')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-12">
            <a href="{{ url('/admin/mata-pelajaran/create') }}" class="btn btn-primary mt-3" wire:navigate>Tambah data</a>
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="datatable_1">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Dibuat</th>
                                    <th>Diperbarui</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($lesson->created_at)->format('d F Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($lesson->updated_at)->format('d F Y') }}</td>
                                        <td>
                                            <a href="{{ url('/admin/mata-pelajaran/edit/'.$lesson->uuid) }}" class="btn btn-success" wire:navigate><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" wire:click="destroy('{{ $lesson->uuid }}')" wire:confirm="Yakin ingin menghapus mata pelajaran?"><i class="fas fa-trash"></i></a>
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