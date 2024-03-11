<form wire:submit="update">
    <div class="mt-1">
        <label>Tujuan Pembelajaran</label>
        <input type="text" class="form-control" wire:model.live="title">
        @error('title')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>TP1</label>
        <input type="text" class="form-control" wire:model.live="tp_1"> 
        @error('tp_1')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>TP2</label>
        <input type="text" class="form-control" wire:model.live="tp_2"> 
        @error('tp_2')<p class="text-danger">{{ $message }}</p>@enderror
    </div>
    <div class="mt-1">
        <label>TP3</label>
        <input type="text" class="form-control" wire:model.live="tp_3" placeholder="boleh dikosongkan!"> 
    </div>
    <div class="mt-1">
        <label>TP4</label>
        <input type="text" class="form-control" wire:model.live="tp_4" placeholder="boleh dikosongkan!"> 
    </div>
    <div class="mt-1">
        <label>TP5</label>
        <input type="text" class="form-control" wire:model.live="tp_5" placeholder="boleh dikosongkan!"> 
    </div>
    <div class="mt-1">
        <label>TP6</label>
        <input type="text" class="form-control" wire:model.live="tp_6" placeholder="boleh dikosongkan!"> 
    </div>
    <div class="mt-1">
        <label>TP7</label>
        <input type="text" class="form-control" wire:model.live="tp_7" placeholder="boleh dikosongkan!"> 
    </div>
    <div class="mt-1">
        <label>TP8</label>
        <input type="text" class="form-control" wire:model.live="tp_8" placeholder="boleh dikosongkan!"> 
    </div>
    <div class="mt-1">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>