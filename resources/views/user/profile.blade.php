@extends('theme.master')

@section('body')
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
    </div>

    <!-- Start Card Style -->
    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Start Dashboard Top  -->
                    <div class="rbt-dashboard-content-wrapper">
                        <!-- Start Tutor Information  -->
                        @include('user.banner')
                        <!-- End Tutor Information  -->
                    </div>
                    <!-- End Dashboard Top  -->

                    <div class="row g-5">
                        <div class="col-lg-3">
                            <!-- Start Dashboard Sidebar  -->
                            <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                                <div class="inner">
                                    @include('user.sidebar')
                                </div>
                            </div>
                            <!-- End Dashboard Sidebar  -->
                        </div>
                        <div class="col-lg-9">
                            <!-- Start Instructor Profile  -->
                            <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                                <div class="content">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">My Profile</h4>
                                    </div>
                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Registration Date</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">February 25, 2025 6:01 am</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">First Name</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">John</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Last Name</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">Doe</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Username</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">instructor</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Email</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">example@gmail.com</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Phone Number</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">+1-202-555-0174</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Skill/Occupation</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">Application Developer</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Biography</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">I'm the Front-End Developer for #Rainbow IT in Bangladesh, OR. I have serious passion for UI effects, animations and creating intuitive, dynamic user experiences.</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->
                                </div>
                            </div>
                            <!-- End Instructor Profile  -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->


@endsection
