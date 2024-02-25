@section('title', 'Tambah Mata Pelajaran')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <form wire:submit="store">
                            <div class="mt-3">
                                <label>Mata Pelajaran</label>
                                <input type="text" class="form-control border border-3 rounded-3"  wire:model="name">
                                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:partials.footer />             
</div>
