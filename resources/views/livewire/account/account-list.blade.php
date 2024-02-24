@section('title', 'Account')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/admin/account/create') }}" class="btn btn-primary mt-3" wire:navigate>Tambah data</a>
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
                                        @if($account->role->role === 'Admin')
                                        <span class="badge bg-primary">Admin</span>
                                        @elseif($account->role->role === 'Guru')
                                        <span class="badge bg-success">Guru</span>
                                        @else
                                        <span class="badge bg-warning">User</span>
                                        @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($account->created_at)->format('d F Y') }}</td>
                                        <td>
                                            <a href="{{ url('/admin/account/edit/'.$account->uuid) }}" class="btn btn-success" wire:navigate><i class="fas fa-edit"></i></a>&nbsp;
                                            <button type="submit" class="btn btn-danger" wire:click="destroy('{{ $account->uuid }}')"><i class="fas fa-trash"></i></button>
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

@assets
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css
" rel="stylesheet">
@endassets

@if(session('failed'))
    @script
        <script>
            Swal.fire({
              title: "{{ session('failed') }}",
              icon: "error"
            });
        </script>
    @endscript
@elseif(session('success'))
    @script
        <script>
            Swal.fire({
              title: "{{ session('success') }}",
              icon: "success"
            });
        </script>
    @endscript
@endif