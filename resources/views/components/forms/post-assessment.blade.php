<form wire:submit="store">
    <div class="mt-1">
        <label>Mata Pelajaran</label>
        <select class="form-select" wire:model.live="lesson_id">
            <option value="">Pilih</option> 
            @foreach($lessons as $lesson)
            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option> 
            @endforeach               
        </select>
        @error('lesson_id')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Jenis Assessment</label>
        <select class="form-select" wire:model.live="exam_type">
            <option value="">Pilih</option> 
            <option value="ASH">ASH</option> 
            <option value="ASTS">ASTS</option> 
            <option value="ASAS">ASAS</option> 
        </select>
        @error('exam_type')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Kelas</label>
        <select class="select2 form-select" wire:model.live="grade">
            <option value="">Pilih</option> 
            <optgroup label="Kelas X">
                <option value="X-1">X-1</option>
                <option value="X-2">X-2</option>
                <option value="X-3">X-3</option>
                <option value="X-4">X-4</option>
                <option value="X-5">X-5</option>
                <option value="X-6">X-6</option>
                <option value="X-7">X-7</option>
                <option value="X-8">X-8</option>
            </optgroup>
            <optgroup label="Kelas XI">
                <option value="XI-1">XI-1</option>
                <option value="XI-2">XI-2</option>
                <option value="XI-3">XI-3</option>
                <option value="XI-4">XI-4</option>
                <option value="XI-5">XI-5</option>
                <option value="XI-6">XI-6</option>
                <option value="XI-7">XI-7</option>
                <option value="XI-8">XI-8</option>
            </optgroup>
            <optgroup label="Kelas XII">
                <option value="XII-1">XII-1</option>
                <option value="XII-2">XII-2</option>
                <option value="XII-3">XII-3</option>
                <option value="XII-4">XII-4</option>
                <option value="XII-5">XII-5</option>
                <option value="XII-6">XII-6</option>
                <option value="XII-7">XII-7</option>
                <option value="XII-8">XII-8</option>
            </optgroup>
        </select>
        @error('grade')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Jurusan</label>
        <select class="form-select" wire:model.live="major">
            <option value="">Pilih</option> 
            <option value="IPA">IPA</option> 
            <option value="IPS">IPS</option> 
        </select>
        @error('major')<p class="text-danger">{{ $message }}</p>@enderror
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
        <label>Durasi (menit)</label>
        <input type="number" class="form-control" wire:model.live="duration" min="0" max="180" placeholder="Hitung dalam menit"> 
        @error('duration')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Waktu Mulai</label>
        <input type="datetime-local" class="form-control" wire:model.live="start_time"> 
        @error('start_time')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>Waktu Selesai</label>
        <input type="datetime-local" class="form-control" wire:model.live="end_time"> 
        @error('end_time')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>