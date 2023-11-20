@extends('theme.master')

@section('body')
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">

            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Breadcrumb Area  -->
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="#">Home</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">All Jobs</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">All Jobs</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div> 50 Jobs
                                </a>
                            </div>

                            <p class="description">Jobs that help beginner designers become true unicorns. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
            <!-- Start Course Top  -->
            <div class="rbt-course-top-wrapper mt--40">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                                <div class="rbt-short-item switch-layout-container">
                                    <ul class="course-switch-layout">
                                        <li class="course-switch-item"><button class="rbt-grid-view" title="Grid Layout"><i class="feather-grid"></i> <span class="text">Grid</span></button></li>
                                        <li class="course-switch-item"><button class="rbt-list-view active" title="List Layout"><i class="feather-list"></i> <span class="text">List</span></button></li>
                                    </ul>
                                </div>
                                <div class="rbt-short-item">
                                    <span class="course-index">Showing 1-9 of 19 results</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form action="#" class="rbt-search-style me-0">
                                        <input type="text" placeholder="Search Your Job..">
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="rbt-short-item">
                                    <div class="view-more-btn text-start text-sm-end">
                                        <button class="discover-filter-button discover-filter-activation rbt-btn btn-white btn-md radius-round">Filter<i class="feather-filter"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start Filter Toggle  -->
                    <div class="default-exp-wrapper default-exp-expand">
                        <div class="filter-inner">
                            <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                    <span class="select-label d-block">Filter By Type</span>
                                    <select>
                                        <option>Default</option>
                                        @foreach(\App\Enums\JobType::asArray() as $key => $value)
                                            <option value="">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                    <span class="select-label d-block">Filter By Tags</span>
                                    <select data-live-search="true" title="Select Tag" multiple data-size="7" data-actions-box="true" data-selected-text-format="count > 2">
                                        @foreach($tags as $tag)
                                            <option data-subtext="Experts">{{ $tag }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div class="filter-select">
                                    <span class="select-label d-block">Salary Range</span>

                                    <div class="price_filter s-filter clear">
                                        <form action="#" method="GET">
                                            <div id="slider-range"></div>
                                            <div class="slider__range--output">
                                                <div class="price__output--wrap">
                                                    <div class="price--output">
                                                        <span>Salary</span><input type="text" id="amount">
                                                    </div>
                                                    <div class="price--filter">
                                                        <a class="rbt-btn btn-gradient btn-sm" href="#">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Toggle  -->
                </div>
            </div>
            <!-- End Course Top  -->
        </div>
    </div>


    <!-- Start Card Style -->
    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <!-- Start Card Area -->
            <div class="rbt-course-grid-column list-column-half active-list-view">

                @foreach ($jobs as $job)
                    <div class="course-grid-4" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-01 rbt-hover card-list-2">
                        <div class="rbt-card-img">
                            <a href="{{ route('job.show', ['slug' => $job->slug]) }}">
                                <img src="{{ $job->company->avatar }}" alt="{{ $job->title }}">
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h4 class="rbt-card-title"><a href="{{ route('job.show', ['slug' => $job->slug]) }}">{{ $job->title }}</a>
                            </h4>
                            <span class="lesson-number">{{ \App\Enums\JobType::getKey($job->type) }} - <span class="lesson-time">{{ $job->location }}</span></span>
                            <span class="lesson-number">{{ prettyPrice($job->salary) }}</span>
                            <div class="rbt-category">
                                @foreach($job->tags as $tag)
                                    <a href="#">{{ $tag }}</a>
                                @endforeach
                            </div>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button" href="{{ route('job.show', ['slug' => $job->slug]) }}">Learn
                                    More<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- End Card Area -->

            <div class="row">
                <div class="col-lg-12 mt--60">
                    {{ $jobs->links('vendor.pagination.custom-paginate') }}
                </div>
            </div>
        </div>
    </div>
@endsection
