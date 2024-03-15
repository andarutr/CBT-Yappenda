<form wire:submit="store">
    @if($picture)
    <div class="form-group mb-3 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Gambar</label>
        <div class="col-lg-9 col-xl-8">
            <a href="{{ asset('assets/images/exam/'.$picture) }}" data-lightbox="image-1">
                <img src="{{ asset('assets/images/exam/'.$picture) }}" class="img-fluid" width="150">
            </a>
        </div>
    </div>
    @endif
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
        <div class="col-lg-9 col-xl-8">
            <p>{{ $question->question }}</p>
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Jawaban</label>
        <div class="col-lg-9 col-xl-8">
            <textarea class="form-control" type="text" wire:model="answer" rows="8"></textarea>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <div class="col-lg-9 col-xl-8 offset-lg-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div> 
</form>