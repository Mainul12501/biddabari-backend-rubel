@extends('frontend.master')

@section('body')
    <div class="courses-area-two section-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mb-5">
                        <a href="" class="btn border-main-color"><span class="fw-bolder fs-2">ফ্রি কোর্সসমূহ</span></a>
                    </div>
                    <div class="row mt-3">
                        @forelse($courses as $course)
                            <div class="courses-item col-md-4 col-sm-6 px-0 mx-2">
                                <a href="{{ route('front.course-details', ['id' => $course->id]) }}">
                                    <img src="{{ isset($course->banner) ? asset($course->banner) : 'https://i.ibb.co/vjLMjf4/302781896-3331421830467947-4650783196296068552-n.jpg' }}" alt="Courses" class="w-100" style="height: 230px"/>
                                </a>
                                <div class="content">
                                    <h3><a href="{{ route('front.course-details', ['id' => $course->id]) }}">{{ $course->title }}</a></h3>
                                    <div class="bottom-content">
                                        <a href="{{ route('front.course-details', ['id' => $course->id]) }}" class="btn btn-warning">বিস্তারিত দেখুন</a>
                                        <div class="rating ">
                                            <a href="javascript:void(0)" class="btn btn-warning">Free</a>
                                        </div>
                                    </div>
                                </div>
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
                        <a href="" class="btn border-main-color"><span class="fw-bolder fs-2">ফ্রি পরীক্ষা সমূহ</span></a>
                    </div>
                    <div class="row mt-3">
                        <div>
                            <ul class="nav nav-pills all-course-page-nav-pills">
                                @foreach($examCategories as $index => $examCategory)
                                    <li class="nav-item"><button type="button" class="nav-link border-danger btn py-0 mx-2 text-dark {{ $index == 0 ? 'active' : '' }}" style="border: 1px solid #F18C53" data-bs-toggle="pill" data-bs-target="#{{ 'id'.$index }}"><span class="f-s-35">{{ $examCategory->name }}</span></button></li>
                                @endforeach
                            </ul>
                            <div class="tab-content mt-5">
                                @foreach($examCategories as $key => $examCategory)
                                    <div class="tab-pane fade  {{ $key == 0 ? 'active show' : '' }}" id="{{ 'id'.$key }}">
                                        <div class="row">
                                            @forelse($examCategory->exams as $exam)
                                                @include('frontend.free-service.include-free-xms', $exam)
                                            @empty
                                                <div class="col-md-12">
                                                    <div class="text-center">
                                                        <h2>No Free Exam Available</h2>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
