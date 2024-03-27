<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Registration | {{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

        <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="authentication-bg position-relative">
        <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
            <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
                <g fill-opacity='0.22'>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100'/>
                </g>
            </svg>
        </div>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-lg-8">
                        <div class="card">
                            <div class="card-header py-2 text-center bg-dark">
                                <a href="{{ url('/') }}">
                                    <span>
                                        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="60"> --}}
                                        <h2>{{ config('app.name') }}</h2>
                                    </span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Free Sign Up</h4>
                                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>
                                </div>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ url('student-panel/registration') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row g-2">
                                        <div class="row g-1">
                                            <div class="col-md-12">
                                                <label for="department_id"> Choose your department <span class="text-danger">*</span></label>
                                                <select id="department_id" name="department_id" class="form-select" required>
                                                    <option value="" selected disabled> Choose Department </option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}" {{ (old('department_id') ?? "") == $department->id ? 'selected' : '' }}>
                                                            {{ $department->name ?? "" }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12">
                                                <label for="full_name"> Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your name" required>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-6">
                                                <label for="mobile_number"> Mobile Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="email"> Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-6">
                                                <label for="password"> Password <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="" required>
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <label for="password_confirmation"> Confirm Password <span class="text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="" required>
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-6">
                                                <label for="guardian_name"> Guardian Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}" placeholder="" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="guardian_mobile"> Guardian Mobile <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="guardian_mobile" name="guardian_mobile" value="{{ old('guardian_mobile') }}" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12">
                                                <label for="address"> Address <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="address" name="address" rows="5" required>{{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2 text-center">
                                        <button class="btn btn-primary" type="submit"> Sign Up </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-danger">Already have account? <a href="{{ url('student-panel/login') }}" class="text-danger ms-1"><b>Sign In</b></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-alt">
            © <script>document.write(new Date().getFullYear())</script> EUB - eub.com
        </footer>

        <!-- script section -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/demo.timepicker.js') }}"></script>
    </body>
</html>
