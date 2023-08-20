@extends('frontend.master')

@section('body')

    <div class="inner-banner inner-banner-bg12">
        <div class="container">
            <div class="inner-title text-center">
                <h3>About instructors</h3>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li> Instructors Details</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="instructors-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="instructors-details-img">
                        <img src="{{ asset('/') }}frontend/assets/images/instructors/instructors-details.jpg" alt="Instructor" />
                        <ul class="social-link">
                            <li class="social-title">Follow me:</li>
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.pinterest.com/" target="_blank">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="instructors-details-content pl-20">
                        <h3>Sally welch</h3>
                        <span class="sub-title">Web designer</span>
                        <ul>
                            <li>Phone number: <span><a href="tel:+1(135)19842020">+1(135) 1984 2020 </a></span></li>
                            <li>Email: <span><a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#deb6bbb2b2b19eb2bbbaabf0bdb1b3"><span class="__cf_email__" data-cfemail="a5cdc0c9c9cae5c9c0c1d08bc6cac8">[email&#160;protected]</span></a></span></li>
                            <li>Website: <span><a href="www.ledu.html">www.ledu.com</a></span></li>
                            <li>Total students: <span>500</span></li>
                            <li>Reviews: <span><i class="ri-star-fill"></i>4k+ rating</span></li>
                            <li>Courses taken: <span>20</span></li>
                        </ul>
                        <p>
                            Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a
                            pellentesque egestas Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed
                            magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
                        </p>
                        <p>
                            Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="courses-area pb-70">
        <div class="container">
            <div class="section-title text-center mb-45">
                <h2>Find popular courses</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="courses-item">
                        <a href="courses-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/courses-img1.jpg" alt="Courses" />
                        </a>
                        <div class="content">
                            <a href="courses.html" class="tag-btn">Design</a>
                            <div class="price-text">$120</div>
                            <h3><a href="courses-details.html">UI/UX design pattern for succesfull software applications</a></h3>
                            <ul class="course-list">
                                <li><i class="ri-time-fill"></i> 10 hr 07 min</li>
                                <li><i class="ri-vidicon-fill"></i> 67 lectures</li>
                            </ul>
                            <div class="bottom-content">
                                <a href="instructors-details.html" class="user-area">
                                    <img src="{{ asset('/') }}frontend/assets/images/courses/courses-instructors1.jpg" alt="Instructors">
                                    <h3>David warner</h3>
                                </a>
                                <div class="rating">
                                    <i class="ri-star-fill"></i>4k+ rating
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="courses-item">
                        <a href="courses-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/courses-img2.jpg" alt="Courses" />
                        </a>
                        <div class="content">
                            <a href="courses.html" class="tag-btn">Accounting</a>
                            <div class="price-text">$129</div>
                            <h3><a href="courses-details.html">Basic knowledge about hodiernal bharat in history</a></h3>
                            <ul class="course-list">
                                <li><i class="ri-time-fill"></i> 04 hr 07 min</li>
                                <li><i class="ri-vidicon-fill"></i> 27 lectures</li>
                            </ul>
                            <div class="bottom-content">
                                <a href="instructors-details.html" class="user-area">
                                    <img src="{{ asset('/') }}frontend/assets/images/courses/courses-instructors2.jpg" alt="Instructors">
                                    <h3>David malan</h3>
                                </a>
                                <div class="rating">
                                    <i class="ri-star-fill"></i>2k+ rating
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="courses-item">
                        <a href="courses-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/courses-img3.jpg" alt="Courses" />
                        </a>
                        <div class="content">
                            <a href="courses.html" class="tag-btn">Physics</a>
                            <div class="price-text">$100</div>
                            <h3><a href="courses-details.html">Visual effects for games in unity beginner to intermediate</a></h3>
                            <ul class="course-list">
                                <li><i class="ri-time-fill"></i> 02 hr 00 min</li>
                                <li><i class="ri-vidicon-fill"></i> 17 lectures</li>
                            </ul>
                            <div class="bottom-content">
                                <a href="instructors-details.html" class="user-area">
                                    <img src="{{ asset('/') }}frontend/assets/images/courses/courses-instructors3.jpg" alt="Instructors">
                                    <h3>Emma jhonson</h3>
                                </a>
                                <div class="rating">
                                    <i class="ri-star-fill"></i>1k+ rating
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="courses-item">
                        <a href="courses-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/courses-img4.jpg" alt="Courses" />
                        </a>
                        <div class="content">
                            <a href="courses.html" class="tag-btn">Business</a>
                            <div class="price-text">$140</div>
                            <h3><a href="courses-details.html">The complete accounting & bank financial course 2021</a></h3>
                            <ul class="course-list">
                                <li><i class="ri-time-fill"></i> 04 hr 00 min</li>
                                <li><i class="ri-vidicon-fill"></i> 07 lectures</li>
                            </ul>
                            <div class="bottom-content">
                                <a href="instructors-details.html" class="user-area">
                                    <img src="{{ asset('/') }}frontend/assets/images/courses/courses-instructors4.jpg" alt="Instructors">
                                    <h3>Jesse joslin</h3>
                                </a>
                                <div class="rating">
                                    <i class="ri-star-fill"></i>7k+ rating
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="courses-item">
                        <a href="courses-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/courses-img5.jpg" alt="Courses" />
                        </a>
                        <div class="content">
                            <a href="courses.html" class="tag-btn">Finance</a>
                            <div class="price-text">$159</div>
                            <h3><a href="courses-details.html">The complete business plan course includes 50 templates</a></h3>
                            <ul class="course-list">
                                <li><i class="ri-time-fill"></i> 03 hr 00 min</li>
                                <li><i class="ri-vidicon-fill"></i> 17 lectures</li>
                            </ul>
                            <div class="bottom-content">
                                <a href="instructors-details.html" class="user-area">
                                    <img src="{{ asset('/') }}frontend/assets/images/courses/courses-instructors5.jpg" alt="Instructors">
                                    <h3>Lance altman</h3>
                                </a>
                                <div class="rating">
                                    <i class="ri-star-fill"></i>5k+ rating
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="courses-item">
                        <a href="courses-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/courses-img6.jpg" alt="Courses" />
                        </a>
                        <div class="content">
                            <a href="courses.html" class="tag-btn">Banking</a>
                            <div class="price-text">$200</div>
                            <h3><a href="courses-details.html">Full web designing course with 20 web template designing</a></h3>
                            <ul class="course-list">
                                <li><i class="ri-time-fill"></i> 06 hr 00 min</li>
                                <li><i class="ri-vidicon-fill"></i> 10 lectures</li>
                            </ul>
                            <div class="bottom-content">
                                <a href="instructors-details.html" class="user-area">
                                    <img src="{{ asset('/') }}frontend/assets/images/courses/courses-instructors6.jpg" alt="Instructors">
                                    <h3>Altman lucas </h3>
                                </a>
                                <div class="rating">
                                    <i class="ri-star-fill"></i>3k+ rating
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
