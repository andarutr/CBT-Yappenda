@section('title','Perbarui Nilai Rapor')
<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form wire:submit="update">
                        <div class="mt-1">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="{{ $user->name }}" disabled>
                        </div>
                        <div class="mt-1">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control" placeholder="{{ $exam }}" disabled>
                        </div>
                        <div class="mt-1">
                            <label>Deskripsi</label>
                            <textarea class="form-control" wire:model.live="description" rows="8"></textarea> 
                            @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
