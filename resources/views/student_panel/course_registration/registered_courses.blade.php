<x-student-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Dashboard |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"> Registered Semesters </h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="notification_alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            @foreach ($registered_semesters as $registered_semester)
                <div class="col-md-6 col-xxl-3">
                    <div class="card d-block">
                        <div class="card-body">
                            <h4 class="mt-0">
                                <a href="apps-projects-details.html" class="text-title">{{ $registered_semester->name ?? "" }}</a>
                            </h4>
                            <div class="badge bg-success">Registered</div>

                            <p class="text-muted font-13 my-3">With supporting text below as a natural lead-in to additional contenposuere erat a ante...<a href="javascript:void(0);" class="fw-bold text-muted">view more</a>
                            </p>

                            <p class="mb-1">
                                <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                    <b>{{ $registered_semester->open_date ?? "" }} - {{ $registered_semester->closed_date ?? "" }}</b>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="card mb-0 h-100">
                    <div class="card-body">
                        <div class="border-dashed border-2 border h-100 w-100 rounded d-flex align-items-center justify-content-center">
                            <a href="{{ url('student-panel/dashboard/new-registration') }}" class="text-center text-muted p-2">
                                <i class="mdi mdi-plus h3 my-0"></i> <h4 class="font-16 mt-1 mb-0 d-block">New Semester</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>
