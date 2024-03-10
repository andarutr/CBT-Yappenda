<form wire:submit="update">
    <div class="mt-3">
        <label>Nama</label>
        <input type="text" class="form-control"  wire:model="name" disabled>
    </div>
    <div class="mt-3">
        <label>Role</label>
        <select class="form-select" wire:model="role_id">
            @foreach($roles as $role)                    
            <option value="{{ $role->id }}">{{ $role->role }}</option>       
            @endforeach                             
        </select>
        @error('role_id')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-success">Reset</button>
    </div>
</form>