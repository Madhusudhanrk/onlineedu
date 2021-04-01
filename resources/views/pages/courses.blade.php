<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Courses </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/gijgo.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <!--? Preloader Start -->
    @include('./commontemp.loader')

    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        @include('./commontemp.header')
        <!-- Header End -->
    </header>
    <main>
        <!--? Hero Start -->
        @if(Session::has('course-view'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('course-view') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </p>
        @endif
        <div class="slider-area ">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>All Courses</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!-- all-course Start -->
        
        <section class="all-course section-padding30">
            <div class="container">
                <div class="row">
                    
                    <div class="all-course-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row mb-15">
                            <div class="col-lg-12">
                                <div class="properties__button mb-90">
                                    <!--Nav Button  -->                                            
                                    <nav>                                                                             
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" href="{{ url('course_contents/web') }}" role="tab" aria-controls="nav-profile" aria-selected="false">Web</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab"  href="{{ url('course_contents/graphic') }}" role="tab" aria-controls="nav-contact" aria-selected="false">Graphic</a>
                                            <a class="nav-item nav-link" id="nav-last-tab" href="{{ url('course_contents/app') }}" role="tab" aria-controls="nav-contact" aria-selected="false">App</a>
                                            <a class="nav-item nav-link" id="nav-Sports" href="{{ url('course_contents/language') }}" role="tab" aria-controls="nav-contact" aria-selected="false">Language</a>
                                            <a class="nav-item nav-link" id="nav-Sports" href="{{ url('course_contents/video') }}" role="tab" aria-controls="nav-contact" aria-selected="false">Video Editing</a>
                                            <a class="nav-item nav-link" id="nav-Sports" href="{{ url('course_contents/digital') }}" role="tab" aria-controls="nav-contact" aria-selected="false">Digital Marketing</a>
                                            {{-- <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="digital" role="tab" aria-controls="nav-contact" aria-selected="false">Digital Marketing</a> --}}
                                             
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                           

                                <div class="tab-content" id="nav-tabContent">
                                    <!--  one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <!-- Single course -->
                                                <div class="single-course mb-70">
                                                    <div class="course-img">
                                                        <img src="assets/img/gallery/popular_sub1.png" alt="">
                                                    </div>
                                                    <div class="course-caption">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{ url('course_contents/graphic') }}">Graphic Design</a></h4>
                                                            <span>Free</span>

                                                        </div>
                                                        {{-- <div class="course-cap-mid d-flex justify-content-between">
                                                            <div class="course-ratting">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <ul><li>52 Review</li></ul>
                                                        </div> --}}
                                                        {{-- <div class="course-cap-bottom d-flex justify-content-between"> --}}
                                                            {{-- <ul>
                                                                <li><i class="ti-user"></i> 562</li>
                                                                <li><i class="ti-heart"></i> 562</li>
                                                            </ul> --}}
                                                            {{-- <span>Free</span> --}}
                                                        {{-- </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <!-- Single course -->
                                                <div class="single-course mb-70">
                                                    <div class="course-img">
                                                        <img src="assets/img/gallery/popular_sub2.png" alt="">
                                                    </div>
                                                    <div class="course-caption">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{ url('course_contents/web') }}">Web Development</a></h4>
                                                            <span>Free</span>

                                                        </div>
                                                        {{-- <div class="course-cap-mid d-flex justify-content-between">
                                                            <div class="course-ratting">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <ul><li>52 Review</li></ul>
                                                        </div>
                                                        <div class="course-cap-bottom d-flex justify-content-between">
                                                            <ul>
                                                                <li><i class="ti-user"></i> 562</li>
                                                                <li><i class="ti-heart"></i> 562</li>
                                                            </ul>
                                                            <span>Free</span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <!-- Single course -->
                                                <div class="single-course mb-70">
                                                    <div class="course-img">
                                                        <img src="assets/img/gallery/popular_sub3.png" alt="">
                                                    </div>
                                                    <div class="course-caption">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{ url('course_contents/digital') }}">Digital Marketing</a></h4>
                                                            <span>Free</span>

                                                        </div>
                                                        {{-- <div class="course-cap-mid d-flex justify-content-between">
                                                            <div class="course-ratting">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <ul><li>52 Review</li></ul>
                                                        </div>
                                                        <div class="course-cap-bottom d-flex justify-content-between">
                                                            <ul>
                                                                <li><i class="ti-user"></i> 562</li>
                                                                <li><i class="ti-heart"></i> 562</li>
                                                            </ul>
                                                            <span>Free</span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <!-- Single course -->
                                                <div class="single-course mb-70">
                                                    <div class="course-img">
                                                        <img src="assets/img/gallery/mobile.png" alt="">
                                                    </div>
                                                    <div class="course-caption">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{ url('course_contents/app') }}">App</a></h4>
                                                            <span>Free</span>

                                                        </div>
                                                        {{-- <div class="course-cap-mid d-flex justify-content-between">
                                                            <div class="course-ratting">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <ul><li>52 Review</li></ul>
                                                        </div>
                                                        <div class="course-cap-bottom d-flex justify-content-between">
                                                            <ul>
                                                                <li><i class="ti-user"></i> 562</li>
                                                                <li><i class="ti-heart"></i> 562</li>
                                                            </ul>
                                                            <span>Free</span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <!-- Single course -->
                                                <div class="single-course mb-70">
                                                    <div class="course-img">
                                                        <img src="assets/img/gallery/language.png" alt="">
                                                    </div>
                                                    <div class="course-caption">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{ url('course_contents/language') }}">Language</a></h4>
                                                            <span>Free</span>

                                                        </div>
                                                        {{-- <div class="course-cap-mid d-flex justify-content-between">
                                                            <div class="course-ratting">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <ul><li>52 Review</li></ul>
                                                        </div>
                                                        <div class="course-cap-bottom d-flex justify-content-between">
                                                            <ul>
                                                                <li><i class="ti-user"></i> 562</li>
                                                                <li><i class="ti-heart"></i> 562</li>
                                                            </ul>
                                                            <span>Free</span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <!-- Single course -->
                                                <div class="single-course mb-70">
                                                    <div class="course-img">
                                                        <img src="assets/img/gallery/video.png" alt="">
                                                    </div>
                                                    <div class="course-caption">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{ url('course_contents/video') }}">Video Editing</a></h4>
                                                            <span>Free</span>

                                                        </div>
                                                        {{-- <div class="course-cap-mid d-flex justify-content-between">
                                                            <div class="course-ratting">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <ul><li>52 Review</li></ul>
                                                        </div>
                                                        <div class="course-cap-bottom d-flex justify-content-between">
                                                            <ul>
                                                                <li><i class="ti-user"></i> 562</li>
                                                                <li><i class="ti-heart"></i> 562</li>
                                                            </ul>
                                                            <span>Free</span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ---------------------------------------------- Two -->
                                    
                                    
                                    
                                    
                                </div>
                            <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- all-course End -->
    </main>
    <footer>
        <!--? Footer Start-->
        @include('./commontemp.footer');

        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
    </body>
</html>