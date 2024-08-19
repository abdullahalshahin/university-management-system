<x-student-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Class Room |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('student-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> Class Room </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Class Room </h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="notification_alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-xxl-8 col-lg-6">
                <div class="card d-block">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="mt-0">{{ $semester_course->course->name ?? "" }}</h3>
                        </div>
                        <div class="badge bg-secondary text-light mb-3">Ongoing</div>

                        <h5>Project Overview:</h5>

                        <p class="text-muted mb-2">{{ $semester_course->course->description ?? "" }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 mb-3">Class</h4>

                        @foreach ($semester_course->semester_course_classes as $semester_course_class)
                            <div class="d-flex align-items-start mt-2">
                                <div class="w-100 overflow-hidden">
                                    <h5 class="mt-0">{{ $semester_course->teacher->name ?? "" }}</h5>
                                    
                                    {!! $semester_course_class->description ?? '' !!}
                                </div>
                            </div>

                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Files</h5>

                        <div class="card mb-1 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded">
                                                .ZIP
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col ps-0">
                                        <a href="javascript:void(0);" class="text-muted fw-bold">admin-design.zip</a>
                                        <p class="mb-0">2.3 MB</p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                            <i class="ri-download-2-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-secondary text-light rounded">
                                                .MP4
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col ps-0">
                                        <a href="javascript:void(0);" class="text-muted fw-bold">Admin-bug-report.mp4</a>
                                        <p class="mb-0">7.05 MB</p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                            <i class="ri-download-2-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>
