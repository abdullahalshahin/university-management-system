<x-guest-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Home |' }}</x-slot>

    {{-- <div class="it-slider-area fix">
        <div class="it-slider-wrap p-relative">
            <div class="it-slider-active">
                <div class="it-slider-bg it-slider-overlay d-flex align-items-center it-slider-height p-relative" data-background="public_assets/img/slider/slider-1.jpg">
                    <div class="it-slider-shape-1 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-2.png" alt></div>
                    <div class="it-slider-shape-2 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-1.png" alt></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="it-hero-2-content z-index-5">
                                    <h1 class="it-hero-2-title">Page welcome to Horeb private University</h1>
                                    <div class="it-hero-2-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="it-hero-2-btn-box d-flex align-items-center"><a class="it-btn-white sky-bg mr-30" href="course-details.html"><span> Explore all Courses <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></span></a>
                                    <div class="it-hero-2-play"><a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i class="fas fa-play"></i></a><span>Watch Now</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-slider-bg it-slider-overlay d-flex align-items-center it-slider-height p-relative" data-background="public_assets/img/slider/slider-2.jpg">
                    <div class="it-slider-shape-1 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-2.png" alt></div>
                    <div class="it-slider-shape-2 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-1.png" alt></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="it-hero-2-content z-index-5">
                                    <h1 class="it-hero-2-title">Page welcome to Horeb private University</h1>
                                    <div class="it-hero-2-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="it-hero-2-btn-box d-flex align-items-center"><a class="it-btn-white sky-bg mr-30" href="course-details.html"><span> Explore all Courses <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></span></a>
                                    <div class="it-hero-2-play"><a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i class="fas fa-play"></i></a><span>Watch Now</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-slider-bg it-slider-overlay d-flex align-items-center it-slider-height p-relative" data-background="public_assets/img/slider/slider-3.jpg">
                    <div class="it-slider-shape-1 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-2.png" alt></div>
                    <div class="it-slider-shape-2 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-1.png" alt></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="it-hero-2-content z-index-5">
                                    <h1 class="it-hero-2-title">Page welcome to Horeb private University</h1>
                                    <div class="it-hero-2-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="it-hero-2-btn-box d-flex align-items-center"><a class="it-btn-white sky-bg mr-30" href="course-details.html"><span> Explore all Courses <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></span></a>
                                    <div class="it-hero-2-play"><a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i class="fas fa-play"></i></a><span>Watch Now</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-slider-bg it-slider-overlay d-flex align-items-center it-slider-height p-relative" data-background="public_assets/img/slider/slider-1.jpg">
                    <div class="it-slider-shape-1 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-2.png" alt></div>
                    <div class="it-slider-shape-2 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-1.png" alt></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="it-hero-2-content z-index-5">
                                    <h1 class="it-hero-2-title">Page welcome to Horeb private University</h1>
                                    <div class="it-hero-2-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="it-hero-2-btn-box d-flex align-items-center"><a class="it-btn-white sky-bg mr-30" href="course-details.html"><span> Explore all Courses <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></span></a>
                                    <div class="it-hero-2-play"><a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i class="fas fa-play"></i></a><span>Watch Now</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-slider-bg it-slider-overlay d-flex align-items-center it-slider-height p-relative" data-background="public_assets/img/slider/slider-2.jpg">
                    <div class="it-slider-shape-1 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-2.png" alt></div>
                    <div class="it-slider-shape-2 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-1.png" alt></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="it-hero-2-content z-index-5">
                                    <h1 class="it-hero-2-title">Page welcome to Horeb private University</h1>
                                    <div class="it-hero-2-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="it-hero-2-btn-box d-flex align-items-center"><a class="it-btn-white sky-bg mr-30" href="course-details.html"><span> Explore all Courses <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></span></a>
                                    <div class="it-hero-2-play"><a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i class="fas fa-play"></i></a><span>Watch Now</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-slider-bg it-slider-overlay d-flex align-items-center it-slider-height p-relative" data-background="public_assets/img/slider/slider-3.jpg">
                    <div class="it-slider-shape-1 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-2.png" alt></div>
                    <div class="it-slider-shape-2 d-none d-xl-block"><img src="public_assets/img/slider/slider-shape-1.png" alt></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="it-hero-2-content z-index-5">
                                    <h1 class="it-hero-2-title">Page welcome to Horeb private University</h1>
                                    <div class="it-hero-2-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="it-hero-2-btn-box d-flex align-items-center"><a class="it-btn-white sky-bg mr-30" href="course-details.html"><span> Explore all Courses <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></span></a>
                                    <div class="it-hero-2-play"><a class="popup-video" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i class="fas fa-play"></i></a><span>Watch Now</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="it-slider-nav-wrap z-index-5">
                <div class="it-slider-nav-active d-none d-lg-block">
                    <div class="it-slider-nav-thumb"><img src="public_assets/img/slider/slider-1-sm.jpg" alt></div>
                    <div class="it-slider-nav-thumb"><img src="public_assets/img/slider/slider-2-sm.jpg" alt></div>
                    <div class="it-slider-nav-thumb"><img src="public_assets/img/slider/slider-3-sm.jpg" alt></div>
                    <div class="it-slider-nav-thumb"><img src="public_assets/img/slider/slider-1-sm.jpg" alt></div>
                    <div class="it-slider-nav-thumb"><img src="public_assets/img/slider/slider-2-sm.jpg" alt></div>
                    <div class="it-slider-nav-thumb"><img src="public_assets/img/slider/slider-3-sm.jpg" alt></div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="it-feature-area grey-bg it-feature-2-style pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="it-feature-item text-center">
                        <div class="it-feature-item-content z-index">
                            <div class="it-feature-icon"><span><i class="flaticon-class"></i></span></div>
                            <div class="it-feature-text pt-30">
                                <h4 class="it-feature-title">Education Services</h4>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labore et dolore</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="it-feature-item text-center">
                        <div class="it-feature-item-content z-index">
                            <div class="it-feature-icon"><span><i class="flaticon-bachelor"></i></span></div>
                            <div class="it-feature-text pt-30">
                                <h4 class="it-feature-title">EXPERT TEACHERS</h4>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labore et dolore</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="it-feature-item text-center">
                        <div class="it-feature-item-content z-index">
                            <div class="it-feature-icon"><span><i class="flaticon-study"></i></span></div>
                            <div class="it-feature-text pt-30">
                                <h4 class="it-feature-title">STRATEGI LOCATION</h4>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labore et dolore</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="it-about-2-area p-relative pt-120 pb-120">
        <div class="it-about-2-shape-2 d-none d-xxl-block"><img src="public_assets/img/about/shape-2-2.png" alt></div>
        <div class="it-about-2-big-text">
            <h6>ABUT US</h6>
        </div>
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-6 col-lg-6 order-1 order-lg-0">
                    <div class="it-about-2-thumb-wrap d-flex justify-content-between">
                        <div class="it-about-2-thumb p-relative mt-95"><img src="public_assets/img/about/thumb-2-1.jpg" alt>
                            <div class="it-about-2-shape-1 d-none d-xxl-block"><img src="public_assets/img/about/shape-2-1.png" alt></div>
                        </div>
                        <div class="it-about-2-thumb"><img src="public_assets/img/about/thumb-2-2.jpg" alt></div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 order-0 order-lg-1">
                    <div class="it-about-2-right">
                        <div class="it-about-2-title-box pb-25"><span class="it-section-subtitle-2">our about us</span>
                            <h4 class="it-section-title">We Are High School Since <br> 10 Years Experience </h4>
                        </div>
                        <div class="it-about-2-text pb-5">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut <br> enim ad minim veniam, quis nostrud exercitation.</p>
                        </div>
                        <div class="it-about-2-text-2 mb-30"><span>Standard dummy text ever since the unknown scramble make a type specimen book</span></div>
                        <div class="it-about-2-bottom d-flex justify-content-between align-items-end">
                            <div class="it-about-2-icon-wrap">
                                <div class="it-about-2-icon mb-25 d-flex align-items-center"><img src="public_assets/img/about/icon-1-1.png" alt><span>Flexible Classes</span></div>
                                <div class="it-about-2-icon mb-35 d-flex align-items-center"><img src="public_assets/img/about/icon-1-2.png" alt><span>Learn From Anywhere</span></div><a class="it-btn-white sky-bg" href="about-us.html"><span> More About Us <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg></span></a>
                            </div>
                            <div class="it-about-2-video p-relative">
                                <div class="it-about-2-thumb-sm"><img src="public_assets/img/about/thumb-sm.png" alt></div>
                                <div class="it-about-2-video-icon"><a class="popup-video play" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i class="fas fa-play"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="it-choose-area it-choose-style-2 z-index fix p-relative grey-bg pt-180 pb-110">
        <div class="it-choose-shape-5 d-none d-xl-block"><img src="public_assets/img/choose/shape-1-7.png" alt></div>
        <div class="it-choose-shape-6 d-none d-xl-block"><img src="public_assets/img/choose/shape-1-8.png" alt></div>
        <div class="it-choose-shape-7 d-none d-xl-block"><img src="public_assets/img/choose/shape-1-9.png" alt></div>
        <div class="it-choose-shape-8 d-none d-xl-block"><img src="public_assets/img/choose/shape-1-10.png" alt></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="it-choose-thumb-box text-center text-lg-end">
                        <div class="it-choose-thumb p-relative"><img src="public_assets/img/choose/choose-2-2.jpg" alt>
                            <div class="it-choose-shape-1"><img src="public_assets/img/choose/shape-1-5.png" alt></div>
                            <div class="it-choose-shape-2"><img src="public_assets/img/choose/shape-1-6.png" alt></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="it-choose-left">
                        <div class="it-choose-title-box mb-30"><span class="it-section-subtitle-2">WHY CHOOSE US</span>
                            <h4 class="it-section-title">Creating A Community Of Life Long Learners. </h4>
                        </div>
                        <div class="it-choose-content-box">
                            <div class="it-choose-content d-flex align-items-center mb-30">
                                <div class="it-choose-icon"><span><i class="flaticon-skill"></i></span></div>
                                <div class="it-choose-text">
                                    <h4 class="it-choose-title">Affordable Courses</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit eiusmod tempor incididunt ut labore.</p>
                                </div>
                            </div>
                            <div class="it-choose-content d-flex align-items-center mb-30">
                                <div class="it-choose-icon"><span><i class="flaticon-funds"></i></span></div>
                                <div class="it-choose-text">
                                    <h4 class="it-choose-title">Efficient & Flexible</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit eiusmod tempor incididunt ut labore.</p>
                                </div>
                            </div>
                            <div class="it-choose-content d-flex align-items-center">
                                <div class="it-choose-icon"><span><i class="flaticon-flexibility"></i></span></div>
                                <div class="it-choose-text">
                                    <h4 class="it-choose-title">Skilled Teachers</h4>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit eiusmod tempor incididunt ut labore.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="it-testimonial-5-area it-testimonial-style-2 p-relative pt-120 pb-120">
        <div class="it-testimonial-5-shape-5 d-none d-xl-block"><img src="public_assets/img/testimonial/shape-5-6.png" alt></div>
        <div class="it-testimonial-5-shape-6 d-none d-xl-block"><img src="public_assets/img/testimonial/shape-5-7.png" alt></div>
        <div class="it-testimonial-5-shape-7 d-none d-xl-block"><img src="public_assets/img/testimonial/shape-5-8.png" alt></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="it-testimonial-5-title-box text-center mb-60"><span class="it-section-subtitle-2">Testimonial</span>
                        <h4 class="it-section-title-5">Creating A Community Of <br> Life Long Learners.</h4>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="it-testimonial-5-wrapper p-relative">
                        <div class="swiper-container it-testimonial-5-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="it-testimonial-5-item p-relative z-index">
                                        <div class="it-testimonial-3-author-box d-flex align-items-center mb-20">
                                            <div class="it-testimonial-3-avata"><img src="public_assets/img/avatar/avatar-3-1.png" alt></div>
                                            <div class="it-testimonial-3-author-info">
                                                <h5>Jorge Carter</h5><span>Student</span>
                                            </div>
                                        </div>
                                        <div class="it-testimonial-5-content z-index-5">
                                            <div class="it-testimonial-5-star pb-10"><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i></div>
                                            <div class="it-testimonial-5-text">
                                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation”</p>
                                            </div>
                                        </div>
                                        <div class="it-testimonial-5-quote d-none d-xl-block"><img src="public_assets/img/testimonial/quote-1-2.png" alt></div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="it-testimonial-5-item p-relative z-index">
                                        <div class="it-testimonial-3-author-box d-flex align-items-center mb-20">
                                            <div class="it-testimonial-3-avata"><img src="public_assets/img/avatar/avatar-2.png" alt></div>
                                            <div class="it-testimonial-3-author-info">
                                                <h5>George McGruder</h5><span>Student</span>
                                            </div>
                                        </div>
                                        <div class="it-testimonial-5-content z-index-5">
                                            <div class="it-testimonial-5-star pb-10"><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i></div>
                                            <div class="it-testimonial-5-text">
                                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation”</p>
                                            </div>
                                        </div>
                                        <div class="it-testimonial-5-quote d-none d-xl-block"><img src="public_assets/img/testimonial/quote-1-2.png" alt></div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="it-testimonial-5-item p-relative z-index">
                                        <div class="it-testimonial-3-author-box d-flex align-items-center mb-20">
                                            <div class="it-testimonial-3-avata"><img src="public_assets/img/avatar/avatar-1.png" alt></div>
                                            <div class="it-testimonial-3-author-info">
                                                <h5>Georgia Griffith</h5><span>Student</span>
                                            </div>
                                        </div>
                                        <div class="it-testimonial-5-content z-index-5">
                                            <div class="it-testimonial-5-star pb-10"><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i></div>
                                            <div class="it-testimonial-5-text">
                                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation”</p>
                                            </div>
                                        </div>
                                        <div class="it-testimonial-5-quote d-none d-xl-block"><img src="public_assets/img/testimonial/quote-1-2.png" alt></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="it-video-area it-video-style-2 it-video-bg p-relative fix pt-100 pb-95" data-background="public_assets/img/video/bg-1-1.jpg">
        <div class="it-video-shape-1 d-none d-lg-block"><img src="public_assets/img/video/shape-1-6.png" alt></div>
        <div class="it-video-shape-2 d-none d-lg-block"><img src="public_assets/img/video/shape-1-2.png" alt></div>
        <div class="it-video-shape-3 d-none d-lg-block"><img src="public_assets/img/video/shape-1-7.png" alt></div>
        <div class="it-video-shape-4 d-none d-lg-block"><img src="public_assets/img/video/shape-1-4.png" alt></div>
        <div class="it-video-shape-5 d-none d-lg-block"><img src="public_assets/img/video/shape-1-5.png" alt></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                    <div class="it-video-content"><span>Join Our New Session</span>
                        <h3 class="it-video-title">Call To Enroll <br><a href="tel:+91958423452">(+91)958423452</a></h3>
                        <div class="it-video-button"><a class="it-btn blue-bg" href="contact.html"><span> Join With us <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></span></a></div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-3 col-sm-3">
                    <div class="it-video-play-wrap d-flex justify-content-start justify-content-md-end align-items-center">
                        <div class="it-video-play text-center"><a class="popup-video play" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i class="fas fa-play"></i></a><a class="text" href="#">watch now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="it-contact-area it-contact-style-2 it-contact-bg p-relative pt-120 pb-120" data-background="public_assets/img/contact/bg-1-2.jpg">
        <div class="it-contact-shape-1 d-none d-xxl-block"><img src="public_assets/img/contact/shape-1-1.png" alt></div>
        <div class="it-contact-shape-3 z-index-5 d-none d-xxl-block"><img src="public_assets/img/contact/shape-1-6.png" alt></div>
        <div class="it-contact-shape-4 d-none d-xxl-block"><img src="public_assets/img/contact/shape-1-4.png" alt></div>
        <div class="it-contact-shape-5 d-none d-xxl-block"><img src="public_assets/img/contact/shape-1-7.png" alt></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="it-contact-left">
                        <div class="it-contact-title-box pb-20"><span class="it-section-subtitle-2"> Contact With US </span>
                            <h2 class="it-section-title-3">Register Now Get Premium Online Admison</h2>
                        </div>
                        <div class="it-contact-text pb-15">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                        </div>
                        <div class="it-contact-timer-box mb-40" data-countdown data-date="Sep 30 2024 20:20:22">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                                    <div class="it-contact-timer text-center">
                                        <h6 data-days>00</h6><i>DAYS</i>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                                    <div class="it-contact-timer text-center">
                                        <h6 data-hours>00</h6><i>HOURS</i>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                                    <div class="it-contact-timer text-center">
                                        <h6 data-minutes>00</h6><i>MINUTES</i>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                                    <div class="it-contact-timer text-center">
                                        <h6 data-seconds>00</h6><i>SECONDS</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="it-contact-thumb-box"><img src="public_assets/img/contact/thumb-1-1.jpg" alt></div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="it-contact-wrap" data-background="public_assets/img/contact/bg-5.jpg">
                        <h4 class="it-contact-title text-black">Search for courses</h4>
                        <p class="pb-15">Suspendisse ultrice gravida dictum fusce <br> placerat ultricies integer</p>
                        <form action="#">
                            <div class="row">
                                <div class="col-12 mb-15">
                                    <div class="it-contact-input-box"><input type="text" placeholder="Your Name"></div>
                                </div>
                                <div class="col-12 mb-15">
                                    <div class="it-contact-input-box"><input type="email" placeholder="Your Email"></div>
                                </div>
                                <div class="col-md-6 col-12 mb-15">
                                    <div class="it-contact-select mb-30"><select>
                                            <option>Instructor</option>
                                            <option>01 Year</option>
                                            <option>02 Year</option>
                                            <option>03 Year</option>
                                            <option>04 Year</option>
                                            <option>05 Year</option>
                                        </select></div>
                                </div>
                                <div class="col-md-6 col-12 mb-15">
                                    <div class="it-contact-select mb-30"><select>
                                            <option>Department</option>
                                            <option>01 Year</option>
                                            <option>02 Year</option>
                                            <option>03 Year</option>
                                            <option>04 Year</option>
                                            <option>05 Year</option>
                                        </select></div>
                                </div>
                                <div class="col-md-6 col-12 mb-15">
                                    <div class="it-contact-select mb-30"><select>
                                            <option>Campus</option>
                                            <option>01 Year</option>
                                            <option>02 Year</option>
                                            <option>03 Year</option>
                                            <option>04 Year</option>
                                            <option>05 Year</option>
                                        </select></div>
                                </div>
                                <div class="col-md-6 col-12 mb-15">
                                    <div class="it-contact-select mb-30"><select>
                                            <option>Level</option>
                                            <option>01 Year</option>
                                            <option>02 Year</option>
                                            <option>03 Year</option>
                                            <option>04 Year</option>
                                            <option>05 Year</option>
                                        </select></div>
                                </div>
                            </div>
                        </form><button type="submit" class="it-btn black-bg"><span> submit now <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="it-event-2-area p-relative pt-90 pb-90">
        <div class="container">
            <div class="it-event-2-title-wrap mb-60">
                <div class="row align-items-end">
                    <div class="col-12">
                        <div class="it-event-2-title-box text-center"><span class="it-section-subtitle-2"> Our Events </span>
                            <h2 class="it-section-title-3">Upcoming Events</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="it-event-2-item-box">
                        <div class="it-event-2-item">
                            <div class="it-event-2-thumb fix"><a href="event-details.html"><img src="public_assets/img/event/event-1-1.jpg" alt></a>
                                <div class="it-event-2-date"><span><i>08</i><br> October</span></div>
                            </div>
                            <div class="it-event-2-content">
                                <h4 class="it-event-2-title"><a href="event-details.html">print, and publishing industries for previewing</a></h4>
                                <div class="it-event-2-text">
                                    <p class="mb-0 pb-10">Lorem ipsum dolor sit amet, consectetur elit, sed doeiusmod tempor </p>
                                </div>
                                <div class="it-event-2-meta"><span><i class="fa-light fa-clock"></i> Time: 11:00am 03;00pm </span><span><a href="#"><i class="fa-light fa-location-dot"></i></a> Location: USA </span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="it-event-2-item-box">
                        <div class="it-event-2-item">
                            <div class="it-event-2-thumb fix"><a href="event-details.html"><img src="public_assets/img/event/event-1-2.jpg" alt></a>
                                <div class="it-event-2-date"><span><i>05</i><br> October</span></div>
                            </div>
                            <div class="it-event-2-content">
                                <h4 class="it-event-2-title"><a href="event-details.html">print, and publishing industries for previewing</a></h4>
                                <div class="it-event-2-text">
                                    <p class="mb-0 pb-10">Lorem ipsum dolor sit amet, consectetur elit, sed doeiusmod tempor </p>
                                </div>
                                <div class="it-event-2-meta"><span><i class="fa-light fa-clock"></i> Time: 11:00am 03;00pm </span><span><a href="#"><i class="fa-light fa-location-dot"></i></a> Location: USA </span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="it-event-2-item-box">
                        <div class="it-event-2-item">
                            <div class="it-event-2-thumb fix"><a href="event-details.html"><img src="public_assets/img/event/event-1-3.jpg" alt></a>
                                <div class="it-event-2-date"><span><i>25</i><br> April</span></div>
                            </div>
                            <div class="it-event-2-content">
                                <h4 class="it-event-2-title"><a href="event-details.html">print, and publishing industries for previewing</a></h4>
                                <div class="it-event-2-text">
                                    <p class="mb-0 pb-10">Lorem ipsum dolor sit amet, consectetur elit, sed doeiusmod tempor </p>
                                </div>
                                <div class="it-event-2-meta"><span><i class="fa-light fa-clock"></i> Time: 11:00am 03;00pm </span><span><a href="#"><i class="fa-light fa-location-dot"></i></a> Location: USA </span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="it-faq-area p-relative pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="it-faq-thumb text-center text-lg-start"><img src="public_assets/img/faq/faq-2.jpg" alt></div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="it-faq-wrap">
                        <div class="it-faq-title-box mb-20"><span class="it-section-subtitle-2">faq</span>
                            <h4 class="it-section-title-5">Frequently asked some questions?</h4>
                        </div>
                        <div class="it-custom-accordion it-custom-accordion-style-2">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-items tp-faq-active">
                                    <h2 class="accordion-header" id="headingOne"><button class="accordion-buttons " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Why do students prefer online learning? </button></h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body d-flex align-items-center">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p><img class="d-none d-xl-block" src="public_assets/img/faq/thumb-2.jpg" alt>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-items">
                                    <h2 class="accordion-header" id="headingTwo"><button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Where should I study abroad? </button></h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body d-flex align-items-center">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p><img class="d-none d-xl-block" src="public_assets/img/faq/thumb-2.jpg" alt>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-items">
                                    <h2 class="accordion-header" id="headingThree"><button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> How can I contact a school directly? </button></h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body d-flex align-items-center">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p><img class="d-none d-xl-block" src="public_assets/img/faq/thumb-2.jpg" alt>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-items">
                                    <h2 class="accordion-header" id="headingFour"><button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> How do I find a school where I want to study? </button></h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body d-flex align-items-center">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p><img class="d-none d-xl-block" src="public_assets/img/faq/thumb-2.jpg" alt>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="it-blog-area it-blog-style-3 grey-bg pt-90 pb-90">
        <div class="container">
            <div class="it-blog-title-wrap mb-60">
                <div class="row align-items-end">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="it-blog-title-box"><span class="it-section-subtitle-2">DIRECTLY FROM BLOG</span>
                            <h4 class="it-section-title">Our latest news & upcoming <br> blog posts </h4>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="it-blog-button text-start text-md-end"><a class="it-btn blue-bg" href="blog-1.html"><span> all blog post <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></span></a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="it-blog-item">
                        <div class="it-blog-thumb fix"><a href="blog-details.html"><img src="public_assets/img/blog/blog-1-7.jpg" alt></a></div>
                        <div class="it-blog-content">
                            <div class="it-blog-meta pb-25"><span><i class="fa-light fa-user"></i> Sunilra smoth</span><span><i class="fa-light fa-calendar-days"></i> March 28, 2023</span></div>
                            <h4 class="it-blog-title pb-5"><a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur Adipiscing elit, sed do.</a></h4><a class="it-btn blue-bg" href="blog-details.html"><span> read more <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="it-blog-item">
                        <div class="it-blog-thumb fix"><a href="blog-details.html"><img src="public_assets/img/blog/blog-1-8.jpg" alt></a></div>
                        <div class="it-blog-content">
                            <div class="it-blog-meta pb-25"><span><i class="fa-light fa-user"></i> Sunilra smoth</span><span><i class="fa-light fa-calendar-days"></i> March 28, 2023</span></div>
                            <h4 class="it-blog-title pb-5"><a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur Adipiscing elit, sed do.</a></h4><a class="it-btn blue-bg" href="blog-details.html"><span> read more <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
