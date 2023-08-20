@extends('frontend.master')

@section('body')


    <div class="inner-banner inner-banner-bg5">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Blog Category </h3>
                <ul>
                    <li>
                        <a href="{{ route('front.home') }}">Home</a>
                    </li>
                    <li>{{ $blogCategory->name }} Blogs </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="blog-widget-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        @forelse($blogs as $blog)
                        <div class="col-md-4 col-sm-6">
                            <div class="blog-card">
                                <a href="{{ route('front.blog-details', ['id' => $blog->id, 'slug' => $blog->slug]) }}">
                                    <img src="{{ asset($blog->image) }}" alt="Blog" class="w-100 img-fluid" style="height: 280px" />
                                </a>
                                <div class="content">
                                    <ul>
                                        <li><i class="ri-calendar-todo-fill"></i> {{ $blog->created_at->format('M d, Y') }} </li>
                                        <li><i class="ri-price-tag-3-fill"></i> <a href="{{ route('front.category-blogs', ['id' => $blog->blogCategory->id, 'slug' => $blog->blogCategory->slug]) }}">{{ $blog->blogCategory->name }}</a></li>
                                    </ul>
                                    <h3><a href="{{ route('front.blog-details', ['id' => $blog->id, 'slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
                                    <p>{!! str()->words($blog->body, 8) !!}</p>
                                    <a href="{{ route('front.blog-details', ['id' => $blog->id, 'slug' => $blog->slug]) }}" class="read-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <h2 class="text-center">No Blogs Published Yet.</h2>
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
                            @if($blogs->lastPage() > 1 )
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
                                        {{ $blogs->links() }}
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
