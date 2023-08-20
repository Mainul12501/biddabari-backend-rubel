@extends('frontend.student-master')

@section('student-body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h2> আমার এক্সাম সমূহ</h2>
                    <hr class="w-25 mx-auto bg-danger"/>
                </div>
                @if(!empty($exams))
                    @forelse($exams as $exam)
                        <div class="col-lg-4 col-md-6">
                            <div class="courses-item">
                                {{--                                <a href="">--}}
                                <img src="{{ asset($exam->image) }}" alt="Courses" class="img-fluid w-100" style="height: 230px" />
                                {{--                                </a>--}}
                                <div class="content">
                                    <h3><a href="">{{ $exam->title }}</a></h3>
                                    <div class="bottom-content">
                                        <a href="{{ route('front.student.start-exam', ['xm_id' => $exam->id, 'slug' => $exam->slug]) }}" target="_blank" class="btn btn-warning ms-auto">এক্সাম দিন</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <div class="courses-item">
                                <p class="text-center">No Exams Enrolled Yet</p>
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </section>
@endsection
