<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Akun</th>
                <th>Bergabung</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $account)
            @if($account->id !== Auth::user()->id)
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/users/'.$account->picture) }}" alt="" class="rounded-circle" width="50" height="50">
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
                        <button class="btn btn-sm btn-success" wire:click="editPassword('{{$account->uuid}}')"><i class="bi-key"></i></button>
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>