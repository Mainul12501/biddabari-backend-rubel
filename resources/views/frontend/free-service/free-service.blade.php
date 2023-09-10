@extends('frontend.master')

@section('body')
    <div class="courses-area-two section-bg py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mb-5">
                        <a href="" class="btn border-main-color"><span class="fw-bolder fs-2">ফ্রি কোর্সসমূহ</span></a>
                    </div>
                    <div class="row">
                        @forelse($courses as $course)
                            <div class="courses-item col-md-4 col-sm-6 px-0 mx-2">
                                <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">
                                    <img src="{{ isset($course->banner) ? asset($course->banner) : asset('frontend/logo/biddabari-card-logo.jpg') }} }}" alt="Courses" class="w-100" style="height: 230px"/>

                                    <div class="content">
                                        <h3>{{ $course->title }}</h3>
                                        <div class="bottom-content">
                                            <button type="button" class="btn btn-warning">বিস্তারিত দেখুন</button>
                                            <div class="rating ">
                                                <button type="button" class="btn btn-warning">Free</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <h2 class="text-center">No Courses Available yet.</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="text-center mb-5">
                        <a href="javascript:void(0)" class="btn border-main-color"><span class="fw-bolder fs-2">ফ্রি পরীক্ষা সমূহ</span></a>
                    </div>
                    <div class="row mt-3">
                        @forelse($batchExams as $batchExam)
                            <div class="courses-item col-md-4 col-sm-6 px-0 mx-2">
                                <a href="{{ route('front.course-details', ['id' => $batchExam->id]) }}">
                                    <img src="{{ isset($batchExam->banner) ? asset($batchExam->banner) : asset('frontend/logo/biddabari-card-logo.jpg') }}" alt="Courses" class="w-100" style="height: 230px"/>
                                    <div class="content">
                                        <h3>{{ $batchExam->title }}</h3>
                                        <div class="bottom-content">
                                            <button type="button" class="btn btn-warning">বিস্তারিত দেখুন</button>
                                            <div class="rating ">
                                                <button type="button" class="btn btn-warning">Free</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <h2 class="text-center">No Exams Available yet.</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
