@section('title', 'Mata Pelajaran')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            @foreach($lessons as $lesson)
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="blog-card">
                            <h4 class="my-3">
                                <a href="" class="">{{ $lesson->name }}</a>
                            </h4>
                            <hr class="hr-dashed">
                            <div class="d-flex justify-content-between">
                                <div class="meta-box">
                                    <div class="media">
                                        <img src="/assets/images/users/user.png" alt=""
                                            class="thumb-sm rounded-circle me-2">
                                        <div class="media-body align-self-center text-truncate">
                                            <h6 class="m-0 text-dark">Admin</h6>
                                            <ul class="p-0 list-inline mb-0">
                                                <li class="list-inline-item">{{ \Carbon\Carbon::parse($lesson->created_at)->format('F Y') }}</li>
                                            </ul>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                </div>
                                <!--end meta-box-->
                                <div class="align-self-center">
                                    <a href="#" class="text-dark">Read more <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--end blog-card-->

                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            @endforeach
        </div>
    </div>
    <livewire:partials.footer />
</div>