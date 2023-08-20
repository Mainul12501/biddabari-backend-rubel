@extends('frontend.master')

@section('body')

    <div class="container">
        <div class="inner-title text-center">
            <p style="margin: 30px 0; font-size: 50px; color: black;"> <span style="padding: 5px 10px; border: 1px solid #f38344; border-radius: 20px;">জব সার্কুলার </span></p>
        </div>
    </div>

    <div class="blog-widget-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        @forelse($circulars as $circular)
                            <div class="col-lg-4 col-md-6">
                                <div class="card h-100 d-flex align-items-stretch" style="border: none; border-radius: 20px 20px 0 0">
                                    <a href="{{ route('front.job-circular-details', ['id' => $circular->id,'slug' => $circular->slug]) }}">
                                        <img src="{{ asset(!empty($circular->image) ? $circular->image : 'frontend/assets/images/biddabari-image.jpg') }}" alt="Circular" class="w-100 img-fluid" style="height: 250px; border-radius: 20px 20px 0 0" />
                                    </a>
                                    <div class="card-body" style="background-color: #fef4f2;">
                                        <p style="color: #0a080e" class="f-s-18">{{ $circular->circularCategory->title }}</p>
                                        <h3 class="f-s-28"><a href="{{ route('front.job-circular-details', ['id' => $circular->id, 'slug' => $circular->slug]) }}" style="color: #0a080e;">{{ $circular->post_title }}</a></h3>
                                        <p class="f-s-21">{{ $circular->job_title }}</p>
                                    </div>
                                    <div class="card-footer position-relative" style="border-radius: 0 0 20px 20px; background-color: #fcd9c6;">
                                        <h3 style="color: #5c636a; margin: 0; font-size: 25px">{{ $circular->user->name }}</h3>
                                        <p style="margin: 0; font-size: 19px; color: #f38344;">{{ \Carbon\Carbon::parse($circular->created_at)->format('M d, Y') }}</p>
                                        <a href="{{ route('front.job-circular-details', ['id' => $circular->id, 'slug' => $circular->slug]) }}" class="btn btn-light position-absolute end-0 me-3" style="top: 20%">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <h2 class="text-center">No Job Circulars Published Yet.</h2>
                                </div>
                            </div>
                        @endforelse
                        {{--                        <div class="col-lg-6 col-md-6">--}}
                        {{--                            <div class="blog-card">--}}
                        {{--                                <a href="single-blog-1.html">--}}
                        {{--                                    <img src="{{ asset('/') }}frontend/assets/images/blog/blog-img2.jpg" alt="Blog">--}}
                        {{--                                </a>--}}
                        {{--                                <div class="content">--}}
                        {{--                                    <ul>--}}
                        {{--                                        <li><i class="ri-calendar-todo-fill"></i> Jan 13,2022 </li>--}}
                        {{--                                        <li><i class="ri-price-tag-3-fill"></i> <a href="tags.html">learning</a></li>--}}
                        {{--                                    </ul>--}}
                        {{--                                    <h3><a href="single-blog-1.html">How to use technology to adapt your talent to the world</a></h3>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>--}}
                        {{--                                    <a href="single-blog-1.html" class="read-btn">Read More</a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-lg-6 col-md-6">--}}
                        {{--                            <div class="blog-card">--}}
                        {{--                                <a href="single-blog-1.html">--}}
                        {{--                                    <img src="{{ asset('/') }}frontend/assets/images/blog/blog-img3.jpg" alt="Blog">--}}
                        {{--                                </a>--}}
                        {{--                                <div class="content">--}}
                        {{--                                    <ul>--}}
                        {{--                                        <li><i class="ri-calendar-todo-fill"></i> Jan 15,2022 </li>--}}
                        {{--                                        <li><i class="ri-price-tag-3-fill"></i> <a href="tags.html">Courses</a></li>--}}
                        {{--                                    </ul>--}}
                        {{--                                    <h3><a href="single-blog-1.html">5 simple steps how to become a web developer</a></h3>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>--}}
                        {{--                                    <a href="single-blog-1.html" class="read-btn">Read More</a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-lg-6 col-md-6">--}}
                        {{--                            <div class="blog-card">--}}
                        {{--                                <a href="single-blog-1.html">--}}
                        {{--                                    <img src="{{ asset('/') }}frontend/assets/images/blog/blog-img4.jpg" alt="Blog">--}}
                        {{--                                </a>--}}
                        {{--                                <div class="content">--}}
                        {{--                                    <ul>--}}
                        {{--                                        <li><i class="ri-calendar-todo-fill"></i> Jan 17,2022 </li>--}}
                        {{--                                        <li><i class="ri-price-tag-3-fill"></i> <a href="tags.html">Courses</a></li>--}}
                        {{--                                    </ul>--}}
                        {{--                                    <h3><a href="single-blog-1.html">Here are the things to look for when selecting an online course</a></h3>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>--}}
                        {{--                                    <a href="single-blog-1.html" class="read-btn">Read More</a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-lg-6 col-md-6">--}}
                        {{--                            <div class="blog-card">--}}
                        {{--                                <a href="single-blog-1.html">--}}
                        {{--                                    <img src="{{ asset('/') }}frontend/assets/images/blog/blog-img5.jpg" alt="Blog">--}}
                        {{--                                </a>--}}
                        {{--                                <div class="content">--}}
                        {{--                                    <ul>--}}
                        {{--                                        <li><i class="ri-calendar-todo-fill"></i> Jan 19,2022 </li>--}}
                        {{--                                        <li><i class="ri-price-tag-3-fill"></i> <a href="tags.html">Virtual</a></li>--}}
                        {{--                                    </ul>--}}
                        {{--                                    <h3><a href="single-blog-1.html">In person, virtual or hybrid: helpful tools for back to school</a></h3>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>--}}
                        {{--                                    <a href="single-blog-1.html" class="read-btn">Read More</a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-lg-6 col-md-6">--}}
                        {{--                            <div class="blog-card">--}}
                        {{--                                <a href="single-blog-1.html">--}}
                        {{--                                    <img src="{{ asset('/') }}frontend/assets/images/blog/blog-img6.jpg" alt="Blog">--}}
                        {{--                                </a>--}}
                        {{--                                <div class="content">--}}
                        {{--                                    <ul>--}}
                        {{--                                        <li><i class="ri-calendar-todo-fill"></i> Jan 23,2022 </li>--}}
                        {{--                                        <li><i class="ri-price-tag-3-fill"></i> <a href="tags.html">Operating</a></li>--}}
                        {{--                                    </ul>--}}
                        {{--                                    <h3><a href="single-blog-1.html">Standard operating procedures (sop) changes with an lms</a></h3>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>--}}
                        {{--                                    <a href="single-blog-1.html" class="read-btn">Read More</a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        @if($circulars->lastPage() > 1 )
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="pagination-area">
                                    {{--                                        <a href="blog-2.html" class="prev page-numbers">--}}
                                    {{--                                            <i class="flaticon-left-arrow"></i>--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <span class="page-numbers current" aria-current="page">1</span>--}}
                                    {{--                                        <a href="blog-2.html" class="page-numbers">2</a>--}}
                                    {{--                                        <a href="blog-2.html" class="page-numbers">3</a>--}}
                                    {{--                                        <a href="blog-2.html" class="next page-numbers">--}}
                                    {{--                                            <i class="flaticon-chevron"></i>--}}
                                    {{--                                        </a>--}}
                                    {{ $circulars->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
