<form wire:submit="store">
    @if($picture)
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Gambar</label>
        <div class="col-lg-9 col-xl-8">
            <a href="{{ asset('assets/images/exam/'.$picture) }}" data-lightbox="image-1">
                <img src="{{ asset('assets/images/exam/'.$picture) }}" class="img-fluid" width="150">
            </a>
        </div>
    </div>
    @endif
    <div class="form-group mb-1 row">
        <label class="col-lg-2 text-end mb-lg-0 align-self-center form-label">Soal</label>
        <div class="col-lg-10">
            {!! $question->pgquestion !!}
        </div>
    </div>
    @foreach(json_decode($question->option) as $key => $value)
    <div class="form-group mb-1 row">
        <label class="col-lg-2 text-end mb-lg-0 align-self-center form-label"></label>
        <div class="col-lg-10">
            {{ $key }}. {{ $value }}
        </div>
    </div>
    @endforeach
    <div class="form-group mb-1 row">
        <label class="col-lg-2 text-end mb-lg-0 align-self-center form-label">Jawaban</label>
        <div class="col-lg-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <input type="radio" wire:model="answer" value="A"> A
                        </th>
                        <th>
                            <input type="radio" wire:model="answer" value="B"> B
                        </th>
                        <th>
                            <input type="radio" wire:model="answer" value="C"> C
                        </th>
                        <th>
                            <input type="radio" wire:model="answer" value="D"> D
                        </th>
                        <th>
                            <input type="radio" wire:model="answer" value="E"> E
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <div class="col-lg-12 col-xl-12 offset-lg-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div> 
</form>