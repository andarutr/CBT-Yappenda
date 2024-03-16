@section('title', 'Rapor Kelas XII')

<div class="page-content-tab">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XII/create') }}" class="btn btn-primary">Tambah data</a>
                <select class="form-select mt-1" wire:model.live="kelas">
                    <option>Pilih Kelas</option>                
                    <option value="XII-1">Kelas XII-1</option>                
                    <option value="XII-2">Kelas XII-2</option>                
                    <option value="XII-3">Kelas XII-3</option>
                    <option value="XII-4">Kelas XII-4</option>                
                    <option value="XII-5">Kelas XII-5</option>                
                    <option value="XII-6">Kelas XII-6</option>
                    <option value="XII-7">Kelas XII-7</option>                
                    <option value="XII-8">Kelas XII-8</option>                
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
                                            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XII/'.$rapor->uuid) }}" class="btn btn-sm btn-primary" wire:navigate><i class="bi-plus"></i> </a>
                                            <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/XII/'.$rapor->user_id.'/'.$rapor->uuid.'/show') }}" class="btn btn-sm btn-success" wire:navigate><i class="bi-eye"></i></a>
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
</div>