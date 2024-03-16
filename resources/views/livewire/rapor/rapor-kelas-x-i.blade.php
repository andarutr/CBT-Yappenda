@section('title', 'Rapor Kelas XI')

<div class="content-body">
    <div class="row">
        <div class="col-3">
            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XI/create') }}" class="btn btn-sm btn-primary">Tambah data</a>
            <select class="form-select mt-1" wire:model.live="kelas">
                <option>Pilih Kelas</option>                
                <option value="XI-1">Kelas XI-1</option>                
                <option value="XI-2">Kelas XI-2</option>                
                <option value="XI-3">Kelas XI-3</option>
                <option value="XI-4">Kelas XI-4</option>                
                <option value="XI-5">Kelas XI-5</option>                
                <option value="XI-6">Kelas XI-6</option>
                <option value="XI-7">Kelas XI-7</option>                
                <option value="XI-8">Kelas XI-8</option>                
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mt-1">
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
                                        <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XI/'.$rapor->uuid) }}" class="btn btn-sm btn-primary" wire:navigate><i class="bi-plus"></i> </a>
                                        <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XI/'.$rapor->user_id.'/'.$rapor->uuid.'/show') }}" class="btn btn-sm btn-success" wire:navigate><i class="bi-eye"></i></a>
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
