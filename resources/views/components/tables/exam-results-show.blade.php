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
            @foreach($this->exam_results as $exam)
            <tr>
                <td>
                    {{ $exam->exam->user->name }}
                </td>
                <td>{{ $exam->exam->lesson->name }}</td>
                <td>
                    @if($exam->score >= 75)
                    <b>{{ $exam->score }}</b>
                    @else
                    <b class="text-danger">{{ $exam->score }}</b>
                    @endif
                </td>
                <td>
                @if($exam->status === 'Belum dinilai')
                <span class="badge bg-warning">{{ $exam->status }}</span>
                @else
                <span class="badge bg-primary">{{ $exam->status }}</span>
                @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($exam->date_exam)->format('d F Y, H:i') }}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>