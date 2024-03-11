@section('title', 'Hasil Nilai Assessment Harian')

<div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ashPurposes as $ash)
                                    <tr>
                                        <td>{{ $ash->lesson->name }}</td>
                                        <td><b>{{ $ash->ashPurpose->title }}</b></td>
                                        <td>{{ $ash->tp_1 }}</td>
                                        <td>{{ $ash->tp_2 }}</td>
                                        <td>{{ $ash->tp_3 }}</td>
                                        <td>{{ $ash->tp_4 }}</td>
                                        <td>{{ $ash->tp_5 }}</td>
                                        <td>{{ $ash->tp_6 }}</td>
                                        <td>{{ $ash->tp_7 }}</td>
                                        <td>{{ $ash->tp_8 }}</td>
                                        <td>{{ $ash->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
