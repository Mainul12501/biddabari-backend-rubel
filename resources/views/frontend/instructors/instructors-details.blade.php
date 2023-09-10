@extends('frontend.master')

@section('body')

{{--    <div class="inner-banner inner-banner-bg12">--}}
{{--        <div class="container">--}}
{{--            <div class="inner-title text-center">--}}
{{--                <h3>About instructors</h3>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="index.html">Home</a>--}}
{{--                    </li>--}}
{{--                    <li> Instructors Details</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="instructors-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="instructors-details-img">
                        <img src="{{ asset(isset($teacher->image) ? $teacher->image : 'frontend/assets/images/instructors/instructors-details.jpg') }}" alt="Instructor" />
                        <ul class="social-link">
                            <li class="social-title">Follow me:</li>
                            <li>
                                <a href="{{ $teacher->facebook }}" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $teacher->twitter }}" target="_blank">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $teacher->linkedin }}" target="_blank">
                                    <i class="ri-linkedin-line"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="instructors-details-content pl-20">
                        <h3 class="f-s-39">{{ $teacher->first_name. ' ' . $teacher->last_name }}</h3>
                        <span class="sub-title f-s-24">{{ $teacher->subject }}</span>
                        <ul>
                            <li class="f-s-22 mb-0">Phone number: <span><a href="tel:{{ $teacher->mobile }}">{{ $teacher->mobile }} </a></span></li>
                            <li class="f-s-22 mb-0">Email: <span><a href="mailto:{{ $teacher->email }}"><span class="__cf_email__">{{ $teacher->email }}</span></a></span></li>
                            <li class="f-s-22 mb-0">Website: <span><a href="{{ $teacher->website }}" target="_blank">{{ $teacher->website }}</a></span></li>
{{--                            <li>Total students: <span>500</span></li>--}}
{{--                            <li>Reviews: <span><i class="ri-star-fill"></i>4k+ rating</span></li>--}}
{{--                            <li>Courses taken: <span>20</span></li>--}}
                        </ul>
                        {!! $teacher->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="courses-area pb-70">
        <div class="container">
            <div class="section-title text-center mb-45">
                <h2>Find Latest courses</h2>
{{--                <p>--}}
{{--                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut--}}
{{--                    labore et dolore magna aliqua. Ut enim ad minim veniam.--}}
{{--                </p>--}}
            </div>
            <div class="row">
                @foreach($latestCourses as $latestCourse)
                <div class="col-lg-4 col-md-6">
                    <div class="courses-item">
                        <a href="{{ route('front.course-details',['id' => $latestCourse->id, 'slug' => $latestCourse->slug]) }}">
                            <img src="{{ asset(isset($latestCourse->banner) ? $latestCourse->banner : '/frontend/logo/biddabari-card-logo.jpg') }}" alt="Courses" />
                        </a>
                        <div class="content">
{{--                            <a href="javascript:void(0)" class="tag-btn">Design</a>--}}
                            <div class="price-text">BDT. {{ $latestCourse->price }}</div>
                            <h3><a href="{{ route('front.course-details',['id' => $latestCourse->id, 'slug' => $latestCourse->slug]) }}">{{ $latestCourse->title }}</a></h3>
                            <ul class="course-list">
                                <li><i class="ri-time-fill"></i> {{ $latestCourse->total_hours }} min</li>
                                <li><i class="ri-vidicon-fill"></i> {{ $latestCourse->total_video }} lectures</li>
                            </ul>
{{--                            <div class="bottom-content">--}}
{{--                                <a href="instructors-details.html" class="user-area">--}}
{{--                                    <img src="{{ asset('/') }}frontend/assets/images/courses/courses-instructors1.jpg" alt="Instructors">--}}
{{--                                    <h3>David warner</h3>--}}
{{--                                </a>--}}
{{--                                <div class="rating">--}}
{{--                                    <i class="ri-star-fill"></i>4k+ rating--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
