<x-student-layout>
    <x-slot name="page_title">{{ $page_title ?? 'My Account Edit |' }}</x-slot>

    <x-slot name="style">
        <link href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('student-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> My Account Edit </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> My Account Edit </h4>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input. <br><br>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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

                        <p><strong>RG No:</strong> {{ $student->registration_number ?? "" }}</p>

                        <div class="row mb-2">
                            <div class="text-start mt-3">
                                <form action="{{ url('student-panel/dashboard/my-account-update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="full_name"> Name <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $student->full_name ?? "") }}" placeholder="" required>
                                        </div>

                                        <div class="mb-2 col-md-3">
                                            <label for="gender"> Gender </label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option value="" selected disabled> Choose Gender </option>
                                                <option value="Male" {{ (old('gender') ?? ($student->gender ?? "")) == "Male" ? 'selected' : "" }}> Male </option>
                                                <option value="Female" {{ (old('gender') ?? ($student->gender ?? "")) == "Female" ? 'selected' : "" }}> Female </option>
                                                <option value="Others" {{ (old('gender') ?? ($student->gender ?? "")) == "Others" ? 'selected' : "" }}> Others </option>
                                            </select>
                                        </div>
                                    
                                        <div class="mb-2 col-md-3">
                                            <label> Date Of Birth </label>
                                            <input type="text" id="basic-datepicker" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth ?? "") }}" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="mobile_number"> Mobile Number </label>
                                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $student->mobile_number ?? "") }}" placeholder="" readonly>
                                        </div>
                                    
                                        <div class="mb-2 col-md-6">
                                            <label for="email"> Email </label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email ?? "") }}" placeholder="" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="password"> Password <span class="text-danger">*</span> </label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" name="password" value="{{ old('password', $student->security ?? "") }}" class="form-control" placeholder="" required>
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="mb-2 col-md-6">
                                            <label for="password_confirmation"> Confirm Password <span class="text-danger">*</span> </label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation', $student->security ?? "") }}" class="form-control" placeholder="" required>
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="guardian_name"> Guardian Name </label>
                                            <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ old('guardian_name', $student->guardian_name ?? "") }}" placeholder="">
                                        </div>

                                        <div class="mb-2 col-md-6">
                                            <label for="guardian_mobile"> Guardian Mobile </label>
                                            <input type="text" class="form-control" id="guardian_mobile" name="guardian_mobile" value="{{ old('guardian_mobile', $student->guardian_mobile ?? "") }}" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2">
                                        <div class="mb-2 col-md-12">
                                            <label for="address"> Address <span class="text-danger">*</span> </label>
                                            <textarea class="form-control" id="address" name="address" rows="5" required>{{ old('address', $student->address ?? "") }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="mb-2 col-md-12">
                                            <label for="biography"> Biography </label>
                                            <input type="text" class="form-control" id="biography" name="biography" value="{{ old('biography', $student->biography ?? "") }}" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="profile_image"> Profile Image </label>
                                            <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/gif, image/jpeg">
                                        </div>
                                    </div>
                                    
                                    <div class="float-end">
                                        <a href="{{ url('student-panel/dashboard/my-account') }}" class="btn btn-primary"> Go Back </a>
                                        <button type="submit" class="btn btn-success"> Save </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <x-slot name="script">
        <script src="{{ asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/demo.timepicker.js') }}"></script>
    </x-slot>
</x-student-layout>
