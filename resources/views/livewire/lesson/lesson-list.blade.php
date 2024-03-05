@section('title', 'Mata Pelajaran')
<div class="content-body">
    <div class="row" id="basic-table">
        <div class="col-3 mb-2">
            @if($statusPage == 'list')
            <button class="btn btn-sm btn-primary mb-1" wire:click="toPage('create')">Tambah data</button>
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
            @else
            <button class="btn btn-sm btn-success mb-1" wire:click="toPage('list')">Kembali</button>
            @endif
        </div>
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
                                    <th>Mata Pelajaran</th>
                                    <th>Dibuat</th>
                                    <th>Diperbarui</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($lesson->created_at)->format('d F Y') }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($lesson->updated_at)->format('d F Y') }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-success" wire:click="edit('{{$lesson->uuid}}')"><i class="bi-pencil-square"></i></button>
                                            <button class="btn btn-sm btn-danger" wire:click="destroy('{{ $lesson->uuid }}')"
                                                wire:confirm="Yakin ingin menghapus mata pelajaran?"><i
                                                    class="bi-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($statusPage == 'create')
                    <form wire:submit="store">
                        <div class="mt-3">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control border border-3 rounded-3"  wire:model="name">
                            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endif

                    @if($statusPage !== 'list' AND $statusPage !== 'create')
                    <form wire:submit="update">
                        <input type="hidden" wire:model="lesson_id">
                        <div class="mt-3">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control border border-3 rounded-3"  wire:model="name">
                            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
            
        </div>
        <div class="mb-3">
            {{ $lessons->links() }}
        </div>
    </div>
</div>