<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mt-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-centered">
                                <thead>
                                    <tr>
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
                                        <td><img src="{{ url('assets/images/users/'.$account->picture) }}" alt="" class="rounded-circle thumb-xs me-1">
                                            {{ $account->name }}
                                        </td>
                                        <td>{{ $account->email }}</td>
                                        <td>
                                        @if($account->roleId === 1)
                                        <span class="badge bg-primary">Admin</span>
                                        @elseif($account->roleId === 2)
                                        <span class="badge bg-success">Guru</span>
                                        @else
                                        <span class="badge bg-info">User</span>
                                        @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($account->created_at)->format('d F Y') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">show</button>
                                            <button class="btn btn-sm btn-success">edit</button>
                                            <button class="btn btn-sm btn-danger">delete</button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> 
        </div>
    </div>
    <livewire:partials.footer />             
</div>
