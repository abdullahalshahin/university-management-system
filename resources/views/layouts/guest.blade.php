<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $page_title ?? '' }} {{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

        <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/custom.style.css') }}" rel="stylesheet" type="text/css" />

        {{ $style ?? '' }}
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark py-lg-2 navbar-dark">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand me-lg-5">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo-dark" height="22" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto align-items-center">
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="{{ url('faqs') }}">FAQs</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item me-0">
                            @if (Auth::guard('student')->check())
                                <a href="{{ url('student-panel/dashboard') }}" class="nav-link d-lg-none"> Dashboard </a>
                                <a href="{{ url('student-panel/dashboard') }}" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                                    <i class="mdi mdi-basket me-2"></i> Dashboard
                                </a>
                            @else
                                <a href="{{ url('student-panel/login') }}" class="nav-link d-lg-none">Log in</a>
                                <a href="{{ url('student-panel/login') }}" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                                    <i class="mdi mdi-basket me-2"></i> Log in
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- =============================================== --}}
        {{ $slot }}
        {{-- =============================================== --}}

        <footer class="bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="assets/images/logo.png" alt="logo" class="logo-dark" height="22" />

                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-lg-2 col-md-4 mt-3 mt-lg-0">
                        <h5 class="text-light">Company</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">About Us</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Documentation</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Blog</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Affiliate Program</a></li>
                        </ul>

                    </div>

                    <div class="col-lg-2 col-md-4 mt-3 mt-lg-0">
                        <h5 class="text-light">Apps</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Ecommerce Pages</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Email</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Social Feed</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Projects</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Tasks Management</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-4 mt-3 mt-lg-0">
                        <h5 class="text-light">Discover</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Help Center</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Our Products</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-light text-opacity-50">Privacy</a></li>
                            @if (Auth::guard()->check())
                                <li class="mt-2"><a href="{{ url('admin-panel/dashboard') }}" class="text-light text-opacity-50">Dashboard</a></li>
                            @else
                                <li class="mt-2"><a href="{{ url('login') }}" class="text-light text-opacity-50">Log in</a></li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-3">
                            <p class="text-light text-opacity-50 mt-4 text-center mb-0">© <script>document.write(new Date().getFullYear())</script>-  EUB - eub.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- script section -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        
        {{ $script ?? '' }}

        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    </body>
</html>
