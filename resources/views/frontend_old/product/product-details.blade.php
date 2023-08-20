@extends('frontend.master')

@section('body')
    <div class="inner-banner inner-banner-bg9">
        <div class="container">
            <div class="inner-title">
                <h3>{{ $product->title }}</h3>
                <ul>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>Product details</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="courses-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="courses-details-contact">
                        <div class="tab courses-details-tab">
                            <ul class="tabs">
                                <li>
                                    Description
                                </li>
                                <li>
                                    About
                                </li>
                                <li>
                                    Specification
                                </li>
                                <li>
                                    Dther Details
                                </li>
                            </ul>
                            <div class="tab_content current active">
                                <div class="tabs_item current">
                                    <div class="courses-details-tab-content">
                                        <div class="courses-details-into">
                                            <h3>Description</h3>
                                            <p>
                                                {!! $product->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs_item">
                                    <div class="courses-details-tab-content">
                                        <div class="courses-details-accordion">
                                            <h3>About</h3>
                                            <p>{!! $product->about !!} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs_item">
                                    <div class="courses-details-tab-content">
                                        <div class="courses-details-instructor">
                                            <h3>Specification</h3>
                                            <p>
                                                {!! $product->specification  !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs_item">
                                    <div class="courses-details-tab-content">
                                        <div class="courses-details-instructor">
                                            <h3>Other Details</h3>
                                            <p>
                                                {!! $product->other_details  !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comments-form">
                        <div class="contact-form">
                            <h4>Leave A Reply</h4>
                            <p>Your email address will not be published. Required fields are marked</p>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Comment..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Post A Comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="courses-details-sidebar">
                        <img src="{{ asset($product->image) }}" alt="{{$product->title}}" />
                        <div class="content">
                            @if($product->discount > 0)
                                <span style="font-size: 30px;margin-right: 30px;"><del>{{$product->price}}</del> tk</span>
                                <span style="font-size: 30px">{{$product->discount}} tk</span>
                            @else
                                <h3>{{$product->price}} tk</h3>
                            @endif
                            <a href="cart.html" class="default-btn">Add to cart</a>
                            <ul class="social-link">
                                <li class="social-title">Share this course:</li>
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
        </div>
    </div>


@endsection
