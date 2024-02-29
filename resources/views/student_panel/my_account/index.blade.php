<x-student-layout>
    <x-slot name="page_title">{{ $page_title ?? 'My Account |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('student-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> My Account </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> My Account </h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="notification_alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-body">
                        @if ($student->profile_image)
                            <img src="{{ url('images/students', $student->profile_image) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile_image" />
                        @else
                            <img src="{{ asset('assets/images/avator.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile_image" />
                        @endif

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="text-start mt-3">
                                    <p class="text-muted mb-2 font-13"><strong>Department :</strong> <span class="ms-2"> {{ $student->department->name ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Registration Number :</strong> <span class="ms-2"> {{ $student->registration_number ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Name :</strong> <span class="ms-2"> {{ $student->full_name ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Date Of Birth :</strong> <span class="ms-2"> {{ $student->date_of_birth ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Gender :</strong> <span class="ms-2"> {{ $student->gender ?? "" }} </span></p>
                                
                                    <p class="text-muted mb-2 font-13"><strong>Mobile Number :</strong> <span class="ms-2"> {{ $student->mobile_number ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2"> {{ $student->email ?? "" }} </span></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="text-start mt-3">
                                    <p class="text-muted mb-2 font-13"><strong>Guardian Name :</strong> <span class="ms-2"> {{ $student->guardian_name ?? "" }} </span></p>
                                    
                                    <p class="text-muted mb-2 font-13"><strong>Guardian Mobile :</strong> <span class="ms-2"> {{ $student->guardian_mobile ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Biography :</strong> <span class="ms-2"> {{ $student->biography ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Address :</strong> <span class="ms-2"> {{ $student->address ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Status :</strong>
                                        <span class="ms-2">
                                            @if ($student->status == "active")
                                                <span class="badge badge-success-lighten"> Active </span>
                                            @elseif ($student->status == "inactive")
                                                <span class="badge badge-warning-lighten"> Inactive </span>
                                            @elseif ($student->status == "blocked")
                                                <span class="badge badge-danger-lighten"> Blocked </span>
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="float-end">
                            <a href="{{ url('student-panel/dashboard/my-account-edit') }}" class="btn btn-success button-last"> Edit </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>
