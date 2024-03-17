@section('title', 'Rapor Kelas X')

<div class="content-body">
    <div class="row">
        <div class="col-3">
            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/X/create') }}" class="btn btn-sm btn-primary mb-1">Tambah data</a>
            <select class="form-select" wire:model.live="kelas">
                <option>Pilih Kelas</option>                
                <option value="X-1">Kelas X-1</option>                
                <option value="X-2">Kelas X-2</option>                
                <option value="X-3">Kelas X-3</option>
                <option value="X-4">Kelas X-4</option>                
                <option value="X-5">Kelas X-5</option>                
                <option value="X-6">Kelas X-6</option>
                <option value="X-7">Kelas X-7</option>                
                <option value="X-8">Kelas X-8</option>                
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mt-1">
                <div class="card-header">
                    Kelas {{ $kelas }}
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-1">
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
                                    <td>
                                        {{ $rapor->user->name }}
                                    </td>
                                    <td>{{ $rapor->user->kelas }}</td>
                                    <td>{{ $rapor->exam_type }}</td>
                                    <td>{{ $rapor->semester }}</td>
                                    <td>{{ $rapor->th_ajaran }}</td>
                                    <td>
                                        <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/X/'.$rapor->uuid) }}" class="btn btn-sm btn-primary" wire:navigate><i class="bi-plus"></i> </a>
                                        <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/X/'.$rapor->user_id.'/'.$rapor->uuid.'/show') }}" class="btn btn-sm btn-success" wire:navigate><i class="bi-eye"></i></a>
                                        <button class="btn btn-sm btn-danger" wire:click="destroy('{{ $rapor->uuid }}')" wire:confirm="Yakin ingin menghapus rapor?"><i class="bi-trash"></i></button>
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