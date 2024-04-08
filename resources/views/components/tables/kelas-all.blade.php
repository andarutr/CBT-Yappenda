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
        @foreach($this->rapors as $rapor)
        <tr>
            <td>
                {{ $rapor->user->name }}
            </td>
            <td>{{ $rapor->user->kelas }}</td>
            <td>{{ $rapor->exam_type }}</td>
            <td>{{ $rapor->semester }}</td>
            <td>{{ $rapor->th_ajaran }}</td>
            <td>
                <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.Request::segment(4).'/'.$rapor->uuid) }}" class="btn btn-sm btn-primary" wire:navigate><i class="bi-plus"></i> </a>
                <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.Request::segment(4).'/'.$rapor->user_id.'/'.$rapor->uuid.'/show') }}" class="btn btn-sm btn-success" wire:navigate><i class="bi-eye"></i></a>
                <button class="btn btn-sm btn-danger" wire:click="destroy('{{ $rapor->uuid }}')" wire:confirm="Yakin ingin menghapus rapor?"><i class="bi-trash"></i></button>
            </td>
        </tr>
        @endforeach                      
    </tbody>
</table>