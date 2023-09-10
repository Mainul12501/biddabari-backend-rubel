@extends('frontend.master')

@section('body')


{{--    <div class="inner-banner inner-banner-bg5">--}}
{{--        <div class="container">--}}
{{--            <div class="inner-title text-center">--}}
{{--                <h3>All Blogs </h3>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('front.home') }}">Home</a>--}}
{{--                    </li>--}}
{{--                    <li>Blogs </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="blog-widget-area pt-100 pb-70">
        <div class="container">
            <div class="row">
{{--                <div class="col-lg-3">--}}
{{--                    <div class="side-bar-area pr-20">--}}
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
{{--                                    @forelse($blogCategories as $blogCategory)--}}
{{--                                        <li>--}}
{{--                                            <a href="{{ route('front.category-blogs', ['id' => $blogCategory->id,'slug' => $blogCategory->slug]) }}" target="_blank">--}}
{{--                                                {{ $blogCategory->name }}--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    @empty--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0)" target="_blank">--}}
{{--                                                No Categories Available--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    @endforelse--}}
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
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        @forelse($blogs as $blog)
                            <div class="col-lg-4 col-md-4 mt-3">
                                <a href="{{ route('front.blog-details', ['id' => $blog->id,'slug' => $blog->slug]) }}" class="w-100">
                                    <div class="blog-card">
                                            <img src="{{ asset($blog->image) }}" alt="Blog" class="w-100 img-fluid" style="height: 280px" />
                                        <div class="content">
                                            <ul>
                                                <li><i class="ri-calendar-todo-fill"></i> {{ $blog->created_at->format('M d, Y') }} </li>
    {{--                                            <li><i class="ri-price-tag-3-fill"></i> <a href="{{ route('front.category-blogs', ['id' => $blog->blogCategory->id,'slug' => $blog->blogCategory->slug]) }}">{{ $blog->blogCategory->name }}</a></li>--}}
                                                <li><i class="ri-price-tag-3-fill"></i> <span >{{ $blog->blogCategory->name }}</span></li>
                                            </ul>
                                            <h3>
                                                {{ $blog->title }}
                                            </h3>
                                            <p>{!! str()->words(strip_tags($blog->body), 8) !!}</p>
                                            <button type="button" class="read-btn">Read More</button>
                                        </div>
                                    </div>
                                </a>
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

@push('script')
    <script>
        function equalheight() {
            var maxHeight = 0;
            $('.blog-card').each(function (index) {
                if ($(this).height() > maxHeight)
                    maxHeight = $(this).height();
            });
            $('.blog-card').height(maxHeight);
        }
        $(document).ready(function () {
            equalheight();
        });
    </script>
@endpush
