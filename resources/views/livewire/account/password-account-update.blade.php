@section('title', 'Reset Password Akun')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <form wire:submit="update">
                            <div class="mt-3">
                                <label>Nama</label>
                                <input type="text" class="form-control border border-3 rounded-3"  wire:model="name" disabled>
                            </div>
                            <div class="mt-3">
                                <label>Password Baru</label>
                                <input type="password" class="form-control border border-3 rounded-3" wire:model.live="new_password"> 
                                @error('new_password')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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