<form wire:submit="update">
    <input type="hidden" wire:model="lesson_id">
    <div class="mt-3">
        <label>Mata Pelajaran</label>
        <input type="text" class="form-control"  wire:model="name">
        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>