@extends('theme.master')

@section('body')
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
        <div class="breadcrumb-inner">
            <img src="{{ asset('assets/images/bg/bg-image-10.jpg') }}" alt="Education Images">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content">
                        <div class="content text-start">
                            <h2 class="title mb--0">{{ $job->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-course-details-area rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="course-details-content">

                        <!-- Start Course Feature Box  -->
                        <div class="rbt-feature-box rbt-shadow-box mt--60">
                            <div class="row g-5">
                                <!-- Start Feture Box  -->
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h4 class="title mb--20">Job Description</h4>
                                    </div>
                                    {!! $job->description !!}
                                </div>
                                <!-- End Feture Box  -->
                            </div>
                        </div>
                        <!-- End Course Feature Box  -->
                    </div>
                </div>

                <div class="col-lg-4 mt_md--60 mt_sm--60">
                    <div class="course-sidebar rbt-gradient-border sticky-top rbt-shadow-box course-sidebar-top">
                        <div class="inner">

                            <!-- Start Viedo Wrapper  -->
                            <a class="video-popup-with-text video-popup-wrapper text-center popup-video sidebar-video-hidden mb--15" href="https://www.youtube.com/watch?v=nA1Aqp0sPQo">
                                <div class="video-content">
                                    <img class="w-100 rbt-radius" src="{{ $job->company->avatar }}" alt="Video Images">
                                </div>
                            </a>
                            <!-- End Viedo Wrapper  -->

                            <div class="content pt--30">
                                <div class="buy-now-btn">
                                    <a class="rbt-btn btn-border icon-hover w-100 d-block text-center" href="#">
                                        <span class="btn-text">Apply Now</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>

                                <div class="rbt-widget-details has-show-more">
                                    <ul class="has-show-more-inner-content rbt-course-details-list-wrapper">
                                        <li><span>Location</span><span class="rbt-feature-value rbt-badge-5">{{ $job->location }}</span></li>
                                        <li><span>Job type</span><span class="rbt-feature-value rbt-badge-5">{{ \App\Enums\JobType::getKey($job->type) }}</span></li>
                                        <li><span>Salary</span><span class="rbt-feature-value rbt-badge-5">{{ prettyPrice($job->salary) }}</span></li>
                                        <li><span>Company size</span><span class="rbt-feature-value rbt-badge-5">{{ $job->size }}</span></li>
                                        <li><span>Company country</span><span class="rbt-feature-value rbt-badge-5">{{ $job->country }}</span></li>
                                        <li><span>Working time</span><span class="rbt-feature-value rbt-badge-5">{{ $job->working_time }}</span></li>
                                    </ul>
                                    <div class="rbt-show-more-btn">Show More</div>
                                </div>

                                <div class="social-share-wrapper mt--30 text-center">
                                    <div class="rbt-post-share d-flex align-items-center justify-content-center">
                                        <ul class="social-icon social-default transparent-with-border justify-content-center">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.linkdin.com/">
                                                    <i class="feather-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr class="mt--20">
                                    <div class="contact-with-us text-center">
                                        <p>For details about the course</p>
                                        <p class="rbt-badge-2 mt--10 justify-content-center w-100"><i class="feather-phone mr--5"></i> Call Us: <a href="#"><strong>+444 555 666 777</strong></a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
