@extends('frontend.master')

@section('body')

    <div class="courses-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">


                <div class="col-md-3">
                    <div class="card">
                        <div class="py-2 text-center">
                            <a href="{{ route('front.show-product-pdf', ['content_id' => $product->id]) }}" class="btn rounded-0 btn-outline-success ">একটু পড়ে দেখুন</a>
                        </div>
                        <div class="mt-3">
                            <img src="{{ asset(isset($product->image) ? $product->image : 'frontend/logo/biddabari-card-logo.jpg') }}" alt="" class="img-fluid" style="min-height: 250px" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <h1 class="mb-0 f-s-45">{!! $product->title !!}</h1>
                        <p class="mb-0 f-s-20">By {{ $product->productAuthor->name }}</p>
                        <p class="mb-0">Category Name: @foreach($product->productCategories as $productCategory){{ $productCategory->name.' ' }}@endforeach</p>
                        @if($product->has_discount_validity == 'true')
                            <p class="f-s-20 mb-0" style="margin-right: 15px;">Price: <del class="text-danger">{{$product->price}} tk</del></p>
                            <p class="f-s-20 mb-0" style="">Discounted Price: {{$grandPrice = $product->price - $product->discount_amount}} tk</p>
                        @else
                            <h3 class="mb-0">{{$product->price}} tk</h3>
                        @endif
                        @php
                        $stockStatus = false;
                            if ($product->stock_amount > 0)
                            {
                                $stockStatus = true;
                            }
                        @endphp
                        @if($stockStatus == true)
                            <p class="text-success f-s-19">In Stock</p>
                        @else
                            <p class="text-danger f-s-19">Out Of Stock</p>
                        @endif
                        @if(!empty(\Cart::get($product->id)))
                            <a href="{{ route('front.view-cart') }}" class="default-btn">View cart</a>
                        @else
                            @if($stockStatus == true)
                            <form action="{{ route('front.add-to-cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                <input type="hidden" name="price" value="{{ $product->has_discount_validity == 'true' ? $grandPrice : $product->price }}" />
                                <button type="submit" class="default-btn">Add to cart</button>
                            </form>
                            @endif
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

                <div class="col-md-3">
                    <h2 class="text-center">Latest Products</h2>
                    <div class="mt-3">
                        @foreach($latestProducts as $latestProduct)
                            <div class="mt-2">
                                <a href="{{ route('front.product-details', ['id' => $latestProduct->id, 'slug' => $latestProduct->slug]) }}" class="w-100">
                                    <div class="card border-0">
                                        <div class="row">
                                            <div class="col-md-4 p-0 ps-1">
                                                <img src="{{ asset(isset($latestProduct->image) ? $latestProduct->image : 'frontend/logo/biddabari-card-logo.jpg') }}" alt="" class="img-fluid w-100" style="height: 100px" />
                                            </div>
                                            <div class="col-md-8">
                                                <h4>{{ $latestProduct->title }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
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
