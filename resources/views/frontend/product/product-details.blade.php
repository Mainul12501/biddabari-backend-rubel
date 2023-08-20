@extends('frontend.master')

@section('body')
{{--    <div class="inner-banner inner-banner-bg9">--}}
{{--        <div class="container">--}}
{{--            <div class="inner-title">--}}
{{--                <h3>{{ $product->title }}</h3>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="">Home</a>--}}
{{--                    </li>--}}
{{--                    <li>Product details</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="courses-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card content-shadow rounded-0">
                        <div class="card-body">
                            <h1 class="text-center">{{ $product->title }}</h1>
                            <hr/>
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
                                    <form id="" action="{{ route('front.new-comment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="type" value="product">
                                        <input type="hidden" name="parent_model_id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ auth()->check() ? auth()->user()->name : '' }}">
                                        <input type="hidden" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}">
                                        <input type="hidden" name="mobile" value="{{ auth()->check() ? auth()->user()->mobile : '' }}">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="" cols="30" rows="3" required placeholder="Comment..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <button type="submit" @if(!auth()->check()) onclick="event.preventDefault(); toastr.error('Please Login First');" @endif class="default-btn">
                                                    Post A Comment
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                            {{--dynamic data--}}
                            @foreach($comments as $comment)
                                <div class="py-2">
                                    <div class="d-flex flex-row w-100">
                                        <div class="d-flex flex-column">
                                            <div class="com-img-box">
                                                @if(isset($comment->user->profile_photo_path))
                                                    <img src="{{ asset( $comment->user->profile_photo_path ) }}" alt="user-image" class="comment-user-image">
                                                @else
                                                    <img src="https://www.vhv.rs/dpng/d/509-5096993_login-icon-vector-png-clipart-png-download-user.png" alt="user-image" class="comment-user-image">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column bg-light ml-2 w-100 px-2">
                                            <p class="mb-0 f-s-20 ">{{ $comment->user->name }}</p>
                                            <p class="text-justify ps-3">{{ $comment->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="courses-details-sidebar">
                        <img src="{{ asset($product->image) }}" alt="{{$product->title}}" style="max-height: 320px;" class="img-fluid w-100" />
                        <div class="content">
                            <h1>{!! $product->title !!}</h1>
                            @if($product->has_discount_validity == 'true')
                                <p class="f-s-20" style="margin-right: 15px;">Price: <del class="text-danger">{{$product->price}} tk</del></p>
                                <p class="f-s-20" style="">Discounted Price: {{$grandPrice = $product->price - $product->discount_amount}} tk</p>
                            @else
                                <h3>{{$product->price}} tk</h3>
                            @endif
                            @if(!empty(\Cart::get($product->id)))
                                <a href="{{ route('front.view-cart') }}" class="default-btn">View cart</a>
                            @else
                                <form action="{{ route('front.add-to-cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                    <input type="hidden" name="price" value="{{ $product->has_discount_validity == 'true' ? $grandPrice : $product->price }}" />
                                    <button type="submit" class="default-btn">Add to cart</button>
                                </form>
                            @endif
                            {{--                            <ul class="social-link">--}}
{{--                                <li class="social-title">Share this course:</li>--}}
{{--                                <li>--}}
{{--                                    <a href="https://www.facebook.com/" target="_blank">--}}
{{--                                        <i class="ri-facebook-fill"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="https://twitter.com/" target="_blank">--}}
{{--                                        <i class="ri-twitter-fill"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="https://www.pinterest.com/" target="_blank">--}}
{{--                                        <i class="ri-instagram-line"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('style')
    <style>
        /*review section*/
        .no-pad p {
            margin-bottom: 2px!important;
        }
        .comment-user-image {
            border-radius: 60%;
            width: 40px;
            height: 40px;
        }
        .com-img-box {
            /*height: 78px;*/
            width: 56px;
        }
        .main-comment p {
            margin-bottom: 2px!important;
        }
        .sub-replay p {
            margin-bottom: 2px !important;
        }
        .bb-1px {
            border-bottom: 1px solid black;
        }
    </style>
@endpush
@push('script')
    <script src="{{ asset('/') }}frontend/assets/js/page-js/product-comments.js"></script>
@endpush
