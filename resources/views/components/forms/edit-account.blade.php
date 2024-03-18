<form wire:submit="update">
    <div class="mt-1">
        <label>Nama</label>
        <input type="text" class="form-control"  wire:model="name">
        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Email</label>
        <input type="text" class="form-control" wire:model="email"> 
        @error('email')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Role</label>
        <select class="form-select" wire:model="role_id">
            @foreach($roles as $role)                    
            <option value="{{ $role->id }}">{{ $role->role }}</option>       
            @endforeach                             
        </select>
        @error('role_id')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>