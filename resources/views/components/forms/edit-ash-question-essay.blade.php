<form wire:submit="update_essay">
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto (opsional)</label>
        <div class="col-lg-9 col-xl-8">
            <input type="file" class="form-control" wire:model="picture" />
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
        <div class="col-lg-9 col-xl-8">
            <textarea class="form-control" type="text" wire:model="question" rows="5"></textarea>
        </div>
    </div>
    <div class="form-group mb-1 row">
        <div class="col-lg-9 col-xl-8 offset-lg-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div> 
</form>