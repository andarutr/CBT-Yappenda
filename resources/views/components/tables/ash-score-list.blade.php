<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Waktu Ujian</th>
                <th width="40%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exam_results as $exam)
            <tr>
                <td><img src="{{ url('assets/images/users/'.$exam->user->picture) }}" alt="" class="rounded-circle" width="100">
                    {{ $exam->user->name }}
                </td>
                <td>{{ $exam->exam->lesson->name }}</td>
                <td>{{ $exam->score }}</td>
                <td>
                @if($exam->status === 'Belum dinilai')
                <span class="badge bg-warning">{{ $exam->status }}</span>
                @else
                <span class="badge bg-primary">{{ $exam->status }}</span>
                @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($exam->date_exam)->format('d F Y, H:i') }}</td>
                <td>
                    <a class="btn btn btn-sm btn-primary" wire:click="toPgResult('{{ $exam->user_id }}', '{{ $exam->exam->uuid }}')"><i class="bi-book"></i> PG</a>
                    <a class="btn btn btn-sm btn-info" wire:click="toEssayResult('{{ $exam->user_id }}', '{{ $exam->exam->uuid }}')"><i class="bi-book"></i> Essay</a>
                    <button class="btn btn btn-sm btn-success" wire:click="generateScore('{{ $exam->user_id }}', '{{ $exam->exam->uuid }}')"><i class="bi-award"></i> Nilai</button>
                </td>
            </tr>
            @endforeach   
        </tbody>
    </table>
</div>