<div>
    <p>Nama : <b>{{ $user->name }}</b></p>
    <p>Kelas : <b>{{ $user->kelas }}</b></p>
    <p>Fase : <b>{{ $user->fase }}</b></p>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th>Penilaian</th>
                <th style="max-width: 20px">TP1</th>
                <th style="max-width: 20px">TP2</th>
                <th style="max-width: 20px">TP3</th>
                <th style="max-width: 20px">TP4</th>
                <th style="max-width: 20px">TP5</th>
                <th style="max-width: 20px">TP6</th>
                <th style="max-width: 20px">TP7</th>
                <th style="max-width: 20px">TP8</th>
                <th>Total</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2">Agama Islam</td>
                <td><b>1.5 Sosial</b></td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td style="max-width: 10px">
                    <button class="btn btn-sm btn-success" wire:click=""><i class="bi-pencil-fill"></i></button>
                </td>
                <td style="max-width: 10px">
                    <button class="btn btn-sm btn-danger" wire:click="" wire:confirm="Yakin ingin menghapus data?"><i class="bi-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td><b>1.6 Sosial</b></td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
                <td>90</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
