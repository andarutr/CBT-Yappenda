@section('title', 'Account')
<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            @if($statusPage == 'list')
            <button class="btn btn-sm btn-primary mb-1" wire:click="toPage('create')">Tambah data</button>
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
            @else
            <button class="btn btn-sm btn-success mb-1" wire:click="toPage('list')">Kembali</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    @if($statusPage == 'list')
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Akun</th>
                                    <th>Bergabung</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts as $account)
                                @if($account->id !== Auth::user()->id)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/assets/images/users/'.$account->picture) }}" alt="" class="img-fluid rounded-circle thumb-xs me-1" width="80">
                                        </td>
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->email }}</td>
                                        <td>
                                        @if($account->role->role === 'Admin')
                                        <span class="badge bg-primary">Admin</span>
                                        @elseif($account->role->role === 'Guru')
                                        <span class="badge bg-success">Guru</span>
                                        @elseif($account->role->role === 'User')
                                        <span class="badge bg-warning">User</span>
                                        @else
                                        <span class="badge bg-danger">Suspend</span>
                                        @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($account->created_at)->format('d F Y') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" wire:click="edit('{{$account->uuid}}')"><i class="bi-pencil-square"></i></button>
                                            <button class="btn btn-sm btn-danger" wire:click="destroy('{{ $account->uuid }}')"
                                                wire:confirm="Yakin ingin menghapus mata pelajaran?"><i
                                                    class="bi-trash"></i></button>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($statusPage == 'create')
                    <form wire:submit="store">
                        <div class="mt-1">
                            <label>Nama</label>
                            <input type="text" class="form-control border border-3 rounded-3" wire:model.live="name">
                            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Email</label>
                            <input type="text" class="form-control border border-3 rounded-3" wire:model.live="email"> 
                            @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Role</label>
                            <select class="form-control border border-3 rounded-3" wire:model.live="role_id">
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
                    @endif

                    @if($statusPage !== 'list' AND $statusPage !== 'create')
                    <form wire:submit="update">
                        <div class="mt-3">
                            <label>Nama</label>
                            <input type="text" class="form-control border border-3 rounded-3"  wire:model="name">
                            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-3">
                            <label>Email</label>
                            <input type="text" class="form-control border border-3 rounded-3" wire:model="email"> 
                            @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-3">
                            <label>Role</label>
                            <select class="form-control border border-3 rounded-3" wire:model="role_id">
                                @foreach($roles as $role)                    
                                <option value="{{ $role->id }}">{{ $role->role }}</option>       
                                @endforeach                             
                            </select>
                            @error('role_id')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($statusPage == 'list')
    <div class="row">
        <div class="col-2">
            <select wire:model.live="paginate" class="btn btn-sm btn-secondary mb-2">
                <option value="">Tampilkan Data</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    @endif
</div>