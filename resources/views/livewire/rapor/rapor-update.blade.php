@section('title','Perbarui Nilai Rapor')
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
                                <select class="form-control" wire:model.live="exam_id">
                                    <option value="">Pilih</option> 
                                    @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->lesson->name }} ({{ $exam->grade.' '.$exam->major }})[{{ $exam->exam_type }}] {{ $exam->semester.' '.$exam->th_ajaran }}</option> 
                                    @endforeach               
                                </select>
                                @error('exam_id')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Kelompok</label>
                                <select class="form-control" wire:model.live="kelompok_mpl">
                                    <option value="">Pilih</option> 
                                    <option value="KELOMPOK A (UMUM)">KELOMPOK A (UMUM)</option> 
                                    <option value="KELOMPOK B (UMUM)">KELOMPOK B (UMUM)</option> 
                                    <option value="KELOMPOK C MINAT (IPA)">KELOMPOK C MINAT (IPA)</option> 
                                    <option value="KELOMPOK C MINAT (IPS)">KELOMPOK C MINAT (IPS)</option> 
                                    <option value="PILIHAN">PILIHAN</option> 
                                </select>
                                @error('kelompok_mpl')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Nilai</label>
                                <input type="number" class="form-control" wire:model.live="nilai" min="0" max="100"> 
                                @error('nilai')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="mt-3">
                                <label>Deskripsi</label>
                                <textarea class="form-control" wire:model.live="description" rows="15"></textarea> 
                                @error('description')<p class="text-danger">{{ $message }}</p>@enderror
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
