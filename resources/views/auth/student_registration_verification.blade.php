<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Verification | {{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

        <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        {{ $style ?? '' }}
    </head>
    <body class="authentication-bg position-relative">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <div class="card-header py-3 text-center bg-dark">
                                <a href="{{ url('/') }}">
                                    <span>
                                        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="30"> --}}
                                        <h2>{{ config('app.name') }}</h2>
                                    </span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Verification</h4>
                                    <p class="text-muted mb-4">OTP Code sent your mobile number: {{ $student['email'] ?? "" }}</p>
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

                                @if ($error = Session::get('error'))
                                    <div class="alert alert-danger" id="notification_alert">
                                        <p>{{ $error }}</p>
                                    </div>
                                @endif

                                <form action="{{ url('student-panel/registration-verification') }}" method="POST">
                                    @csrf

                                    @foreach ($student as $key => $value)
                                        <input type="hidden" name="student[{{ $key }}]" value="{{ $value }}">
                                    @endforeach

                                    <div class="mb-3">
                                        <label for="otp_code" class="form-label">OTP Code</label>
                                        <input class="form-control" type="number" id="otp_code" name="otp_code" value="{{ old('otp_code') }}" placeholder="Enter Otp Code" required>
                                    </div>

                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Verification & Log In </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-danger">Don't have an account? <a href="{{ url('student-panel/registration') }}" class="text-danger ms-1"><b>Sign Up</b></a></p>
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
    </body>
</html>
