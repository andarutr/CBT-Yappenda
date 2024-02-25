@section('title','Dashboard')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-lg-9">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">Sessions</p>
                                        <h3 class="my-1 font-20 fw-bold">24k</h3>
                                        <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span> New Sessions Today</p>
                                    </div><!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                            <i class="ti ti-users font-24 align-self-center text-muted"></i>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col--> 
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">                                                
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">Avg.Sessions</p>
                                        <h3 class="my-1 font-20 fw-bold">00:18</h3>
                                        <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Weekly Avg.Sessions</p>
                                    </div><!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                            <i class="ti ti-clock font-24 align-self-center text-muted"></i>
                                        </div>
                                    </div> <!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col--> 
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">                                                
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">Bounce Rate</p>
                                        <h3 class="my-1 font-20 fw-bold">$2400</h3>
                                        <p class="mb-0 text-truncate text-muted"><span class="text-danger"><i class="mdi mdi-trending-down"></i>35%</span> Bounce Rate Weekly</p>
                                    </div><!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                            <i class="ti ti-activity font-24 align-self-center text-muted"></i>
                                        </div>
                                    </div> <!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col--> 
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">  
                                        <p class="text-dark mb-0 fw-semibold">Goal Completions</p>                                         
                                        <h3 class="my-1 font-20 fw-bold">85000</h3>
                                        <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Completions Weekly</p>
                                    </div><!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                            <i class="ti ti-confetti font-24 align-self-center text-muted"></i>
                                        </div>
                                    </div><!--end col--> 
                                </div><!--end row-->
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col-->                               
                </div><!--end row-->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Audience Overview</h4>                      
                            </div><!--end col-->
                            <div class="col-auto"> 
                                <div class="dropdown">
                                    <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    This Year<i class="las la-angle-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>               
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="">
                            <div id="ana_dash_1" class="apex-charts"></div>
                        </div> 
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div><!--end col-->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Sessions Device</h4>                      
                            </div><!--end col-->
                            <div class="col-auto"> 
                                <div class="dropdown">
                                    <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    All<i class="las la-angle-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Purchases</a>
                                        <a class="dropdown-item" href="#">Emails</a>
                                    </div>
                                </div>         
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="text-center">
                            <div id="ana_device" class="apex-charts"></div>
                            <h6 class="bg-light-alt py-3 px-2 mb-0">
                                <i data-feather="calendar" class="align-self-center icon-xs me-1"></i>
                                01 January 2020 to 31 December 2020
                            </h6>
                        </div>  
                        <div class="table-responsive mt-2">
                            <table class="table border-dashed mb-0">
                                <thead>
                                <tr>
                                    <th>Device</th>
                                    <th class="text-end">Sassions</th>
                                    <th class="text-end">Day</th>
                                    <th class="text-end">Week</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Dasktops</td>
                                    <td class="text-end">1843</td>
                                    <td class="text-end">-3</td>
                                    <td class="text-end">-12</td>
                                </tr>
                                <tr>
                                    <td>Tablets</td>
                                    <td class="text-end">2543</td>
                                    <td class="text-end">-5</td>
                                    <td class="text-end">-2</td>                                                 
                                </tr>
                                <tr>
                                    <td>Mobiles</td>
                                    <td class="text-end">3654</td>
                                    <td class="text-end">-5</td>
                                    <td class="text-end">-6</td>
                                </tr>
                                
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /div-->                                 
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col--> 
        </div>
    </div><!-- container -->

    <livewire:partials.footer />             
</div>
