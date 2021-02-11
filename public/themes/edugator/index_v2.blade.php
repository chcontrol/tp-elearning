@extends('layouts.theme')


@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <div class="owl-carousel owl-theme">
        <div class="item">
            <img class="img-fluid" src="{{ theme_url('images/home/slider1.jpg') }}" alt="Image 1"
                style="height: 214px; " />
        </div>
        <div class="item">
            <img class="img-fluid" src="{{ theme_url('images/home/slider2.jpg') }}" alt="Image 2"
                style="height: 214px;" />
        </div>
        <div class="item">
            <img class="img-fluid" src="{{ theme_url('images/home/slider3.jpg') }}" alt="Image 3"
                style="height: 214px;" />
        </div>

    </div>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 2,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                1000: {
                    items: 2
                },
                1500: {
                    items: 3
                }
            }
        });
        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        })


    </script>


    {{-- <div class="owl-carousel owl-theme owl-loaded">
    <div class="owl-stage-outer">
        <div class="owl-stage">
            <div class="owl-item">
                <img class="img-fluid" src="{{ theme_url('images/home/slider1.jpg') }}" alt="Image 2" />
            </div>
            <div class="owl-item">
                <img class="img-fluid" src="{{ theme_url('images/home/slider1.jpg') }}" alt="Image 2" />
            </div>
            <div class="owl-item">
                <img class="img-fluid" src="{{ theme_url('images/home/slider1.jpg') }}" alt="Image 2" />
            </div>
        </div>
    </div>
    <div class="owl-nav">
        <div class="owl-prev">prev</div>
        <div class="owl-next">next</div>
    </div>
    <div class="owl-dots">
        <div class="owl-dot active"><span></span></div>
        <div class="owl-dot"><span></span></div>
        <div class="owl-dot"><span></span></div>
    </div>
</div> --}}



    {{-- <div class="p-3">
        <div id="gallery" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="height: 214px">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col" class="col-md-12" style="height: 214px;">
                            <img class="img-fluid" src="{{ theme_url('images/home/slider1.jpg') }}" alt="Image 2" />
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="{{ theme_url('images/home/slider2.jpg') }}" alt="Image 2" />
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col">
                            <img class="img-fluid" src="{{ theme_url('images/home/slider3.jpg') }}" alt="Image 2" />
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="{{ theme_url('images/home/slider1.jpg') }}" alt="Image 2" />
                        </div>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div> --}}

    <div class="p-3 mb-2 bg-light text-white">
        @if ($new_courses->count())
            <div class="home-section-wrap home-new-courses-wrapper py-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 text-dark h5 font-weight-bold">
                            MEGA CER - Learning Space
                        </div>
                        <div class="col-md-4 text-dark h4 font-weight-bold">
                            <h3 class="section-title">
                                <button href="{{ route('courses') }}" class="btn btn-link float-right">
                                    VIEW ALL</button>
                            </h3>
                        </div>
                        <div class="col-md-12">

                            <hr class="col-xs-12">
                            {{-- <div class="section-header-wrap">
                                <h3 class="section-title">{{ __t('new_arrival') }}
                                    <a href="{{ route('courses') }}" class="btn btn-link float-right"><i
                                            class="la la-list"></i>
                                        {{ __t('all_courses') }}</a>
                                </h3>
                                <p class="section-subtitle">{{ __t('new_arrival_desc') }}</p>
                            </div> --}}
                        </div>
                    </div>

                    <div class="popular-courses-cards-wrap mt-3">
                        <div class="row">
                            @foreach ($new_courses as $course)
                                {!! course_card($course) !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- <div class="hero-banner py-3">

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="hero-left-wrap">

                    </div>

                </div>


                <div class="col-md-12 col-lg-6 hero-right-col">
                    <div class="hero-right-wrap">
                        <img src="{{ theme_url('images/hero-image.png') }}" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="home-section-wrap home-info-box-wrapper py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-2 p-2">
                    <div class="home-info-box">
                        <img src="{{ theme_url('images/skills.svg') }}">
                        <h3 class="info-box-title">Learn the latest skills</h3>
                        <p class="info-box-desc">like business analytics, graphic design, Python, and more</p>
                    </div>
                </div>

                <div class="col-md-2 p-2">
                    <div class="home-info-box">
                        <img src="{{ theme_url('images/career-goal.svg') }}">
                        <h3 class="info-box-title">Get ready for a career</h3>
                        <p class="info-box-desc">in high-demand fields like IT, AI and cloud engineering</p>
                    </div>
                </div>

                <div class="col-md-2 p-2">
                    <div class="home-info-box">
                        <img src="{{ theme_url('images/instructions.svg') }}">
                        <h3 class="info-box-title">Expert instruction</h3>
                        <p class="info-box-desc">Every course designed by expert instructor</p>
                    </div>
                </div>

                <div class="col-md-2 p-2">
                    <div class="home-info-box">
                        <img src="{{ theme_url('images/cartificate.svg') }}">
                        <h3 class="info-box-title">Earn a certificate</h3>
                        <p class="info-box-desc">Get certified upon completing a course</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($featured_courses->count())
        <div class="home-section-wrap home-featured-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">
                                {{ __t('featured_courses') }}

                                <a href="{{ route('featured_courses') }}" class="btn btn-link float-right"><i
                                        class="la la-bookmark"></i> {{ __t('all_featured_courses') }}</a>
                            </h3>

                            <p class="section-subtitle">{{ __t('featured_courses_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row">
                        @foreach ($featured_courses as $course)
                            {!!  course_card($course, 'col-md-4') !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="mid-callto-action-wrap text-white text-center py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-3">Find the perfect course for you</h2>
                    <h4 class="mb-3 mid-callto-action-subtitle">Choose from over 100 online video courses <br /> with new
                        additions published every day</h4>

                    <a href="{{ route('courses') }}" class="btn btn-warning btn-lg">Find new courses</a>
                </div>
            </div>
        </div>
    </div>

    @if ($popular_courses->count())
        <div class="home-section-wrap home-fatured-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">{{ __t('popular_courses') }}

                                <a href="{{ route('popular_courses') }}" class="btn btn-link float-right"><i
                                        class="la la-bolt"></i> {{ __t('all_popular_courses') }}</a>
                            </h3>
                            <p class="section-subtitle">{{ __t('popular_courses_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row">
                        @foreach ($featured_courses as $course)
                            {!!  course_card($course) !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if ($new_courses->count())
        <div class="home-section-wrap home-new-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">{{ __t('new_arrival') }}

                                <a href="{{ route('courses') }}" class="btn btn-link float-right"><i class="la la-list"></i>
                                    {{ __t('all_courses') }}</a>
                            </h3>
                            <p class="section-subtitle">{{ __t('new_arrival_desc') }}</p>
                        </div>
                    </div>
                </div>

                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row">
                        @foreach ($new_courses as $course)
                            {!!  course_card($course) !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($posts->count())
        <div class="home-section-wrap home-blog-section-wrapper py-5">

            <div class="container">

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">{{ __t('latest_blog_text') }}</h3>
                            <p class="section-subtitle">{{ __t('latest_blog_desc') }}</p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 mb-4">
                            <div class="home-blog-card">
                                <a href="{{ $post->url }}">
                                    <img src="{{ $post->thumbnail_url->image_md }}" alt="{{ $post->title }}"
                                        class="img-fluid">
                                </a>
                                <div class="excerpt px-4">
                                    <h2><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                                    <div class="post-meta d-flex justify-content-between">
                                        <span>
                                            <i class="la la-user"></i>
                                            <a href="{{ route('profile', $post->user_id) }}">
                                                {{ $post->author->name }}
                                            </a>
                                        </span>
                                        <span>&nbsp;<i class="la la-calendar"></i>&nbsp; {{ $post->published_time }}</span>
                                    </div>
                                    <p class="mt-4">
                                        <a href="{{ $post->url }}"><strong>READ MORE <i class="la la-arrow-right"></i>
                                            </strong></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="btn-see-all-posts-wrapper pt-4">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <a href="{{ route('blog') }}" class="btn btn-lg btn-theme-primary ml-auto mr-auto">
                                <i class="la la-blog"></i> See All Posts
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endif

    <div class="home-section-wrap home-cta-wrapper py-5 ">

        <div class="home-partners-logo-section pb-5 mb-5 text-center">
            <div class="container">

                <h5 class="home-partners-title mb-5">Companies use Teachify to enrich their brand & business.</h5>

                <div class="home-partners-logo-wrap">
                    <div class="logo-item">
                        <a href=""><img src="{{ theme_url('images/adidas.png') }}" alt="adidas" /></a>
                    </div>
                    <div class="logo-item">
                        <a href=""><img src="{{ theme_url('images/disnep.png') }}" alt="images" /></a>
                    </div>
                    <div class="logo-item">
                        <a href=""><img src="{{ theme_url('images/intel.png') }}" alt="intel" /></a>
                    </div>
                    <div class="logo-item">
                        <a href=""><img src="{{ theme_url('images/penlaw.png') }}" alt="penlaw" /></a>
                    </div>
                    <div class="logo-item">
                        <a href=""><img src="{{ theme_url('images/shopify.png') }}" alt="shopify" /></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="home-course-stats-wrap pb-5 mb-5 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 p-2">
                        <h3>580</h3>
                        <h5>Active Courses</h5>
                    </div>
                    <div class="col-md-2 p-2">
                        <h3>1200</h3>
                        <h5>Hours Video</h5>
                    </div>
                    <div class="col-md-2 p-2">
                        <h3>850</h3>
                        <h5>Teachers</h5>
                    </div>
                    <div class="col-md-2 p-2">
                        <h3>1800</h3>
                        <h5>Students Learning</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 home-cta-left-col">

                    <div class="home-cta-text-wrapper px-5 text-center">
                        <h4>Become an instructor</h4>
                        <p>Spread your knowledge to millions of students around the world through teachify teaching
                            platform. You can teach any tech you love from heart.
                        </p>
                        <a href="{{ route('create_course') }}" class="btn btn-theme-primary">Start Teaching Today</a>

                    </div>

                </div>

                <div class="col-sm-6">

                    <div class="home-cta-text-wrapper px-5 text-center">
                        <h4>Discover latest technology</h4>
                        <p>Earn new skills and enroll to the new courses. Continuous learning is only key to keep your self
                            up-to-date with modern technology.
                        </p>
                        <a href="{{ route('courses') }}" class="btn btn-theme-primary">{{ __t('find_new_courses') }}</a>
                    </div>

                </div>

            </div>
        </div>

    </div> --}}

@endsection
