@section('title', 'Berikan Nilai Essay!')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
       <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <form wire:submit="update">
                        <input type="number" class="form-control" wire:model="score" required>
                        <button class="btn btn-success mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
       </div>
    </div>
    <livewire:partials.footer />             
</div>

