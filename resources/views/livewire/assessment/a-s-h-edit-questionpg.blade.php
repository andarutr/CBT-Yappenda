@section('title', 'Edit Soal')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <a href="{{ url($redirect_url) }}" class="btn btn-success mb-3">Kembali</a>
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title">Soal PG</h4>
                    </div><!--end card-header-->
                    <div class="card-body"> 
                        <form wire:submit="store_pg">
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                            <div class="col-lg-9 col-xl-8">
                                <textarea class="form-control border border-3 rounded-3" type="text" wire:model="pgquestion"></textarea>
                            </div>
                        </div>
                        @foreach($jsonData as $key => $value)
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">{{ $key }}</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control border border-3 rounded-3" type="text" value="{{ $value }}">
                            </div>
                        </div>
                        @endforeach     
                        <div class="form-group mb-3 row">
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
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div> 
                        </form>  
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->   
            <div class="col-lg-4">
                
            </div>                                      
        </div><!--end row-->
    </div>
    <livewire:partials.footer />             
</div>
