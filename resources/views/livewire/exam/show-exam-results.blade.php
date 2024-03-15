@section('title', 'Hasil Ujian '.Request::segment(3))

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    @include('components.tables.exam-results-show')
                </div>
            </div>
        </div>
    </div>
    @include('components.buttons.btn-paginate')
</div>