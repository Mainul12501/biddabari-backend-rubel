@extends('frontend.student-master')

@section('student-body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h2> আমার কোর্স সমূহ</h2>
                    <hr class="w-25 mx-auto bg-danger"/>
                </div>
                @if(!empty($courseOrders))
                    @forelse($courseOrders as $courseOrder)
                        <div class="col-lg-4 col-md-6">
                            <div class="courses-item">
                                <a href="{{ route('front.student.course-contents', ['course_id' => $courseOrder->course->id, 'slug' => $courseOrder->course->slug]) }}">
                                    <img src="{{ asset($courseOrder->course->banner) }}" alt="Courses" class="img-fluid" style="height: 230px" />
                                </a>
                                <div class="content">
                                    <h3><a href="{{ route('front.student.course-contents', ['course_id' => $courseOrder->course->id, 'slug' => $courseOrder->course->slug]) }}">{{ $courseOrder->course->title }}</a></h3>
{{--                                    <div class="bottom-content">--}}
{{--                                        <a href="{{ route('front.course-details', ['id' => $courseOrder->course->id, 'slug' => $courseOrder->course->slug]) }}" class="btn btn-warning">বিস্তারিত দেখুন</a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-4 col-md-6">
                            <div class="courses-item">
                                <p class="text-center">No Courses Enrolled Yet</p>
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </section>
@endsection
