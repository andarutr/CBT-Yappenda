@section('title', 'Tambah ASTS')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <form wire:submit="store">
                            <div class="mt-3">
                                <label>Mata Pelajaran</label>
                                <select class="form-control border border-3 rounded-3" wire:model.live="lesson_id">
                                    <option value="">Pilih</option> 
                                    @foreach($lessons as $lesson)
                                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option> 
                                    @endforeach               
                                </select>
                                @error('lesson_id')<p class="text-danger">{{ $message }}</p>@enderror
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:partials.footer />             
</div>

