@section('title', 'Tambah Rapor')

<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">@yield('title')</div>
                <div class="card-body">
                    <form wire:submit="store">
                        <div class="">
                            <label>Siswa</label>
                            <select class="form-select" wire:model.live="user_id">
                                <option value="">Pilih</option> 
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option> 
                                @endforeach               
                            </select>
                            @error('user_id')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Jenis Ujian</label>
                            <select class="form-select" wire:model.live="exam_type">
                                <option value="">Pilih</option> 
                                <option value="ASH">ASH</option> 
                                <option value="ASTS">ASTS</option> 
                                <option value="ASAS">ASAS</option> 
                                <option value="PAS">PAS</option> 
                            </select>
                            @error('exam_type')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Semester</label>
                            <select class="form-select" wire:model.live="semester">
                                <option value="">Pilih</option> 
                                <option value="1 (Ganjil)">1 (Ganjil)</option> 
                                <option value="2 (Genap)">2 (Genap)</option> 
                            </select>
                            @error('semester')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Tahun Ajaran</label>
                            <select class="form-select" wire:model.live="th_ajaran">
                                <option value="">Pilih</option> 
                                <option value="2024/2025">2024/2025</option> 
                                <option value="2025/2026">2025/2026</option> 
                                <option value="2026/2027">2026/2027</option> 
                            </select>
                            @error('th_ajaran')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
