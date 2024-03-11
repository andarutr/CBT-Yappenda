@section('title', 'Account')
<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            @if($statusPage == 'list')
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
                        @include('components.tables.account-role')
                    @endif

                    @if($statusPage == 'editRole')
                        @include('components.forms.edit-role-account')
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($statusPage == 'list')
        @include('components.buttons.btn-paginate')
    @endif
</div>