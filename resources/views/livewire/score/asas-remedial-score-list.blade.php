@section('title','Input Nilai Remedial ASAS')
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
                    @include('components.tables.asas-remedial-list')
                </div>
            </div>
        </div>
    </div>
    @include('components.buttons.btn-paginate')
</div>