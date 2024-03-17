@section('title', 'Rapor '.Request::segment(3))

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mt-1">
                <div class="card-body">
                    <div class="table-responsive mt-1">
                        <table class="table" id="datatable_1">
                            <thead class="thead-light">
                              <tr>
                                <th>Rapor</th>
                                <th>Nama Guru/Wali Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Diperbarui</th>
                                <th>Dibuat</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($rapors as $rapor)
                                <tr>
                                    <td>Rapor {{ $rapor->exam_type }} Semester {{ $rapor->semester }}</td>
                                    <td>{{ $rapor->wali_kelas }}</td>
                                    <td>{{ $rapor->th_ajaran }}</td>
                                    <td>{{ $rapor->updated_at }}</td>
                                    <td>{{ $rapor->created_at }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" wire:click="download('{{ $rapor->user_id }}')"><i class="bi-download"> pdf</i></button>
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