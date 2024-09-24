<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $page_title ?? '' }} {{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public_assets/img/logo/favicon.png') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/custom-animation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/nice-select.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/flaticon_xoft.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/swiper-bundle.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/meanmenu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/font-awesome-pro.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/spacing.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_assets/css/main.css') }}">

        {{ $style ?? '' }}
    </head>
    <body>
        <button class="scroll-top scroll-to-target" data-target="html"><i class="far fa-angle-double-up"></i></button>
        
        <div class="it-offcanvas-area">
            <div class="itoffcanvas">
                <div class="it-offcanva-bottom-shape d-none d-xxl-block"></div>
                
                <div class="itoffcanvas__close-btn"><button class="close-btn"><i class="fal fa-times"></i></button></div>

                <div class="itoffcanvas__logo"><a href="index.html"><img src="assets/img/logo/logo-white.png" alt></a></div>

                <div class="itoffcanvas__text">
                    <p>Suspendisse interdum consectetur libero id. Fermentum leo vel orci porta non. Euismod viverra nibh cras pulvinar suspen.</p>
                </div>

                <div class="it-menu-mobile"></div>

                <div class="itoffcanvas__info">
                    <h3 class="offcanva-title">Get In Touch</h3>
                    <div class="it-info-wrapper mb-20 d-flex align-items-center">
                        <div class="itoffcanvas__info-icon"><a href="#"><i class="fal fa-envelope"></i></a></div>
                        <div class="itoffcanvas__info-address"><span>Email</span><a href="maito:hello@yourmail.com"><span class="__cf_email__" data-cfemail="c8a0ada4a4a788b1a7bdbaa5a9a1a4e6aba7a5">[email&#160;protected]</span></a></div>
                    </div>

                    <div class="it-info-wrapper mb-20 d-flex align-items-center">
                        <div class="itoffcanvas__info-icon"><a href="#"><i class="fal fa-phone-alt"></i></a></div>
                        <div class="itoffcanvas__info-address"><span>Phone</span><a href="tel:(00)45611227890">(00) 456 1122 7890</a></div>
                    </div>

                    <div class="it-info-wrapper mb-20 d-flex align-items-center">
                        <div class="itoffcanvas__info-icon"><a href="#"><i class="fas fa-map-marker-alt"></i></a></div>
                        <div class="itoffcanvas__info-address"><span>Location</span><a href="htits://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Riverside 255, San Francisco, USA </a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-overlay"></div>

        <header class="it-header-height">
            <div id="header-sticky" class="it-header-5-area it-header-1-style it-header-2-style">
                <div class="container">
                    <div class="it-header-wrap p-relative">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-6">
                                <div class="it-header-5-logo"><a href="index.html"><img src="assets/img/logo/logo-blue.png" alt></a></div>
                            </div>

                            <div class="col-xl-7 d-none d-xl-block">
                                <div class="it-header-2-main-menu">
                                    <nav class="it-menu-content">
                                        <ul>
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li class="has-dropdown"><a href="#">Faculty Members</a>
                                                <ul class="it-submenu submenu">
                                                    @foreach ($departments as $department)
                                                        <li><a href="{{ url('department/' . $department->id . '/teachers') }}">{{ $department->name ?? "" }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-xl-3 col-6">
                                <div class="it-header-2-right d-flex align-items-center justify-content-end">
                                    <div class="it-header-2-button d-none d-lg-block">
                                        @if (Auth::guard('student')->check())
                                            <a class="it-btn-white sky-bg" href="{{ url('student-panel/dashboard') }}">
                                                <span> 
                                                    Dashboard
                                                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        @else
                                            <a class="it-btn-white sky-bg" href="{{ url('student-panel/login') }}">
                                                <span> 
                                                    Login
                                                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        @endif
                                    </div>

                                    <div class="it-header-2-bar d-xl-none">
                                        <button class="it-menu-bar"><i class="fa-solid fa-bars"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            {{-- =============================================== --}}
            {{ $slot }}
            {{-- =============================================== --}}
        </main>

        <footer>
            <div class="it-footer-area it-footer-bg it-footer-style-5 black-bg pb-70" data-background="public_assets/img/footer/bg-1-1.jpg">
                <div class="it-footer-border">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="it-footer-top-info d-flex align-items-center it-footer-top-col-1">
                                    <div class="it-footer-top-icon"><span><i class="fa-light fa-location-dot"></i></span></div>
                                    <div class="it-footer-top-text"><span>Address:</span><a href="#">1925 Boggess Street</a></div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="it-footer-top-info d-flex align-items-center it-footer-top-col-2">
                                    <div class="it-footer-top-icon"><span><i class="fa-light fa-phone phone"></i></span></div>
                                    <div class="it-footer-top-text"><span>Phone:</span><a href="tel:00875784568">(00) 875 784 568</a></div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="it-footer-top-info d-flex align-items-center justify-content-md-end border-none it-footer-top-col-3">
                                    <div class="it-footer-top-icon"><span><i class="fa-light fa-envelope"></i></span></div>
                                    <div class="it-footer-top-text"><span>Email:</span><a href="/cdn-cgi/l/email-protection#442d2a222b042329252d286a272b29"><span class="__cf_email__" data-cfemail="f1989f979eb1969c90989ddf929e9c">[email&#160;protected]</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="it-footer-wrap pt-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-50">
                                <div class="it-footer-widget footer-col-5">
                                    <div class="it-footer-logo pb-25"><a href="index-html"><img src="public_assets/img/logo/logo-1.png" alt></a></div>
                                    <div class="it-footer-text pb-5">
                                        <p>Interdum velit laoreet id donec ultrices <br> tincidunt arcu. Tincidunt tortor aliqua <br> mfacilisi cras fermentum odio eu.</p>
                                    </div>
                                    <div class="it-footer-social"><a href="#"><i class="fa-brands fa-facebook-f"></i></a><a href="#"><i class="fa-brands fa-instagram"></i></a><a href="#"><i class="fa-brands fa-pinterest-p"></i></a><a href="#"><i class="fa-brands fa-twitter"></i></a></div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 mb-50">
                                <div class="it-footer-widget footer-col-6">
                                    <h4 class="it-footer-title">our services:</h4>
                                    <div class="it-footer-list">
                                        <ul>
                                            <li><a href="#"><i class="fa-regular fa-angle-right"></i>Web development</a></li>
                                            <li><a href="#"><i class="fa-regular fa-angle-right"></i>UI/UX Design</a></li>
                                            <li><a href="#"><i class="fa-regular fa-angle-right"></i>Management</a></li>
                                            <li><a href="#"><i class="fa-regular fa-angle-right"></i>Digital Marketing</a></li>
                                            <li><a href="#"><i class="fa-regular fa-angle-right"></i>Blog News</a></li>

                                            @if (Auth::guard()->check())
                                                <li><a href="{{ url('admin-panel/dashboard') }}"><i class="fa-regular fa-angle-right"></i>Dashboard</a></li>
                                            @else
                                                <li><a href="{{ url('login') }}"><i class="fa-regular fa-angle-right"></i>Log in</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-50">
                                <div class="it-footer-widget footer-col-4">
                                    <h4 class="it-footer-title">Gallery</h4>
                                    <div class="it-footer-gallery-box">
                                        <div class="row gx-5">
                                            <div class="col-md-4 col-4">
                                                <div class="it-footer-thumb mb-10"><img src="public_assets/img/footer/thumb-1-1.png" alt></div>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <div class="it-footer-thumb mb-10"><img src="public_assets/img/footer/thumb-1-2.png" alt></div>
                                            </div>
                                            <div class="col-md-4 col-4 mb-10">
                                                <div class="it-footer-thumb"><img src="public_assets/img/footer/thumb-1-3.png" alt></div>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <div class="it-footer-thumb"><img src="public_assets/img/footer/thumb-1-4.png" alt></div>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <div class="it-footer-thumb"><img src="public_assets/img/footer/thumb-1-5.png" alt></div>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <div class="it-footer-thumb"><img src="public_assets/img/footer/thumb-1-6.png" alt></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8 mb-50">
                                <div class="it-footer-widget footer-col-8">
                                    <h4 class="it-footer-title">Subscribe</h4>
                                    <div class="it-footer-input-box p-relative"><input class="mb-20" type="email" placeholder="Enter your email:"><button class="it-btn-white sky-bg"><span>SUBSCRIBE NOW</span></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="it-copyright-area it-copyright-height">
                <div class="container">
                    <div class="row">
                        <div class="col-12 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                            <div class="it-copyright-text text-center">
                                <p>Copyright © <script>document.write(new Date().getFullYear())</script> <a href="https://eub.edu.bd">EUB </a> || All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- script section -->
        <script src="{{ asset('public_assets/js/waypoints.js') }}"></script>
        <script src="{{ asset('public_assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public_assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('public_assets/js/magnific-popup.js') }}"></script>
        <script src="{{ asset('public_assets/js/purecounter.js') }}"></script>
        <script src="{{ asset('public_assets/js/wow.js') }}"></script>
        <script src="{{ asset('public_assets/js/countdown.js') }}"></script>
        <script src="{{ asset('public_assets/js/nice-select.js') }}"></script>
        <script src="{{ asset('public_assets/js/swiper-bundle.js') }}"></script>
        <script src="{{ asset('public_assets/js/isotope-pkgd.js') }}"></script>
        <script src="{{ asset('public_assets/js/imagesloaded-pkgd.js') }}"></script>
        <script src="{{ asset('public_assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('public_assets/js/main.js') }}"></script>

        {{-- {{ $script ?? '' }} --}}
    </body>
</html>
