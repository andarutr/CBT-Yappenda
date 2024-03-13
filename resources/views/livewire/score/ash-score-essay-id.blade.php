@section('title', 'Berikan Nilai Essay!')

<div class="content-body">
    <section class="app-user-view-account">
        <a href="{{ url('/'.strtolower(Auth::user()->role->role).'/input-nilai/'.Request::segment(3)) }}" class="btn btn-sm btn-success mb-1">Kembali</a>
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card">
                    <h4 class="card-header">Koreksi Essay</h4>
                    <div class="card-body pt-1">
                    <form wire:submit="update">
                        <input type="number" class="form-control" wire:model="score" required>
                        <button class="btn btn-success mt-1">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <!--/ User Content -->
        </div>
    </section>
</div>

