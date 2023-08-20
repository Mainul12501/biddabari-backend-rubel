@extends('frontend.master')

@section('body')
    <div class="hero-slider-area">
        <div class="hero-slider owl-carousel owl-theme">
            @foreach($homeSliderCourses as $homeSliderCourse)
                <div class="hero-item">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 c-dnone">
                                <div class="hero-content ms-3">
                                    <h1>{{ $homeSliderCourse->title }}</h1>
                                    <p>
                                        {!! str()->words(strip_tags($homeSliderCourse->description), 25) !!}
                                    </p>
                                    <div class="banner-btn">
{{--                                        <a href="{{ route('front.course-details', ['id' => $homeSliderCourse->id, 'slug' => $homeSliderCourse->slug]) }}" class="default-btn border-radius-50">Read More</a>--}}
                                        <a href="{{ $homeSliderCourse->link }}" class="default-btn border-radius-50">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
{{--                                    <a href="{{ route('front.course-details', ['id' => $homeSliderCourse->id, 'slug' => $homeSliderCourse->slug]) }}" ><img src="{{ asset($homeSliderCourse->image) }}" class="w-100" alt="Home Slider"/></a>--}}
                                    <a href="javascript:void(0)" ><img src="{{ asset($homeSliderCourse->image) }}" class="w-100" alt="Home Slider"/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="featured-area pt-2 pb-3">
        <div class="container">
            <div class="row align-items-center mb-45"></div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="featured-item-two">
                        <a href="javascript:void(0)" class="p-2">
                            <i class="flaticon-web-development"></i>
                            <h3>আজকের ক্লাস</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="featured-item-two">
                        <a href="javascript:void(0)" class="p-2">
                            <i class="flaticon-design"></i>
                            <h3>আজকের এক্সাম</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="featured-item-two">
                        <a href="javascript:void(0)" class="p-2">
                            <i class="flaticon-wellness"></i>
                            <h3>লাইভ এসাইনমেন্ট</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="featured-item-two">
                        <a href="javascript:void(0)" class="p-2">
                            <i class="flaticon-heart-beat"></i>
                            <h3>গাইড লাইন</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="featured-item-two">
                        <a href="javascript:void(0)" class="p-2">
                            <i class="flaticon-corporate"></i>
                            <h3>শিক্ষকবৃন্দ</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="featured-item-two">
                        <a href="javascript:void(0)" class="p-2">
                            <i class="flaticon-camera"></i>
                            <h3>শিক্ষার্থীর মন্তব্য</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="featured-item-two">
                        <a href="javascript:void(0)" class="p-2">
                            <i class="flaticon-user"></i>
                            <h3>ফটো গ্যালারি</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="featured-item-two">
                        <a href="javascript:void(0)" class="p-2">
                            <i class="flaticon-folder"></i>
                            <h3>জব সার্কুলার</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(!empty($courseCategories))
        <div class="categories-area section-bg py-5">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <!--   <h2>কোর্স  <b>ক্যাটাগরি</b></h2>-->
                    <h2>কোর্স  <b>ক্যাটাগরি সমূহ</b></h2>
                    <hr class="w-25 mx-auto bg-danger"/>
                </div>

                <div class="row">
                    @foreach($courseCategories as $courseCategory)
                        <div class="col-md-3">
                            <div class="categories-item" >
                                <a href="{{ route('front.category-courses', ['id' => $courseCategory->id, 'slug' => $courseCategory->slug]) }}">
                                    <img src="{{ asset($courseCategory->image) }}" alt="Categories" class="w-100 border-0" style="height: 200px">
                                </a>
                                <div class="content">
                                    <a href="{{ route('front.category-courses', ['id' => $courseCategory->id, 'slug' => $courseCategory->slug]) }}">
                                        <i class="{{ $courseCategory->icon ?? 'flaticon-web-development' }}"></i>
                                        <h3>{{ $courseCategory->name ?? 'No Title' }}</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if(!empty($courses))
        <div class="courses-area-two py-5">
            <div class="container">
                <div class="section-title text-center mb-45">
                    <!--   <span>কোর্স সমূহ</span>-->
                    <h2>চলমান কোর্স সমূহ</h2>
                    <h5>ভর্তি চলছে ... !!!</h5>
                    <hr class="w-25 mx-auto bg-danger"/>
                </div>
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="courses-item">
                                <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">
                                    <img src="{{ asset($course->banner) }}" alt="Courses" class="w-100" style="height: 230px"/>
                                </a>
                                <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">
                                    <div class="content">
                                        <h3><a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">{{ $course->title }}</a></h3>
                                        <ul class="course-list">
                                            {{--                                        <li><i class="ri-time-fill"></i> 06 hr</li>--}}
                                            <li><i class="ri-vidicon-fill"></i> {{ $course->total_note ?? 0 }} lectures</li>
                                            <li><i class="ri-file-pdf-line"></i> {{ $course->total_pdf ?? 0 }} PDF</li>
                                            <li><i class="ri-a-b"></i> {{ $course->total_exam ?? 0 }} Exam</li>
                                            <li><i class="ri-store-3-line"></i>{{ $course->total_live ?? 0 }} live class</li>
                                            <div class="dis-course-price">
                                                @if($course->discount_type == 1 || $course->discount_type == 2)
                                                    <span class="course-price"> ৳ <del>{{ $course->price }} </del> </span>
                                                    <!--<span class="dis-course-amount">৳ {{ $course->discount_type == 1 ? $course->price - $course->discount_amount : ($course->price - ($course->price * $course->discount_amount)/100) }}</span>-->
                                                    <span class="dis-course-amount">৳ {{  $course->price-$course->discount_amount }}</span>
                                                @else
                                                    <span class="dis-course-amount"> ৳ {{ $course->price }} </span>
                                                @endif
                                            </div>
                                        </ul>
                                        <div class="bottom-content">
                                            <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}" class="btn btn-warning">বিস্তারিত দেখুন</a>
                                                <div class="rating ">
                                                    @if($course->order_status == 'true')
                                                        <a href="javascript:void(0)" class="btn text-success">Active</a>
                                                    @elseif($course->order_status == 'pending')
                                                        <a href="javascript:void(0)" class="btn text-success">Pending</a>
                                                    @else
                                                        <a href="{{ route('front.checkout', ['id' => $course->id, 'slug' => $course->slug]) }}" class="btn btn-warning">কোর্সটি কিনুন</a>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="counter-area pt-5 pb-4" style="background-color: #F18345 !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6 col-md-3">
                    <div class="counter-content">
                        <i class="flaticon-online-course"></i>
                        <h3><span class="odometer" data-count="15000">00000</span>+</h3>
                        <p>Courses & videos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 col-md-3">
                    <div class="counter-content">
                        <i class="flaticon-student"></i>
                        <h3><span class="odometer" data-count="145000">000000</span>+</h3>
                        <p>Students enrolled</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 col-md-3">
                    <div class="counter-content">
                        <i class="flaticon-online-course-1"></i>
                        <h3><span class="odometer" data-count="10000">00000</span>+</h3>
                        <p>Courses instructors</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 col-md-3">
                    <div class="counter-content">
                        <i class="flaticon-customer-satisfaction"></i>
                        <h3><span class="odometer" data-count="100">000</span>%</h3>
                        <p>Satisfaction rate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5 section-bg">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12 mb-4">
                    <div class="section-title text-center">
                        <h2 class="">আমাদের কথা</h2>
                        <hr class="w-25 mx-auto bg-danger"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card video content-shadow">
                        <video class="w-100" height="500" controls>
                            <source src="{{ asset('/') }}frontend/assets/video/BiddabariApps.mp4" type="video/mp4">
                        </video>
                    </div>
                <!--    <iframe src="{{ asset('/') }}frontend/assets/video/BiddabariApps.mp4" frameborder="0"></iframe>-->
                </div>
                <div class="col-lg-6">
                    <div class="card card-body rounded-0 our-speech content-shadow">
                        <h3>"প্রস্তুতি হলে স্মার্ট, ৪৫ তম বিসিএস প্রিলি. হবে পাশ"</h3>
                        <p>📌 ৪৫ তম BCS প্রিলি. পরীক্ষায় টার্গেট মার্কস নিশ্চিত করতে বিদ্যাবাড়ির বিশেষ আয়োজন:</p>
                        <h4>"45 BCS Preli. Crash Batch With Exams"</h4>
                        <p>🔥 ৪৫তম BCS প্রিলি. পরীক্ষা হওয়ার কথা মার্চের দ্বিতীয় সপ্তাহে ‼</p>
                        <p>প্রিলি. পরীক্ষার টার্গেট মার্কস (১৪০+) নিশ্চিত করতে এই শেষ সময়ে দরকার সঠিক পরিকল্পনা মাফিক বারবার রিভিশন এবং প্রচুর মডেল এক্সামে অংশগ্রহণ করা।</p>
                        <p>💥 শেষ সময়ে আমাদের সেরা স্যারদের সব ক্লাস একসাথে পেয়ে বারবার Revision এবং বিদ্যাবাড়ির Master plan অনুযায়ী বিষয়ভিত্তিক ২০টি মেগা Live সাজেশন ক্লাস; সাথে প্রচুর Exam দিয়ে ৪৫তম বিসিএস এই নিশ্চিত করুন আপনার সাফল্য।</p>
                        <p>✨ BCS প্রিলি. কোয়ালিফাই করার বাধাগুলো দূর করতে বিদ্যাবাড়ি নিয়ে এলো এক্সক্লুসিভ একটি মাস্টার প্ল্যান।</p>
                        <h4>যা থাকছে এই মাস্টার প্ল্যানে-</h4>
                        <ol>
                            <li>
                                তথ্যবহুল রেকর্ডেড ক্লাস: ১৩১টি (একসাথে);
                                [Recoded Class গুলো যখন যেটি ইচ্ছে সেটি বের করে দেখে নেয়া যাবে এবং অভিজ্ঞ স্যারদের ১.৫/২ ঘণ্টার তথ্যবহুল ক্লাস ইচ্ছেমতো টেনে টেনে দেখে নোট করা যায়। ক্লাসে অহেতুক গল্প করে সময় নষ্ট হয়না। অফলাইনে এটি মোটেও সম্ভব নয়]
                            </li>
                            <li>
                                লাইভ মেগা সাজেশন ক্লাস (Master Plan অনুযায়ী সাজানো): ২০টি;
                                [প্রতিটি ক্লাসে শেষ সময়ে নির্দিষ্ট বিষয়ে কতটুকু বাসায় পড়তে হবে, কীভাবে রিভিশন দিতে হবে, প্রচুর মডেল এক্সামে অংশগ্রহণ করে শেষ সময়ে নিজেকে ঝালাই করে নেয়া সহ অন্যান্য জরুরী করণীয় দিকনির্দেশনা]
                            </li>
                            <li>
                                মোট পরীক্ষা: ২১টি
                                🔸 বিষয়ভিত্তিক পরীক্ষা- ১০টি (২০০ মার্কস); <br/>
                                🔸 মডেল টেস্ট- ১০টি (২০০ মার্কস); <br/>
                                🔸ফাইনাল মডেল টেস্ট-১টি (২০০ মার্কস); <br/>
                                [প্রতিটি পরীক্ষার প্রশ্ন হবে PSC’র পরীক্ষার অনুরূপ ২০০ নম্বরের এবং কমন উপযোগী] <br/>
                            </li>
                            <li>
                                লেকচার শিট : <br/>
                                ভর্তি হলেই সাথে সাথে পাচ্ছেন এক্সক্লুসিভ লেকচারশিট PDF (সম্পূর্ণ ফ্রি); তাছাড়া প্রিন্টিং খরচ প্রদানের মাধ্যমে কুরিয়ারে হার্ডকপি গ্রহণের সুযোগ তো থাকছেই। <br/>
                                [এই শিটগুলো থেকে বিগত পরীক্ষায় ১৪০+ প্রশ্ন কমন ছিল এবং এগুলো বাইরে বিক্রি হয় না।]🔥 <br/>

                            </li>
                            <li>
                                এছাড়াও আরো যে-সকল লাইভ ক্লাস থাকছে... <br/>
                                🔸 ৩টি Problem Solving ক্লাস (লাইভ); <br/>
                                🔸 এম আই প্রধান মুকুল স্যারের বিশেষ গাইডলাইন; <br/>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row align-items-center mb-3">
                <div class="col">
                    <div class="section-title mt-rs-20">
                        <h2 class="text-center">আমাদের সেবা সমূহ</h2>
                        <hr class="w-25 mx-auto bg-danger"/>
                    </div>
                </div>
            </div>
            <div class="row facility">
                <div class="col-12">
                    <div class="card mb-4 border-0 content-shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('/') }}frontend/assets/images/our-speak/2.png" class="img-fluid rounded-start h-100 py-2 ps-2" alt="..."/>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-end">
                                    <h2 class="card-title mb-2">জুম লাইভ ক্লাস</h2>
                                    <p class="card-text text-muted">
                                        Zoom লাইভ এর মাধ্যমে শিক্ষক প্রতিটি লেকচার ক্লাস নিয়ে থাকেন। রুটিন অনুযায়ী প্রতিটি ক্লাসের সময়, জুম আইডি, এবং পাসকোড অ্যাপ/ওয়েবসাইট/ মোবাইলে এসএমএসের মাধ্যমে যথাসময়ে জানানো হয়। ক্লাস চলাকালীন শিক্ষার্থীদের যেকোন জিজ্ঞাসা বা প্রশ্নের উত্তর ক্লাসেই দেয়া হয়। Zoom লাইভ ক্লাসে অংশগ্রহণ করার জন্য প্রত্যেক শিক্ষার্থীকে আগে থেকেই নিজের মোবাইল/ ল্যাপটপ/ডেস্কটপ এ Zoom App Install করে রাখতে হবে।
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-3 border-0 content-shadow">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body text-start">
                                    <h2 class="card-title mb-2">Exclusive রেকর্ডেড ক্লাস</h2>
                                    <p class="card-text text-muted">
                                        প্রতিটি কোর্সের রেকর্ডেড ক্লাসগুলো অত্যাধুনিক মাল্টিমিডিয়া সিস্টেমে রেকর্ড করা হয় এবং অপ্রয়োজনীয় বিষয়গুলি বাদ দিয়ে যেভাবে পড়লে পরীক্ষায় কমন পাওয়া যায় সেভাবেই দেশ সেরা শিক্ষকদের দ্বারা রেকর্ড করা হয়। রেকর্ডকৃত ক্লাসগুলি কোর্স ভিত্তিক শিক্ষার্থীদের নির্দিষ্ট ব্যাচে পরীক্ষা অনুষ্ঠিত হওয়ার আগ পর্যন্ত সংরক্ষিত থাকে। অপ্রত্যাশিত কারণে কোন শিক্ষার্থী লাইভ ক্লাস মিস করলে বা কোন শিক্ষার্থী নিজের প্রস্তুতিকে শাণিত করতে ক্লাসের রেকর্ড পুনরায় দেখতে চাইলে; উক্ত সংরক্ষিত ভিডিওটি নিজের ইচ্ছেমতো যেকোনো সময় যতবার ইচ্ছা ততবার টেনে টেনে থামিয়ে দেখতে পারবেন এবং প্রয়োজনীয় নোট করতে পারবেন।
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <img src="{{ asset('/') }}frontend/assets/images/our-speak/1.png" class="img-fluid rounded-start h-100 py-2 pe-2" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4 border-0 content-shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('/') }}frontend/assets/images/our-speak/3.png" class="img-fluid rounded-start h-100 py-2 ps-2" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-end">
                                    <h2 class="card-title mb-2">লাইভ এক্সাম</h2>
                                    <p class="card-text text-muted">
                                        রুটিন অনুযায়ী সকল কোর্সের ব্যাচভিত্তিক প্রতিদিনের পরীক্ষাগুলো অনলাইনে অনুষ্ঠিত হয়ে থাকে। প্রতিদিনের প্রিলিমিনারি এবং লিখিত পরীক্ষার্থীদের জন্য থাকছে আলাদা আলাদা MCQ এবং Written পরীক্ষার ব্যাবস্থা। MCQ পরীক্ষার পরপরই একজন শিক্ষার্থী তার অর্জিত নম্বর এবং মেধাক্রম দেখতে পায়, পাশাপাশি যে প্রশ্নগুলো ভুল উত্তর করা হয় সেই প্রশ্নগুলো সঠিক উত্তর দেখা যায়। লিখিত পরীক্ষার্থীদের উত্তরপত্র অ্যাপ/ওয়েবসাইটে জমা নেয়া হয় এবং বিসিএস ক্যাডার ও অভিজ্ঞ শিক্ষক মণ্ডলী দ্বারা খাতা মূল্যায়ন করা হয় এবং ভুলগুলো মার্ক করে যেভাবে লিখলে সর্বোচ্চ নম্বর পাওয়া যাবে তার পরামর্শ দেয়া হয়।
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-3 border-0 content-shadow">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title mb-2">লেকচার শিট (PDF এবং প্রিন্টেড)</h2>
                                    <p class="card-text text-muted">
                                        ভর্তিকৃত সকল শিক্ষার্থীর জন্য রয়েছে বিষয়ভিত্তিক তথ্যসমৃদ্ধ আপডেট লেকচার শিট। কোর্স ভিত্তিক আলাদা আলাদা এসব লেকচার শিট এমনভাবে তৈরি করা হয়েছে যে, শিক্ষার্থীরা এই লেকচার শিটগুলো ভালোভাবে পড়লে যেকোন প্রতিযোগিতা মূলক পরীক্ষায় সর্বোচ্চ নম্বর কমন পাবে। এই লেকচার স শিটগুলো কেবল ভর্তিকৃত শিক্ষার্থীদের দেয়া হয়, বাইরে বিক্রি হয় না। ভর্তিকৃত শিক্ষার্থীদের চাহিদা সাপেক্ষে PDF কপির পাশাপাশি প্রিন্টেড কপি কুরিয়ারের মাধ্যমে পৌঁছে দেয়া হয়।
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <img src="{{ asset('/') }}frontend/assets/images/our-speak/4.png" class="img-fluid rounded-start h-100 pt-3 pe-2" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($products))
        <div class="section-bg py-5">
            <div class="container">
                <div class="row mb-3">
                    <div class="col">
                        <div class="section-title mt-rs-20">
                            <h2 class="text-center">বইসমূহ</h2>
                            <hr class="w-25 mx-auto bg-danger"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="blog-card">
                                <div class="book-btn-sec">
                                    <a href="{{ route('front.product-details',['id'=>$product->id, 'slug'=>$product->slug]) }}" class="read-btn btn btn-warning">Read More</a>
                                    <a href="javascript:void(0)" class="read-btn btn btn-warning mt-1"> Add To Cart </a>
                                </div>
                                <a href="{{ route('front.product-details',['id'=>$product->id, 'slug'=>$product->slug]) }}">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                                </a>
                                <div class="content">
                                    <h3><a href="{{ route('front.product-details', ['id' => $product->id, 'slug' => $product->slug]) }}">{{ $product->title }}</a></h3>
                                    <h5>TK {{$product->price}} </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="courses-area-two py-5">
        <div class="container">
            <div class="section-title text-center mb-3">
                <h2>শ্রদ্ধেয় শিক্ষকদের কথা</h2>
                <hr class="w-25 mx-auto bg-danger"/>
            </div>
            <div class="course-slider-two owl-carousel owl-theme">
                <div class="courses-item">
                    <video class="w-100" height="240" controls>
                        <source src="{{ asset('/') }}frontend/assets/video/salambanglasir.mp4"  type="video/mp4">
                    </video>
                    <div class="content teacher-name">
                        <h3><a href="courses-details.html">S Alam Sir</a></h3>
                        <span> Bangla Instructor BiddaBari</span>
                    </div>
                </div>
                <div class="courses-item">
                    <video class="w-100" height="240" controls>
                        <source src="{{ asset('/') }}frontend/assets/video/SaifurNadimSuvroSir.mp4"  type="video/mp4">
                    </video>
                    <div class="content teacher-name">
                        <h3><a href="courses-details.html">Saifur Nadim Shuvro Sir</a></h3>
                        <span> Math Instructor Biddabari</span>
                    </div>
                </div>
                <div class="courses-item">
                    <video class="w-100" height="240" controls>
                        <source src="{{ asset('/') }}frontend/assets/video/Mahisir-Instructor-Biddabari.mp4"  type="video/mp4">
                    </video>
                    <div class="content teacher-name">
                        <h3><a href="courses-details.html">Mahi Sir</a></h3>
                        <span> ICT Instructor Biddabari</span>
                    </div>
                </div>
                <div class="courses-item">
                    <video class="w-100" height="240" controls>
                        <source src="{{ asset('/') }}frontend/assets/video/khalid-sir.mp4"  type="video/mp4">
                    </video>
                    <div class="content teacher-name">
                        <h3><a href="courses-details.html">Advocate khalid Hossain sir</a></h3>
                        <span> Senior Faculty Bangladesh Affairs (Biddabari)</span>
                    </div>
                </div>
                <div class="courses-item">
                    <video class="w-100" height="240" controls>
                        <source src="{{ asset('/') }}frontend/assets/video/abdulhisir.mp4"  type="video/mp4">
                    </video>
                    <div class="content teacher-name">
                        <h3><a href="courses-details.html">Mohammod Abdul Hai Sir</a></h3>
                        <span> Senior Faculty International Affairs (Biddabari)</span>
                    </div>
                </div>
                <div class="courses-item">
                    <video class="w-100" height="240" controls>
                        <source src="{{ asset('/') }}frontend/assets/video/aminul-sir.mp4"  type="video/mp4">
                    </video>
                    <div class="teacher-name content ">
                        <h3><a href="courses-details.html">Aminul Islam Milon</a></h3>
                        <span> Senior Faculty Bangla (Biddabari)</span>
                    </div>
                </div>
                <div class="courses-item">
                    <video class="w-100" height="240" controls>
                        <source src="{{ asset('/') }}frontend/assets/video/foysal-sir.mp4"  type="video/mp4">
                    </video>
                    <div class="content teacher-name">
                        <h3><a href="courses-details.html">Foysal Ahmed Turzu</a></h3>
                        <span> Senior Faculty English (Biddabari) </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonials-area bg-light py-5">
        <div class="container">
            <div class="section-title text-center">
                <h2>শিক্ষার্থীদের মতামত</h2>
                <hr class="w-25 mx-auto bg-danger"/>
                <div class="offset-md-3 col-md-6 stu-tab mt-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">সফল শিক্ষার্থীদের মতামত</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">চলমান  শিক্ষার্থীদের মতামত</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="testimonials-slider-two owl-carousel owl-theme">
                            <div class="testimonials-card-two">
                                <p>“ মুকুল স্যারের পরামর্শগুলো খুবই ভালো লাগে। স্যারের দেওয়া গাইডলাইন ফলো করে ৪৪তম প্রিলি পাস করেছি। স্যারের জন্য শুভকামনা রইল। ”</p>
                                <div class="content">
                                    <img src="{{ asset('/') }}frontend/assets/images/testimonials/s-1.jpg" alt="testimonials" />
                                    <h3>Sazzad Mazumdar</h3>
                                    <span>Student</span>
                                </div>
                                <div class="quote"> <i class="flaticon-quote"></i></div>
                            </div>
                            <div class="testimonials-card-two">
                                <p>“আজকের ক্লাসে খুবই উপকৃত হলাম। কোচিং এ ভর্তি হয়ে ও হাল ছেড়ে দিয়েছিলাম স্যার। বিদ্যাবাড়ি পাশে থাকলে হাল ছেড়ে দেওয়ার কোন সুযোগ নেই । ”</p>
                                <div class="content">
                                    <img src="{{ asset('/') }}frontend/assets/images/testimonials/s-2.jpg" alt="testimonials" />
                                    <h3>Rabeya</h3>
                                    <span>Student</span>
                                </div>
                                <div class="quote"> <i class="flaticon-quote"></i></div>
                            </div>
                            <div class="testimonials-card-two">
                                <p>“সত্যি আসাধারণ! আপনাদের তুলনা হয় না স্যার। আপনারা যেভাবে আপনাদের পাশে আছেন আমাদেরকে সাহায্য করছেন। আমরা যদি একটু ঘরে বসেই পড়াশুনায় শ্রম দেই তাহলে অবশ্যই আমরা আমাদের জীবনের লক্ষ্যে পৌঁছাতে পারবো ইনশা-আল্লাহ ”</p>
                                <div class="content">
                                    <img src="{{ asset('/') }}frontend/assets/images/testimonials/s-3.jpg" alt="testimonials" />
                                    <h3>Rabbi Hasan</h3>
                                    <span>Student</span>
                                </div>
                                <div class="quote"> <i class="flaticon-quote"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="testimonials-slider-two owl-carousel owl-theme">

                            <div class="testimonials-card-two">
                                <p>“ মুকুল স্যারের পরামর্শগুলো খুবই ভালো লাগে। স্যারের দেওয়া গাইডলাইন ফলো করে ৪৪তম প্রিলি পাস করেছি। স্যারের জন্য শুভকামনা রইল। ”</p>
                                <div class="content">
                                    <img src="{{ asset('/') }}frontend/assets/images/testimonials/s-1.jpg" alt="testimonials" />
                                    <h3>Sazzad Mazumdar</h3>
                                    <span>Student</span>
                                </div>
                                <div class="quote"> <i class="flaticon-quote"></i></div>
                            </div>
                            <div class="testimonials-card-two">
                                <p>“আজকের ক্লাসে খুবই উপকৃত হলাম। কোচিং এ ভর্তি হয়ে ও হাল ছেড়ে দিয়েছিলাম স্যার। বিদ্যাবাড়ি পাশে থাকলে হাল ছেড়ে দেওয়ার কোন সুযোগ নেই । ”</p>
                                <div class="content">
                                    <img src="{{ asset('/') }}frontend/assets/images/testimonials/s-2.jpg" alt="testimonials" />
                                    <h3>Rabeya</h3>
                                    <span>Student</span>
                                </div>
                                <div class="quote"> <i class="flaticon-quote"></i></div>
                            </div>
                            <div class="testimonials-card-two">
                                <p>“সত্যি আসাধারণ! আপনাদের তুলনা হয় না স্যার। আপনারা যেভাবে আপনাদের পাশে আছেন আমাদেরকে সাহায্য করছেন। আমরা যদি একটু ঘরে বসেই পড়াশুনায় শ্রম দেই তাহলে অবশ্যই আমরা আমাদের জীবনের লক্ষ্যে পৌঁছাতে পারবো ইনশা-আল্লাহ ”</p>
                                <div class="content">
                                    <img src="{{ asset('/') }}frontend/assets/images/testimonials/s-3.jpg" alt="testimonials" />
                                    <h3>Rabbi Hasan</h3>
                                    <span>Student</span>
                                </div>
                                <div class="quote"> <i class="flaticon-quote"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .hero-slider-area { padding: 25px 0!important;}
    </style>
@endpush
