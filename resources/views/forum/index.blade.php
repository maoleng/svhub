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
                                <li class="rbt-breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">Forum</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">Forum</h1>
                            </div>
                            <p class="description">
                                Blog that help beginner designers become true unicorns.
                                <a class="btn-underline-gradient" href="{{ route('forum.create') }}">Create</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->

            <div class="rbt-course-top-wrapper mt--40">
                <div class="container">
                    <div class="row g-5 align-items-center">

                        <div class="col-lg-5 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                                <div class="rbt-short-item switch-layout-container">
                                    <ul class="course-switch-layout">
                                        <li class="course-switch-item">
                                            <button class="rbt-grid-view active" title="Grid Layout"><i
                                                    class="feather-grid"></i> <span class="text">Grid</span></button>
                                        </li>
                                        <li class="course-switch-item">
                                            <button class="rbt-list-view" title="List Layout"><i
                                                    class="feather-list"></i> <span class="text">List</span></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="rbt-short-item">
                                    <span class="course-index">Showing 1-9 of 19 results</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div
                                class="rbt-sorting-list d-flex flex-wrap align-items-end justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form action="#" class="rbt-search-style me-0">
                                        <input type="text" placeholder="Search Your Post..">
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="rbt-short-item">
                                    <div class="filter-select">
                                        <span class="select-label d-block">Filter By</span>
                                        <div class="filter-select rbt-modern-select search-by-category">
                                            <select data-size="7">
                                                <option>Default</option>
                                                @foreach (\App\Enums\PostTag::asArray() as $key => $value)
                                                    <option value="{{ $value }}">{{ $key }}</option>
                                                @endforeach
                                            </select>
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

    <div class="rbt-blog-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">

            <div class="row g-5">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-02 rbt-hover card-minimal">
                        <div class="rbt-card-body">
                            <ul class="meta-list justify-content-start mb--30">
                                <li class="list-item">
                                    <i class="feather-clock"></i>
                                    <span></span>
                                </li>
                            </ul>
                            <h4 class="rbt-card-title"><a href="{{ route('forum.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h4>
                            <ul class="blog-meta">
                                <li><i class="feather-user"></i> {{ $post->user->name }}</li>
                                <li><i class="feather-clock"></i> {{ $post->prettyCreatedAt }}</li>
                                <li><i class="feather-tag"></i> 1 min read</li>
                            </ul>
                            <div class="rbt-card-bottom mt--40">
                                <a class="transparent-button" href="blog-details.html">Learn More<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 mt--60">
                    <nav>
                        <ul class="rbt-pagination">
                            <li><a href="#" aria-label="Previous"><i class="feather-chevron-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#" aria-label="Next"><i class="feather-chevron-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>

@endsection
