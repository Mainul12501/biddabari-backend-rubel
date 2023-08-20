@extends('frontend.master')

@section('body')


    <div class="inner-banner inner-banner-bg10 ">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Blog Details</h3>
                <ul>
                    <li>
                        <a href="{{ route('front.home') }}">Home</a>
                    </li>
                    <li>{{ $blog->title }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog-details-content pr-20">
                        <div class="blog-preview-img text-center">
                            <img src="{{ asset($blog->image) }}" alt="Blog Details" class="img-fluid" style="min-height: 600px">
                        </div>
                        <ul class="tag-list">
                            <li><i class="ri-calendar-todo-fill"></i> {{ $blog->created_at->format('M d, Y') }}</li>
{{--                            <li><i class="ri-price-tag-3-fill"></i> <a href="tags.html">Education</a></li>--}}
                        </ul>
                        <p>{!! $blog->body !!}</p>
                        <div class="article-share">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
{{--                                    <div class="article-tag">--}}
{{--                                        <ul>--}}
{{--                                            <li class="title"><i class="ri-price-tag-3-fill"></i></li>--}}
{{--                                            <li><a href="tags.html" target="_blank"> Education,</a></li>--}}
{{--                                            <li><a href="tags.html" target="_blank">Business, </a></li>--}}
{{--                                            <li><a href="tags.html" target="_blank">Physics</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="article-social-icon">
                                        <ul class="social-icon">
                                            <li class="title">Share :</li>
                                            <li>
                                                <a href="https://www.facebook.com/" target="_blank">
                                                    <i class="ri-facebook-fill"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/" target="_blank">
                                                    <i class="ri-twitter-fill"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.pinterest.com/" target="_blank">
                                                    <i class="ri-instagram-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="comments-form">--}}
{{--                            <div class="contact-form">--}}
{{--                                <h4>Leave A Reply</h4>--}}
{{--                                <p>Your email address will not be published. Required fields are marked</p>--}}
{{--                                <form id="contactForm">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-6 col-sm-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6 col-sm-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-12 col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Comment..."></textarea>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-12 col-md-12">--}}
{{--                                            <button type="submit" class="default-btn">--}}
{{--                                                Post A Comment--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
{{--                <div class="col-lg-4">--}}
{{--                    <div class="side-bar-area">--}}
{{--                        <div class="side-bar-widget">--}}
{{--                            <form class="search-form">--}}
{{--                                <input type="search" class="form-control" placeholder="Search...">--}}
{{--                                <button type="submit">--}}
{{--                                    <i class="ri-search-line"></i>--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="side-bar-widget">--}}
{{--                            <h3 class="title">Categories</h3>--}}
{{--                            <div class="side-bar-categories">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="categories.html" target="_blank">--}}
{{--                                            Education--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="categories.html" target="_blank">--}}
{{--                                            Business--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="categories.html" target="_blank">--}}
{{--                                            Human resources--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="categories.html" target="_blank">--}}
{{--                                            Investment--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="categories.html" target="_blank">--}}
{{--                                            Lifestyle--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="categories.html" target="_blank">--}}
{{--                                            Mangement--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="side-bar-widget">--}}
{{--                            <h3 class="title">Popular post</h3>--}}
{{--                            <div class="widget-popular-post">--}}
{{--                                <article class="item">--}}
{{--                                    <a href="blog-details.html" class="thumb">--}}
{{--                                        <span class="full-image cover bg1" role="img"></span>--}}
{{--                                    </a>--}}
{{--                                    <div class="info">--}}
{{--                                        <p>12 Jan, 2022</p>--}}
{{--                                        <h4 class="title-text">--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                All that is wrong codding in the field of apprentices--}}
{{--                                            </a>--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                </article>--}}
{{--                                <article class="item">--}}
{{--                                    <a href="blog-details.html" class="thumb">--}}
{{--                                        <span class="full-image cover bg2" role="img"></span>--}}
{{--                                    </a>--}}
{{--                                    <div class="info">--}}
{{--                                        <p>14 Jan, 2022</p>--}}
{{--                                        <h4 class="title-text">--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                How to use technology to adapt your talent to the world--}}
{{--                                            </a>--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                </article>--}}
{{--                                <article class="item">--}}
{{--                                    <a href="blog-details.html" class="thumb">--}}
{{--                                        <span class="full-image cover bg3" role="img"></span>--}}
{{--                                    </a>--}}
{{--                                    <div class="info">--}}
{{--                                        <p>16 Jan, 2022</p>--}}
{{--                                        <h4 class="title-text">--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                Here are the things to look for when--}}
{{--                                                selecting an online courses--}}
{{--                                            </a>--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                </article>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="side-bar-widget">--}}
{{--                            <h3 class="title">Tags</h3>--}}
{{--                            <ul class="side-bar-widget-tag">--}}
{{--                                <li><a href="tags.html" target="_blank"> Education</a></li>--}}
{{--                                <li><a href="tags.html" target="_blank">Investment</a></li>--}}
{{--                                <li><a href="tags.html" target="_blank">Lifestyle</a></li>--}}
{{--                                <li><a href="tags.html" target="_blank">Business</a></li>--}}
{{--                                <li><a href="tags.html" target="_blank">Mangement</a></li>--}}
{{--                                <li><a href="tags.html" target="_blank">Human</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>


@endsection
