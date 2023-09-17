@extends('frontend.master')

@section('body')

{{--    <div class="inner-banner inner-banner-bg11">--}}
{{--        <div class="container">--}}
{{--            <div class="inner-title text-center">--}}
{{--                <h3>These are our instructors</h3>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('front.home') }}">Home</a>--}}
{{--                    </li>--}}
{{--                    <li>Instructors</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="instructors-area instructors-area-rs py-3">
        <div class="container">
            <div class="section-title text-center mb-30">
                <h2>Meet our top instructor</h2>
            </div>
            <div class="row justify-content-center">
                @forelse($teachers as $teacher)
                    <div class="col-lg-3 col-md-6">
                        <div class="instructors-card ab-shadow">
                            <a href="{{ route('front.instructor-details', ['id' => $teacher->id, 'slug' => str_replace(' ', '-', $teacher->name)]) }}">
                                <img src="{{ asset(isset($teacher->image) ? '' : 'https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg' ) }}" alt="Team Images">
                            </a>
                            <div class="content py-1">
{{--                                <ul class="instructors-social">--}}
{{--                                    <li class="share-btn"><i class="ri-add-line"></i></li>--}}
{{--                                    <li>--}}
{{--                                        <a href="https://www.facebook.com/" target="_blank">--}}
{{--                                            <i class="ri-facebook-fill"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="https://www.instagram.com/" target="_blank">--}}
{{--                                            <i class="ri-instagram-line"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="https://twitter.com/" target="_blank">--}}
{{--                                            <i class="ri-twitter-fill"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="https://www.linkedin.com/" target="_blank">--}}
{{--                                            <i class="ri-linkedin-box-line"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                                <h3><a href="{{ route('front.instructor-details', ['id' => $teacher->id, 'slug' => str_replace(' ', '-', $teacher->name)]) }}">{{ $teacher->user->name }}</a></h3>
                                <span>{{ $teacher->subject }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="card card-body">
                            <p class="text-center fw-bolder">No Instructor Found</p>
                        </div>
                    </div>
                @endforelse
                <div class="col-lg-12 col-md-12 text-center">
                    <div class="pagination-area">
{{--                        <a href="instructors.html" class="prev page-numbers">--}}
{{--                            <i class="flaticon-left-arrow"></i>--}}
{{--                        </a>--}}
{{--                        <span class="page-numbers current" aria-current="page">1</span>--}}
{{--                        <a href="instructors.html" class="page-numbers">2</a>--}}
{{--                        <a href="instructors.html" class="page-numbers">3</a>--}}
{{--                        <a href="instructors.html" class="next page-numbers">--}}
{{--                            <i class="flaticon-chevron"></i>--}}
{{--                        </a>--}}
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
