<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Waktu Ujian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($remedials as $remeds)
            <tr>
                <td>
                    {{ $remeds->exam->user->name }}
                </td>
                <td>{{ $remeds->exam->lesson->name }}</td>
                <td>
                    @if($remeds->score >= 75)
                    <b>{{ $remeds->score }}</b>
                    @else
                    <b class="text-danger">{{ $remeds->score }}</b>
                    @endif
                </td>
                <td>
                @if($remeds->status === 'Belum dinilai')
                <span class="badge bg-warning">{{ $remeds->status }}</span>
                @else
                <span class="badge bg-primary">{{ $remeds->status }}</span>
                @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($remeds->date_exam)->format('d F Y, H:i') }}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>