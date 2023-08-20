@extends('frontend.master')

@section('body')

    <div class="inner-banner inner-banner-bg10 ">
        <div class="container">
            <div class="inner-title text-center">
                <h3>All Notice</h3>
                <ul>
                    <li>
                        <a href="{{ route('front.home') }}">Home</a>
                    </li>
                    <li>Notice</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="courses-area-two section-bg pt-100">
        <div class="container">
            <div class="section-title text-center mb-45">
                <!--   <span>কোর্স সমূহ</span>-->
                <h2> সকল নোটিশ  সমূহ</h2>
                <hr class="w-25 mx-auto bg-danger"/>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @forelse($notices as $notice)
                        <div class="courses-item notice-content">
                            <div class="content ">
                                <h3><a href="javascript:void(0)">{{ $notice->title }}</a></h3>
                                <span class="dis-course-amount">{!! $notice->body !!}</span>
                            </div>
                        </div>
                    @empty
                        <div class="courses-item notice-content">
                            <div class="content ">
                                <h3><a href="javascript:void(0)">No Notices Published Yet.</a></h3>
                            </div>
                        </div>
                    @endforelse
                    @if($notices->lastPage() > 1)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="pagination-area">
{{--                                    <a href="blog.html" class="prev page-numbers">--}}
{{--                                        <i class="flaticon-left-arrow"></i>--}}
{{--                                    </a>--}}
{{--                                    <span class="page-numbers current" aria-current="page">1</span>--}}
{{--                                    <a href="blog.html" class="page-numbers">2</a>--}}
{{--                                    <a href="blog.html" class="page-numbers">3</a>--}}
{{--                                    <a href="blog.html" class="next page-numbers">--}}
{{--                                        <i class="flaticon-chevron"></i>--}}
{{--                                    </a>--}}
                                    {{ $notices->links() }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!--            <div class="col-lg-4 col-md-12">-->
                <!--                <div class="courses-item">-->
                <!--                    <div class="content acme-news-ticker-box">-->
                <!--                        <ul class="notice-ticker">-->
                <!--                            <li>-->
                <!--                                <div class="card">-->
                <!--                                    <div class="card-body">-->
                <!--                                        <a href="#">প্রাইমারি বুলেট যমুনা লাইভ ব্যাচ-(৪)</a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <div class="card">-->
                <!--                                    <div class="card-body">-->
                <!--                                        <a href="#">প্রাইমারি বুলেট যমুনা লাইভ ব্যাচ-(৪)</a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <div class="card">-->
                <!--                                    <div class="card-body">-->
                <!--                                        <a href="#">প্রাইমারি বুলেট যমুনা লাইভ ব্যাচ-(৪)</a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </li>-->
                <!--                            <li>-->
                <!--                                <div class="card">-->
                <!--                                    <div class="card-body">-->
                <!--                                        <a href="#">প্রাইমারি বুলেট যমুনা লাইভ ব্যাচ-(৪)</a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </li>-->

                <!--                        </ul>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->

                <div class="col-lg-4 col-md-6">
{{--                    <div class="courses-item">--}}
{{--                        <a href="courses-details.html">--}}
{{--                            <img src="assets/images/courses/wVAD2nPNz8VlhQai62RKs37wZn7c8byY.jpg" alt="Courses" />--}}
{{--                        </a>--}}
{{--                        <div class="content">--}}
{{--                            <h3><a href="courses-details.html">প্রাইমারি বুলেট পদ্মা লাইভ ব্যাচ-৩</a></h3>--}}
{{--                            <ul class="course-list">--}}
{{--                                <li><i class="ri-time-fill"></i> 06 hr</li>--}}
{{--                                <li><i class="ri-vidicon-fill"></i> 10 lectures</li>--}}
{{--                                <li><i class="ri-file-pdf-line"></i> 10 PDF</li>--}}
{{--                                <li><i class="ri-a-b"></i> 10 Exam</li>--}}
{{--                                <li><i class="ri-store-3-line"></i>10 live class</li>--}}

{{--                            </ul>--}}
{{--                            <div class="price-box mb-2">--}}
{{--                                <div class="discount-time">--}}
{{--                                    <div class="countdown show" data-Date='2023/6/25 23:33:53'>--}}
{{--                                        <div class="running">--}}
{{--                                            <timer>--}}
{{--                                                <span class="days"></span><i>দিন</i>--}}
{{--                                                <span class="hours"></span><i>ঘণ্টা</i>--}}
{{--                                                <span class="minutes"></span><i>মিনিট</i>--}}
{{--                                                <span class="seconds"></span><i>সেকেন্ড বাকি</i>--}}
{{--                                            </timer>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
{{--                                <div class="dis-course-price">--}}
{{--                                    <p class="text-center"><span class="course-price">Course Fee  Tk <del>400</del> </span></p>--}}
{{--                                    <p class="text-center"><span class="dis-course-amount">After Discount 200 TK</span></p>--}}
{{--                                </div>--}}
{{--                                <hr>--}}

{{--                            </div>--}}
{{--                            <div class="bottom-content">--}}
{{--                                <a href="" class="btn btn-warning">বিস্তারিত দেখুন</a>--}}
{{--                                <div class="rating ">--}}
{{--                                    <a href="" class="btn btn-warning">কোর্সটি কিনুন</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="courses-item">--}}
{{--                        <a href="courses-details.html">--}}
{{--                            <img src="assets/images/courses/wVAD2nPNz8VlhQai62RKs37wZn7c8byY.jpg" alt="Courses" />--}}
{{--                        </a>--}}
{{--                        <div class="content">--}}
{{--                            <h3><a href="courses-details.html">প্রাইমারি বুলেট পদ্মা লাইভ ব্যাচ-৩</a></h3>--}}
{{--                            <ul class="course-list">--}}
{{--                                <li><i class="ri-time-fill"></i> 06 hr</li>--}}
{{--                                <li><i class="ri-vidicon-fill"></i> 10 lectures</li>--}}
{{--                                <li><i class="ri-file-pdf-line"></i> 10 PDF</li>--}}
{{--                                <li><i class="ri-a-b"></i> 10 Exam</li>--}}
{{--                                <li><i class="ri-store-3-line"></i>10 live class</li>--}}

{{--                            </ul>--}}
{{--                            <div class="price-box mb-2">--}}
{{--                                <div class="discount-time">--}}
{{--                                    <div class="countdown show" data-Date='2023/6/25 23:33:53'>--}}
{{--                                        <div class="running">--}}
{{--                                            <timer>--}}
{{--                                                <span class="days"></span><i>দিন</i>--}}
{{--                                                <span class="hours"></span><i>ঘণ্টা</i>--}}
{{--                                                <span class="minutes"></span><i>মিনিট</i>--}}
{{--                                                <span class="seconds"></span><i>সেকেন্ড বাকি</i>--}}
{{--                                            </timer>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
{{--                                <div class="dis-course-price">--}}
{{--                                    <p class="text-center"><span class="course-price">Course Fee  Tk <del>400</del> </span></p>--}}
{{--                                    <p class="text-center"><span class="dis-course-amount">After Discount 200 TK</span></p>--}}
{{--                                </div>--}}
{{--                                <hr>--}}

{{--                            </div>--}}
{{--                            <div class="bottom-content">--}}
{{--                                <a href="" class="btn btn-warning">বিস্তারিত দেখুন</a>--}}
{{--                                <div class="rating ">--}}
{{--                                    <a href="" class="btn btn-warning">কোর্সটি কিনুন</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
