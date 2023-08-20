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
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-img1.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Sally welch</a></h3>
                            <span>Web designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-img2.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Jesse joslin</a></h3>
                            <span>Content strategist</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-img3.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Lance altman</a></h3>
                            <span>Photographer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-img4.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Jonquil von</a></h3>
                            <span>Art director</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-img5.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Oliva welch</a></h3>
                            <span>Web designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-img6.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Carol owens</a></h3>
                            <span>Chief programmer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-img7.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Jessica calabrese</a></h3>
                            <span>Creative writer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-img8.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">David charest</a></h3>
                            <span>Marketing director</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 text-center">
                    <div class="pagination-area">
                        <a href="instructors.html" class="prev page-numbers">
                            <i class="flaticon-left-arrow"></i>
                        </a>
                        <span class="page-numbers current" aria-current="page">1</span>
                        <a href="instructors.html" class="page-numbers">2</a>
                        <a href="instructors.html" class="page-numbers">3</a>
                        <a href="instructors.html" class="next page-numbers">
                            <i class="flaticon-chevron"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
