@section('title','Tambah Nilai Rapor')
<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form wire:submit="store">
                        <div class="mt-1">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="{{ $user->name }}" disabled>
                        </div>
                        <div class="mt-1">
                            <label>Mata Pelajaran</label>
                            <select class="form-control" wire:model.live="exam_id">
                                <option value="">Pilih</option> 
                                @foreach($exams as $exam)
                                <option value="{{ $exam->id }}">{{ $exam->lesson->name }} ({{ $exam->grade.' '.$exam->major }})[{{ $exam->exam_type }}] {{ $exam->semester.' '.$exam->th_ajaran }}</option> 
                                @endforeach               
                            </select>
                            @error('exam_id')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <label>Deskripsi</label>
                            <textarea class="form-control" wire:model.live="description" rows="8"></textarea> 
                            @error('description')<p class="text-danger">{{ $message }}</p>@enderror
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
