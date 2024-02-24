@section('title', 'Tambah Akun')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <form wire:submit="store">
                            <div class="mt-3">
                                <label>Nama</label>
                                <input type="text" class="form-control border border-3 rounded-3" wire:model.live="name">
                                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Email</label>
                                <input type="text" class="form-control border border-3 rounded-3" wire:model.live="email"> 
                                @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Role</label>
                                <select class="form-control border border-3 rounded-3" wire:model.live="role_id">
                                    <option value="">Pilih</option>                
                                    @foreach($roles as $role)                    
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>       
                                    @endforeach                             
                                </select>
                                @error('role_id')<p class="text-danger">{{ $message }}</p>@enderror
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

