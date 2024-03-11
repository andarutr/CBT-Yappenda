@section('title', 'Suspend Account')
<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    @include('components.tables.account-suspend')
                </div>
            </div>
        </div>
    </div>
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
</div>