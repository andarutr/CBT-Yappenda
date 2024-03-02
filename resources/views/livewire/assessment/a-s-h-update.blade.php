@section('title', 'Memperbarui Assessment')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <form wire:submit="update">
                            <div class="mt-3">
                                <label>Mata Pelajaran</label>
                                <select class="form-control border border-3 rounded-3" disabled>
                                    <option>{{ $exam->lesson->name }}</option> 
                                </select>
                            </div>
                            <div class="mt-3">
                                <label>Jenis Assessment</label>
                                <select class="form-control border border-3 rounded-3" wire:model.live="exam_type">
                                    <option value="">Pilih</option> 
                                    <option value="ASH">ASH</option> 
                                    <option value="ASTS">ASTS</option> 
                                    <option value="ASAS">ASAS</option> 
                                </select>
                                @error('exam_type')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Kelas</label>
                                <select class="form-control border border-3 rounded-3" wire:model.live="grade">
                                    <option value="">Pilih</option> 
                                    <option value="X">X</option> 
                                    <option value="XI">XI</option> 
                                    <option value="XII">XII</option> 
                                </select>
                                @error('grade')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Jurusan</label>
                                <select class="form-control border border-3 rounded-3" wire:model.live="major">
                                    <option value="">Pilih</option> 
                                    <option value="IPA">IPA</option> 
                                    <option value="IPS">IPS</option> 
                                </select>
                                @error('major')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Semester</label>
                                <select class="form-control border border-3 rounded-3" wire:model.live="semester">
                                    <option value="">Pilih</option> 
                                    <option value="1 (Ganjil)">1 (Ganjil)</option> 
                                    <option value="2 (Genap)">2 (Genap)</option> 
                                </select>
                                @error('semester')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Tahun Ajaran</label>
                                <select class="form-control border border-3 rounded-3" wire:model.live="th_ajaran">
                                    <option value="">Pilih</option> 
                                    <option value="2024/2025">2024/2025</option> 
                                    <option value="2025/2026">2025/2026</option> 
                                    <option value="2026/2027">2026/2027</option> 
                                </select>
                                @error('th_ajaran')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Durasi (menit)</label>
                                <input type="number" class="form-control border border-3 rounded-3" wire:model.live="duration" min="0" max="180" placeholder="Hitung dalam menit"> 
                                @error('duration')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Waktu Mulai</label>
                                <input type="datetime-local" class="form-control border border-3 rounded-3" wire:model.live="start_time"> 
                                @error('start_time')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Waktu Selesai</label>
                                <input type="datetime-local" class="form-control border border-3 rounded-3" wire:model.live="end_time"> 
                                @error('end_time')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:partials.footer />             
</div>

