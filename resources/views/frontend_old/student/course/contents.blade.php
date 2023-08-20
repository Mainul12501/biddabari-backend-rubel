@extends('frontend.student-master')

@section('student-body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h2> {!! $course->title !!}</h2>
                    <hr class="w-25 mx-auto bg-danger"/>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="courses-details-tab-content">
                            <div class="courses-details-accordion">
                                <ul class="accordion">
                                    @if(!empty($course->courseSections))
                                        @forelse($course->courseSections as $courseSection)
                                            <li class="accordion-item">
                                                <a class="accordion-title f-s-26" href="javascript:void(0)">
                                                    <i class="ri-add-fill"></i>
                                                    {{ $courseSection->title }}
                                                </a>
                                                @if(!empty($courseSection->courseSectionContents))
                                                    <div class="accordion-content">
                                                        @foreach($courseSection->courseSectionContents as $courseSectionContent)
                                                            @if($courseSectionContent->content_type == 'pdf')
                                                                <a href="{{ route('front.student.show-pdf', ['content_id' => $courseSectionContent->id]) }}" target="_blank" class="w-100">
                                                                    <div class="accordion-content-list pt-2 pb-0">
                                                                        <div class="accordion-content-left">

{{--                                                                            PDF--}}
                                                                            <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                            @if($courseSectionContent->content_type == 'video')
                                                                    <a href="javascript:void(0)" class="w-100 open-video-modal" data-video-link="{{ $courseSectionContent->video_link }}" data-video-vendor="{{ $courseSectionContent->video_vendor }}">
                                                                        <div class="accordion-content-list pt-2 pb-0">
                                                                            <div class="accordion-content-left">
{{--                                                                                Video--}}
                                                                                <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                            @endif
                                                            @if($courseSectionContent->content_type == 'note')
                                                                    <a href="javascript:void(0)" class="w-100 get-text-data" data-content-id="{{ $courseSectionContent->id }}">
                                                                        <div class="accordion-content-list pt-2 pb-0">
                                                                            <div class="accordion-content-left">
{{--                                                                                Note--}}
                                                                                <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                            @endif
                                                            @if($courseSectionContent->content_type == 'live')
                                                                    <a href="javascript:void(0)" class="w-100 get-text-data" data-content-id="{{ $courseSectionContent->id }}">
                                                                        <div class="accordion-content-list pt-2 pb-0">
                                                                            <div class="accordion-content-left">
{{--                                                                                Go Live--}}
                                                                                <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                            @endif
                                                            @if($courseSectionContent->content_type == 'link')
                                                                    <a href="javascript:void(0)" class="w-100 get-text-data" data-content-id="{{ $courseSectionContent->id }}">
                                                                        <div class="accordion-content-list pt-2 pb-0">
                                                                            <div class="accordion-content-left">
{{--                                                                                Regular Link--}}
                                                                                <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                            </div>
                                                                            {{--                                                                    <div class="accordion-content-right">--}}
                                                                            {{--                                                                        <div class="tag2">--}}
                                                                            {{--                                                                            <a href="{{ !empty($courseSectionContent->regular_link) ? $courseSectionContent->regular_link : '' }}" target="_blank">Visit</a>--}}
                                                                            {{--                                                                        </div>--}}
                                                                            {{--                                                                        <!--                                                            <i class="ri-play-circle-line"></i>-->--}}
                                                                            {{--                                                                    </div>--}}
                                                                        </div>
                                                                    </a>
                                                            @endif
                                                            @if($courseSectionContent->content_type == 'assignment')
                                                                    <a href="javascript:void(0)" class="w-100 get-text-data" data-content-id="{{ $courseSectionContent->id }}">
                                                                        <div class="accordion-content-list pt-2 pb-0">
                                                                            <div class="accordion-content-left">
                                                                                {{--                                                                        Assignment File--}}
                                                                                <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                            @endif
                                                            @if($courseSectionContent->content_type == 'testmoj')
                                                                    <a href="javascript:void(0)" class="w-100 get-text-data" data-content-id="{{ $courseSectionContent->id }}">
                                                                        <div class="accordion-content-list pt-2 pb-0">
                                                                            <div class="accordion-content-left">
                                                                                {{--                                                                        TestMoj--}}
                                                                                <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                            @endif
                                                            @if($courseSectionContent->content_type == 'exam')
                                                                    <a href="javascript:void(0)" class="w-100 get-text-data" data-content-id="{{ $courseSectionContent->id }}">
                                                                        <div class="accordion-content-list pt-2 pb-0">
                                                                            <div class="accordion-content-left">
                                                                                <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                            @endif
                                                            @if($courseSectionContent->content_type == 'written_exam')
                                                                    <a href="javascript:void(0)" class="w-100 get-text-data" data-content-id="{{ $courseSectionContent->id }}">
                                                                        <div class="accordion-content-list pt-2 pb-0">
                                                                            <div class="accordion-content-left">
                                                                                {{--                                                                        Written Exam--}}
                                                                                <p class="f-s-20"><i class="ri-file-text-line"></i> {{ $courseSectionContent->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </li>
                                        @empty
                                            <li class="accordion-item">
                                                <a class="accordion-title" href="javascript:void(0)">
                                                    No Content Available Yet
                                                </a>
                                            </li>
                                        @endforelse
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="" id="printHere">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade video-modal" id="videoModal" data-modal-parent="courseContentModal" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Watch Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card card-body">
                        <div class="private d-none">
                            <video class="w-100 video" height="500" controls="controls" controlist="nodownload">
                                <source id="privatVid" src="//samplelib.com/lib/preview/mp4/sample-5s.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="youtube d-none">
                            <iframe width="100%" id="youtubePlayer" height="500" src="" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; " allowfullscreen></iframe>
                        </div>
                        <div class="vimeo d-none">
                            <div style="padding:56.25% 0 0 0;position:relative;">
                                <iframe id="vimeoPlayer" src="" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
{{--    note--}}
<script>
    $(document).on('click', '.get-text-data', function () {
        var contentId = $(this).attr('data-content-id');
        $.ajax({
            url:"{{ route('front.student.get-text-type-content') }}",
            method: "GET",
            data: {content_id:contentId},
            success: function (data) {
                console.log(data);
                $('#printHere').html(data);
            }
        })
    })
</script>
{{--    video --}}
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        $(document).on('click', '.open-video-modal', function () {
            var videoVendor = $(this).attr('data-video-vendor');
            var videoLink = $(this).attr('data-video-link');
            if (videoVendor == 'youtube')
            {
                $('.youtube').removeClass('d-none');
                $('.private').addClass('d-none');
                $('.vimeo').addClass('d-none');
                $('#youtubePlayer').attr('src', 'https://www.youtube.com/embed/'+videoLink);
                $('.video-modal').modal('show');
            } else if (videoVendor == 'private')
            {
                $('.private').removeClass('d-none');
                $('.youtube').addClass('d-none');
                $('.vimeo').addClass('d-none');
                $('#privatVid').attr('src', videoLink);
                $('.video-modal').modal('show');
            } else if (videoVendor == 'vimeo')
            {
                $('.private').removeClass('d-none');
                $('.youtube').addClass('d-none');
                $('.vimeo').addClass('d-none');
                $('#vimeoPlayer').attr('src', 'https://player.vimeo.com/video/'+videoLink+'?h=627084a88d&autoplay=0&loop=1&title=0&byline=0&portrait=0');
                $('.video-modal').modal('show');
            }
        })
    </script>
    <script>
        $(function () {
            $('.video').bind('contextmenu',function () {
                return false;
            })
        })
    </script>
@endsection
