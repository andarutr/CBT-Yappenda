@section('title','Input Tujuan Pembelajaran '.$user->name)
<div class="content-body">
    <div class="row">
        <div class="col-4">
            <p>Nama : <b>{{ $user->name }}</b></p>
            <p>Kelas : <b>{{ $user->kelas }}</b></p>
            <p>Fase : <b>{{ $user->fase }}</b></p>
            @if($statusPage == 'list')
            <button wire:click="create()" class="btn btn-sm btn-primary mb-2">Tambah data</button>
            @else
            <button wire:click="toPage('list')" class="btn btn-sm btn-success mb-2">Kembali</button>
            @endif
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($statusPage == 'list')
                        @include('components.tables.ash-result-list')
                    @endif

                    @if($statusPage == 'create')
                        @include('components.forms.post-ash-result-id')
                    @endif

                    @if($statusPage == 'edit')
                        @include('components.forms.edit-ash-result-id')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
