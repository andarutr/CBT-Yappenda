@section('title', 'Mata Pelajaran')
<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            @if($statusPage == 'list')
            <button class="btn btn-sm btn-primary mb-1" wire:click="toPage('create')">Tambah data</button>
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
            @else
            <button class="btn btn-sm btn-success mb-1" wire:click="toPage('list')">Kembali</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    @if($statusPage == 'list')
                    <!-- table -->
                    @endif

                    @if($statusPage == 'create')
                    <!-- Form Create -->
                    @endif

                    @if($statusPage !== 'list' AND $statusPage !== 'create')
                    <!-- Form Update -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($statusPage == 'list')
    <div class="row">
        <div class="col-2">
            <select wire:model.live="paginate" class="btn btn-sm btn-secondary mb-2">
                <option value="">Tampilkan Data</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    @endif
</div>