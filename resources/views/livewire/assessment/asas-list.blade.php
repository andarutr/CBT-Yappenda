@section('title', 'Assessment Sumatif Akhir Semester')

<div class="content-body">
    @if($statusPage == 'list')
    <button class="btn btn-primary mb-2" wire:click="create">Tambah data</button>
    @else
    <button class="btn btn-success mb-2" wire:click="toPage('list')">Kembali</button>
    @endif

    @if($statusPage == 'list')
    <div class="row">
        @foreach($assessment as $ass)
        @if($ass->user_id == Auth::user()->id || Auth::user()->role->role === 'Admin')
        <div class="col-lg-4">
            <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $ass->lesson->name }}</h5>
                <p class="card-text">
                    <p>{{ $ass->grade.' '.$ass->major }}</p>
                    <p>Waktu Mulai : {{ \Carbon\Carbon::parse($ass->start_time)->format('d-m-Y H:i') }}</p>
                    <p>Waktu Selesai : {{ \Carbon\Carbon::parse($ass->end_time)->format('d-m-Y H:i') }}</p>
                    <p>Durasi : {{ $ass->duration }} Menit</p>
                    <p>Semester : {{ $ass->semester }}</p>
                    <p>Tahun Ajaran : {{ $ass->th_ajaran }}</p>
                    <p>Guru : {{ $ass->user->name }}</p>
                </p>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-success rounded-circle"><i class="bi-pencil-fill" wire:click="edit('{{ $ass->uuid }}')"></i></button>&nbsp;
                <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/assessment/asas/input-soal/pg/'.$ass->uuid) }}" class="btn btn-sm btn-primary rounded-circle"><i class="bi-plus"></i></a>
                <button wire:click="destroy('{{ $ass->uuid }}')" class="btn btn-sm btn-danger rounded-circle" wire:confirm="Yakin ingin menghapus ASH?"><i class="bi-trash"></i></button>&nbsp;
            </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endif

    @if($statusPage == 'create')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    @include('components.forms.post-assessment')
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($statusPage == 'edit')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    @include('components.forms.edit-assessment')
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
