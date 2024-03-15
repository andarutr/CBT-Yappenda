<form wire:submit="store_pg">
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Foto (opsional)</label>
        <div class="col-lg-9 col-xl-8">
            <input type="file" class="form-control" wire:model="picture" />
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
        <div class="col-lg-9 col-xl-8">
            <textarea class="form-control" type="text" wire:model="pgquestion"></textarea>
            @error('pgquestion')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">A</label>
        <div class="col-lg-9 col-xl-8">
            <input class="form-control" type="text" wire:model="option.A">
            @error('option.A')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">B</label>
        <div class="col-lg-9 col-xl-8">
            <input class="form-control" type="text" wire:model="option.B">
                @error('option.B')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">C</label>
        <div class="col-lg-9 col-xl-8">
            <input class="form-control" type="text" wire:model="option.C">
                @error('option.C')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">D</label>
        <div class="col-lg-9 col-xl-8">
            <input class="form-control" type="text" wire:model="option.D">
                @error('option.D')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">E</label>
        <div class="col-lg-9 col-xl-8">
            <input class="form-control" type="text" wire:model="option.E">
                @error('option.E')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="form-group mb-1 row">
        <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Jawaban Benar</label>
        <div class="col-lg-9 col-xl-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <input type="radio" wire:model="correct" value="A"> A
                        </th>
                        <th>
                            <input type="radio" wire:model="correct" value="B"> B
                        </th>
                        <th>
                            <input type="radio" wire:model="correct" value="C"> C
                        </th>
                        <th>
                            <input type="radio" wire:model="correct" value="D"> D
                        </th>
                        <th>
                            <input type="radio" wire:model="correct" value="E"> E
                        </th>
                    </tr>
                </thead>
            </table>
                @error('correct')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="form-group mb-1 row">
        <div class="col-lg-9 col-xl-8 offset-lg-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div> 
</form> 