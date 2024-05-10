<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Dashboard |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"> Dashboard </h4>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-xl-5 col-lg-6">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Students">Students</h5>
                                <h3 class="mt-3 mb-3">36,254</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                    <span class="text-nowrap">Since last month</span>  
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Teachers">Teachers</h5>
                                <h3 class="mt-3 mb-3">5,543</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-currency-usd widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Average Departments">Departments</h5>
                                <h3 class="mt-3 mb-3">$6,254</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-pulse widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Growth">Growth</h5>
                                <h3 class="mt-3 mb-3">+ 30.56%</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end col -->

            <div class="col-xl-7 col-lg-6">
                <div class="card card-h-100">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h4 class="header-title">Current Vs Previous</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div dir="ltr">
                            <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                        </div>
                            
                    </div> <!-- end card-body-->
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h4 class="header-title">Revenue</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="chart-content-bg">
                            <div class="row text-center">
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0 mt-3">Current Week</p>
                                    <h2 class="fw-normal mb-3">
                                        <small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                                        <span>58,254</span>
                                    </h2>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0 mt-3">Previous Week</p>
                                    <h2 class="fw-normal mb-3">
                                        <small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                        <span>69,524</span>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="dash-item-overlay d-none d-md-block" dir="ltr">
                            <h5>Today's: 2,562.30</h5>
                            <p class="text-muted font-13 mb-3 mt-2">Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
                                Etiam rhoncus...</p>
                            <a href="javascript: void(0);" class="btn btn-outline-primary">View Statements
                                <i class="mdi mdi-arrow-right ms-2"></i>
                            </a>
                        </div>
                        <div dir="ltr">
                            <div id="revenue-chart" class="apex-charts mt-3" data-colors="#727cf5,#0acf97"></div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h4 class="header-title">Revenue By Location</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="mb-4 mt-3">
                            <div id="world-map-markers" style="height: 217px"></div>
                        </div>

                        <h5 class="mb-1 mt-0 fw-normal">New York</h5>
                        <div class="progress-w-percent">
                            <span class="progress-value fw-bold">72k </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <h5 class="mb-1 mt-0 fw-normal">San Francisco</h5>
                        <div class="progress-w-percent">
                            <span class="progress-value fw-bold">39k </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <h5 class="mb-1 mt-0 fw-normal">Sydney</h5>
                        <div class="progress-w-percent">
                            <span class="progress-value fw-bold">25k </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <h5 class="mb-1 mt-0 fw-normal">Singapore</h5>
                        <div class="progress-w-percent mb-0">
                            <span class="progress-value fw-bold">61k </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
    </div>
</x-app-layout>
