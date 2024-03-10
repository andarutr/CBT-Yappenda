<form wire:submit="update">
    <div class="mt-1">
        <label>Nama</label>
        <input type="text" class="form-control"  wire:model="name" disabled>
    </div>
    <div class="mt-1">
        <label>Password Baru</label>
        <input type="password" class="form-control" wire:model.live="new_password"> 
        @error('new_password')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <button type="submit" class="btn btn-success">Reset</button>
    </div>
</form>