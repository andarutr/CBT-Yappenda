@section('title', 'Reset Password Account')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-12">
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="datatable_1">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Akun</th>
                                    <th>Bergabung</th>
                                    <th>Action</th>
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
                                            <a href="{{ url('/admin/account/reset-password/'.$account->uuid) }}" class="btn btn-success" wire:navigate><i class="fas fa-lock"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach                      
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <livewire:partials.footer />             
</div>