@extends('theme.master')

@section('body')
    <div class="rbt-overlay-page-wrapper">
        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="default-exp-wrapper float-end">
                <div class="filter-inner">
                    <div class="filter-select-option">
                        <form class="filter-select rbt-modern-select">
                            <span class="select-label d-block">Language</span>
                            <select name="l" onchange='document.querySelector("form").submit()' data-live-search="true" title="{{ $selected_l }}" data-size="7" data-actions-box="true" data-selected-text-format="count > 2">
                                @foreach ($languages as $code => $language)
                                    <option value="{{ $code }}">{{ $language }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-image-wrapper">
                <img src="{{ asset('assets/images/bg/bg-image-10.jpg') }}" alt="Education Images">
            </div>
            <div class="breadcrumb-content-top text-center">
                <ul class="meta-list justify-content-center mb--10">
                    <li class="list-item">
                        <div class="author-thumbnail">
                            <img src="{{ $post->user->avatar }}" alt="blog-image">
                        </div>
                        <div class="author-info">
                            <a href="#"><strong>{{ $post->user->name }}</strong></a> in
                            <a href="#"><strong>{{ \App\Enums\PostCategory::getDescription($post->category) }}</strong></a> -
                            <a href="#"><strong>{{ $post->tag }}</strong></a>
                        </div>
                    </li>
                    <li class="list-item">
                        <i class="feather-clock"></i>
                        <span>20 Aug 2021</span>
                    </li>
                </ul>
                {!! $html_title !!}
            </div>
        </div>

        <div class="rbt-blog-details-area rbt-section-gapBottom breadcrumb-style-max-width">
            <div class="blog-content-wrapper rbt-article-content-wrapper">
                <div class="content">
                    {!! $html_content !!}

                    <!-- BLog Tag Clound  -->
                    <div class="tagcloud">
                        <a href="#">Education</a>
                        <a href="#">Life Style</a>
                        <a href="#">React</a>
                        <a href="#">Javascript</a>
                        <a href="#">Web App</a>
                        <a href="#">Application</a>
                    </div>

                    <!-- Social Share Block  -->
                    <div class="social-share-block">
                        <div class="post-like">
                            <a href="#"><i class="feather feather-thumbs-up"></i><span>2.2k Like</span></a>
                        </div>
                        <ul class="social-icon social-default transparent-with-border">
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


                    <!-- Blog Author  -->
                    <div class="about-author">
                        <div class="media">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="{{ $post->user->avatar }}" alt="Author Images">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="author-info">
                                    <h5 class="title">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            {{ $post->user->name }}
                                        </a>
                                    </h5>
                                    <span class="b3 subtitle">Sr. UX Designer</span>
                                </div>
                                <div class="content">
                                    <p class="description">At 29 years old, my favorite compliment is being
                                        told that I look like my mom. Seeing myself in her image, like this
                                        daughter up top.</p>
                                    <ul class="social-icon social-default icon-naked justify-content-start">
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

                            </div>
                        </div>
                    </div>

                    <div class="rbt-comment-area">
                        <div class="rbt-total-comment-post">
                            <div class="title">
                                <h4 class="mb--0">30+ Comments</h4>
                            </div>
                            <div class="add-comment-button">
                                <a class="rbt-btn btn-gradient icon-hover radius-round btn-md" href="#">
                                    <span class="btn-text">Add Your Comment</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="comment-respond">
                            <h4 class="title">Post a Comment</h4>
                            <form action="#">
                                <p class="comment-notes"><span id="email-notes">Your email address will not be
                                        published.</span> Required fields are marked <span class="required">*</span></p>
                                <div class="row row--10">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="bl-email">Your Email</label>
                                            <input id="bl-email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="website">Your Website</label>
                                            <input id="website" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Leave a Reply</label>
                                            <textarea id="message" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="comment-form-cookies-consent">
                                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                            <label for="wp-comment-cookies-consent">Save my name, email, and
                                                website in this browser for the next time I comment.</label>
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <a class="rbt-btn btn-gradient icon-hover radius-round btn-md" href="#">
                                            <span class="btn-text">Post Comment</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="rbt-comment-area">
                        <h4 class="title">2 comments</h4>
                        <ul class="comment-list">
                            <!-- Start Single Comment  -->
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="single-comment">
                                        <div class="comment-img">
                                            <img src="{{ asset('assets/images/testimonial/testimonial-1.jpg') }}" alt="Author Images">
                                        </div>
                                        <div class="comment-inner">
                                            <h6 class="commenter">
                                                <a href="#">Cameron Williamson</a>
                                            </h6>
                                            <div class="comment-meta">
                                                <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                                <div class="reply-edit">
                                                    <div class="reply">
                                                        <a class="comment-reply-link" href="#">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p class="b2">Duis hendrerit velit scelerisque felis tempus, id porta
                                                    libero venenatis. Nulla facilisi. Phasellus viverra
                                                    magna commodo dui lacinia tempus. Donec malesuada nunc
                                                    non dui posuere, fringilla vestibulum urna mollis.
                                                    Integer condimentum ac sapien quis maximus. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <!-- Start Single Comment  -->
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="single-comment">
                                                <div class="comment-img">
                                                    <img src="{{ asset('assets/images/testimonial/testimonial-2.jpg') }}" alt="Author Images">
                                                </div>
                                                <div class="comment-inner">
                                                    <h6 class="commenter">
                                                        <a href="#">John Due</a>
                                                    </h6>
                                                    <div class="comment-meta">
                                                        <div class="time-spent">Nov 23, 2018 at 12:23 pm
                                                        </div>
                                                        <div class="reply-edit">
                                                            <div class="reply">
                                                                <a class="comment-reply-link" href="#">Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p class="b2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse lobortis cursus lacinia. Vestibulum vitae leo id diam pellentesque ornare.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- End Single Comment  -->
                                </ul>
                            </li>
                            <!-- End Single Comment  -->

                            <!-- Start Single Comment  -->
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="single-comment">
                                        <div class="comment-img">
                                            <img src="{{ asset('assets/images/testimonial/testimonial-3.jpg') }}" alt="Author Images">
                                        </div>
                                        <div class="comment-inner">
                                            <h6 class="commenter">
                                                <a href="#">Rafin Shuvo</a>
                                            </h6>
                                            <div class="comment-meta">
                                                <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                                <div class="reply-edit">
                                                    <div class="reply">
                                                        <a class="comment-reply-link" href="#">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p class="b2">Duis hendrerit velit scelerisque felis tempus, id porta
                                                    libero venenatis. Nulla facilisi. Phasellus viverra
                                                    magna commodo dui lacinia tempus. Donec malesuada nunc
                                                    non dui posuere, fringilla vestibulum urna mollis.
                                                    Integer condimentum ac sapien quis maximus. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- End Single Comment  -->
                        </ul>
                    </div>

                </div>
                <div class="related-post pt--60">
                    <div class="section-title text-start mb--40">
                        <span class="subtitle bg-primary-opacity">Related Post</span>
                        <h4 class="title">Similar Post</h4>
                    </div>

                    @foreach ($relate_posts as $post)
                        <div class="rbt-card card-list variation-02 rbt-hover mt--30">
                        <div class="rbt-card-img">
                            <a href="{{ route('forum.show', ['slug' => $post->slug]) }}">
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a href="{{ route('forum.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h5>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button" href="{{ route('forum.show', ['slug' => $post->slug]) }}">
                                    Read Article
                                    <i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
