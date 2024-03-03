@section('title', 'Suspend Account')

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
                                    <th>Status Akun</th>
                                    <th>Bergabung</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($accounts as $account)
                                    @if($account->id !== Auth::user()->id)
                                    <tr>
                                        <td><img src="{{ asset('storage/assets/images/users/'.$account->picture) }}" alt="" class="rounded-circle thumb-xs me-1">
                                            {{ $account->name }}
                                        </td>
                                        <td>{{ $account->email }}</td>
                                        <td>
                                        @if($account->role->role !== 'Suspend')
                                        <span class="badge bg-primary">Active</span>
                                        @else
                                        <span class="badge bg-danger">Suspend</span>
                                        @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($account->created_at)->format('d F Y') }}</td>
                                        <td>
                                            @if($account->role->role !== 'Suspend')
                                            <a class="btn btn-danger" wire:click="suspend('{{ $account->uuid }}')" wire:confirm="Yakin ingin suspend akun?" title="suspend"><i class="fas fa-times"></i></a>
                                            @else
                                            <a class="btn btn-primary" wire:click="un_suspend('{{ $account->uuid }}')" wire:confirm="Yakin ingin unsuspend akun?" title="unsuspend"><i class="fas fa-check"></i></a>
                                            @endif
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