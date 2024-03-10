<form wire:submit="store">
    <div class="mt-1">
        <label>Nama</label>
        <input type="text" class="form-control" wire:model.live="name">
        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Email</label>
        <input type="text" class="form-control" wire:model.live="email"> 
        @error('email')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Role</label>
        <select class="form-control" wire:model.live="role_id">
            <option value="">Pilih</option>                
            @foreach($roles as $role)                    
            <option value="{{ $role->id }}">{{ $role->role }}</option>       
            @endforeach                             
        </select>
        @error('role_id')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>