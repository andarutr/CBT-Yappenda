<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Tujuan Pembelajaran</th>
                <th>TP1</th>
                <th>TP2</th>
                <th>TP3</th>
                <th>TP4</th>
                <th>TP5</th>
                <th>TP6</th>
                <th>TP7</th>
                <th>TP8</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->purposes as $tp)
            <tr>
                <td>{{ $tp->title }}</td>
                <td>{{ $tp->tp_1 }}</td>
                <td>{{ $tp->tp_2 }}</td>
                <td>{{ $tp->tp_3 }}</td>
                <td>{{ $tp->tp_4 }}</td>
                <td>{{ $tp->tp_5 }}</td>
                <td>{{ $tp->tp_6 }}</td>
                <td>{{ $tp->tp_7 }}</td>
                <td>{{ $tp->tp_8 }}</td>
                <td>
                    <button class="btn btn-sm btn-success" wire:click="edit('{{$tp->uuid}}')"><i class="bi-pencil-fill"></i></button>
                    <button class="btn btn-sm btn-danger" wire:click="destroy('{{$tp->uuid}}')" wire:confirm="Yakin ingin menghapus data?"><i class="bi-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>