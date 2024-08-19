<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Classroom |' }}</x-slot>

    <x-slot name="style">
        <link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> Classroom </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Classroom </h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="notification_alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            @foreach ($semester_courses as $semester_course)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-info-lighten text-info rounded">
                                            <i class="mdi mdi-page-layout-header font-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="{{ url('admin-panel/dashboard/classroom', $semester_course->id) }}" class="font-16 fw-bold text-secondary">{{ $semester_course->course->name ?? "" }}</a>
                                    <p class="text-muted mb-0">{{ $semester_course->semester->name ?? "" }}</p>
                                </div>
                            </div>

                            <span class="badge badge-lg bg-light text-secondary rounded-pill me-1">Running</span>

                            <div class="row mt-2">
                                <div class="col-6">
                                    <p class="text-muted fw-semibold mb-1">Total Class</p>
                                    <h3 class="my-0 text-muted fw-normal">05</h3>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="text-muted fw-semibold mb-1">Assign to</p>
                                    <div class="multi-user">
                                        <a href="javascript:void(0);" class="d-inline-block">
                                            <img src="{{ asset('assets/images/avator.png') }}" class="rounded-circle avatar-xs" alt="friend">
                                        </a>

                                        <a href="javascript:void(0);" class="d-inline-block">
                                            <img src="{{ asset('assets/images/avator.png') }}" class="rounded-circle avatar-xs" alt="friend">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
