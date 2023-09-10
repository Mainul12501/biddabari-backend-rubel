@extends('frontend.master')

@section('body')
    <div class="courses-area-two section-bg ">
        <div class="container bg-white  pb-70 ps-3">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="text-center mb-5">
                        <a href="javascript:void(0)" class="btn border-main-color"><span class="fw-bolder fs-2">আমাদের বই সমূহ</span></a>
                    </div>
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-md-3 col-sm-6 px-3 mt-3">
                                <a href="{{ route('front.product-details', ['id' => $product->id, 'slug' => $product->slug]) }}" class="w-100">
                                    <div class="courses-item pb-0">
                                        <img src="{{ !empty($product->image) ? asset($product->image) : asset('/frontend/logo/biddabari-card-logo.jpg') }}" alt="Batch Exams" class="w-100" style="height: 230px"/>
                                        <div class="px-3 pt-3">
                                            <h3 class="f-s-26">{{ $product->title }}</h3>
                                            <p class="f-s-20">Author: {{ $product->productAuthor->name }}</p>
                                        </div>
                                        <div class="px-3 pb-3">
                                            <p class="mb-0 text-center f-s-20">
                                                @if($product->has_discount_validity == 'true')
                                                    <span class="text-danger">৳ <del>{{ round($product->price) }}</del></span>
                                                @endif
                                                <span>৳ {{ $product->price - $product->discount_amount }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="text-center">
                                    <h2>কোনো বই চালু হয়নি।  খুব দ্রুত এক্সাম চালু হবে। </h2>
                                </div>
                            </div>
                        @endforelse
                        @if(count($products) > 0)
                            <div class="col-md-12 mt-5">
                                <div class="text-center">
{{--                                    {{ $products->links() }}--}}
                                </div>
                            </div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
@endpush

@section('js')
@endsection
