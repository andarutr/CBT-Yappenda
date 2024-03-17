@section('title', 'Rapor')

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
                                <th>Nama Guru</th>
                                <th>Kelas</th>
                                <th>Semester</th>
                                <th>Tahun Ajaran</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($rapors as $rapor)
                                <tr>
                                    <td>Rapor {{ $rapor->exam_type.' '.$rapor->user->name }}</td>
                                    <td>{{ $rapor->wali_kelas }}</td>
                                    <td>{{ $rapor->user->kelas }}</td>
                                    <td>{{ $rapor->semester }}</td>
                                    <td>{{ $rapor->th_ajaran }}</td>
                                    <td>
                                        <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.Auth::user()->kelas.'/'.$rapor->user_id.'/'.$rapor->uuid.'/show') }}" class="btn btn-sm btn-success" wire:navigate><i class="bi-eye"></i></a>
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