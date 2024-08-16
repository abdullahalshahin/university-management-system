<x-student-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Dashboard |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title"> Available Semesters </h4>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($semesters as $semester)
                <div class="col-xxl-4 col-md-6">
                    <div class="card ribbon-box">
                        <div class="card-body">
                            <div class="ribbon ribbon-primary float-start"><i class="mdi mdi-access-point me-1"></i> Ongoing</div>
                            <h5 class="text-primary float-end mt-0">{{ $semester->name ?? "" }} <br> {{ $semester->open_date ?? "" }} - {{ $semester->closed_date ?? "" }}</h5>
                            <div class="ribbon-content">
                                <table class="table table-sm table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Course</th>
                                            <th>Credit</th>
                                            <th>Teacher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($semester->semester_courses as $semester_course)
                                            <tr>
                                                <td>{{ $semester_course->course->name ?? "" }} ({{ $semester_course->course->code ?? "" }})</td>
                                                <td>{{ $semester_course->course->credits ?? "" }}</td>
                                                <td>{{ $semester_course->teacher->name ?? "" }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="float-end mt-2">
                                <a href="{{ url('student-panel/dashboard/new-registration-store', $semester->id) }}" class="btn btn-success button-last"> Apply </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-student-layout>
