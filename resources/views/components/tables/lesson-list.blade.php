<div class="table-responsive">
    <table class="table">
        <thead>
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
                    <td>{{ \Carbon\Carbon::parse($lesson->created_at)->format('d F Y') }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($lesson->updated_at)->format('d F Y') }}
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success" wire:click="edit('{{$lesson->uuid}}')"><i class="bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger" wire:click="destroy('{{ $lesson->uuid }}')"
                            wire:confirm="Yakin ingin menghapus mata pelajaran?"><i
                                class="bi-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>