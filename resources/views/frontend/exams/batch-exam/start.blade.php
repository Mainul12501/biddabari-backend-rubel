@extends('frontend.master')

@section('body')

<div class="container-fluid" id="grad1">
    <div class="row" style=" min-height: 500px;">
        <div class="col-md-8 quiz-wizard mx-auto">
            <div class="card border-0">
                <div class="card-header d-flex align-items-center position-sticky" style="top: 105px!important; z-index: 10;">
                    <div>
                        <div>
                            <h2 class="quiz-name">Exam - {{ $exam->title }}</h2>
                            <span class="course-name d-block">{{ count($exam->questionStores) }} Questions</span>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <a href="" class="btn sticky-submit-btn btn-outline-warning d-none">Submit</a>
                    </div>
                    <div class="ms-auto">
                        <a href="" class="btn btn-lg start-btn btn-success">Start</a>
                    </div>
                    <div class="quiz-time d-none" id="quizDiv">
                            <div class="flipTimer">
                                @if(isset($exam) && $exam->content_type == 'exam' ? $exam->exam_duration_in_minutes : $exam->written_exam_duration_in_minutes > 60)
                                    <div class="hours"><span class="time-title">Hours</span></div>
                                @endif
                                <div class="minutes"><span class="time-title">Minutes</span></div>
                                <div class="seconds"><span class="time-title">Seconds</span></div>
                            </div>
                    </div>

                </div>
                <!-- $quiz->questions->take(100)->shuffle(50)->random(50); -->
                <div class="card-body d-none" id="questionsCard">
                    <div class="row">
                        <div class="col-md-12 px-0" id="dtBasicExample">
                            {{--                            <form id="quizForm" action="/user/quizzes/{{ $quiz->id }}/store_results-mega" method="post" class="quiz-form">--}}
                            <form id="quizForm" action="{{ route('front.student.get-batch-exam-result', ['content_id' => $exam->id, 'slug' => str_replace(' ', '-', $exam->title)]) }}" method="post" class="quiz-form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="required_time">
                                @if($exam->content_type == 'exam')
                                    @foreach($exam->questionStores as $index => $question)
                                        <div class="mt-2 p-3" id="questionDiv{{ $question->id }}">
                                            <div class="form-card " id="fildset{{ $question->id }}">
                                                <div class="question-title" id="loop{{ $question->id }}" data-loop="{{ $loop->iteration }}" style="margin-top: 10px">
                                                    <span class="float-start f-s-26">{{ $loop->iteration }}.  &nbsp;</span>
                                                    <span class="float-start f-s-26"> {!! $question->question !!}</span>
                                                </div>
                                                @if(!empty($question->question_image))
                                                    <div class="{{--image-container--}}">
                                                        <img src="{{ $question->question_image }}" class="fit-image" alt="" style="max-height: 350px" />
                                                    </div>
                                                @endif
                                                @if(isset($question->question_option_image))
                                                    <div class="row py-2">
                                                        <div class="col-12">
                                                            <img src="{{ asset($question->question_option_image) }}" class="" alt="" style="max-height: 350px">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="answer-items mt-3" id="queRadio{{ $question->id }}">
                                                    @foreach($question->questionOptions as $optionIndex => $questionOption)
                                                        @if(!empty($questionOption->option_title))
                                                            <div class="form-radio" >
                                                                <input id="asw{{ $questionOption->id }}" type="checkbox" name="question[{{ $question->id }}][answer]" value="{{ $questionOption->id }}">

                                                                <label class="answer-label" id="ali{{ $questionOption->id }}" data-que-id="{{ $question->id }}" data-ans-id="{{ $questionOption->id }}" for="asw{{ $questionOption->id }}">
                                                                    <span class="answer-title mx-0">{{$loop->iteration .' . '. $questionOption->option_title }}</span>
                                                                </label>
                                                                <span class="ps-1 d-none cont" id="ansCheck{{ $questionOption->id }}">
                                                                    <span class="check-ans" style="cursor: pointer; color: black"><i class="fa-solid fa-check"></i></span>
                                                                    <span class="text-danger cancel-ans" style="cursor: pointer; color: black"><i class="fa-solid fa-xmark"></i></span>
                                                                </span>
                                                            </div>
                                                        @else
                                                            <div class="form-radio">
                                                                <input id="asw{{ $questionOption->id }}" type="checkbox" name="question[{{ $question->id }}][answer]" value="{{ $questionOption->id }}">

                                                                <label class="" for="asw{{ $questionOption->id }}">
                                                                    <img src="{{ $questionOption->option_image }}" class="fit-image" alt="">
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                        <div class="card-actions d-flex align-items-center finish-div d-none">
                                            <button type="submit" class="action-button finish btn btn-danger">Finish Test</button>
                                        </div>
                                @elseif($exam->content_type == 'written_exam')
                                    @foreach($exam->questionStores as $index => $question)
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <span class="float-start" style="font-size: 22px">{{ $loop->iteration }}. &nbsp;</span>
                                                <h4 class="float-start fw-bold">{!! $question->question !!}</h4>
                                                <div class="mt-3">
                                                    @if($question->question_file_type == 'pdf')
                                                        <span><a href="{{ asset($question->question_image) }}" download="" class="nav-link text-warning">PDF File</a></span>
                                                    @else
                                                        <img src="{{ asset($question->question_image) }}" alt="" style="height: 60px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row mt-3">
{{--                                        <div class="col-md-5">--}}
{{--                                            <label for="uploadFiles" class="float-start">Upload Answer Images</label>--}}
{{--                                            <input type="file" name="ans_files[]" class="form-control" multiple accept="image/*" />--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3">--}}

{{--                                        </div>--}}
                                        <div class="col-md-12 ">
                                            <div class="ansFileUpload"></div>
                                        </div>
                                        <div class="col-md-4 mx-auto">
                                            <input type="submit" class="btn btn-danger mt-4 finish-div d-none" value="Finish Test" />
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('style')

<link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugins/step-form-simulator/view-custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugins/clock-counter/flipTimer.css">

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugins/image-uploader-master/dist/image-uploader.min.css">
<style>
    /*.quiz-form .form-card .form-radio label .answer-title {*/
    /*    padding: 5px!important;*/
    /*    width: 100%;*/
    /*    text-align: left;*/
    /*}*/
    /*input[type='checkbox'] + label > span {*/

    /*}*/

    .uploaded {
        text-align: left;
    }
    .now-active {
        /*display: block!important;*/
        /*background: #01a3a4!important;*/
        background: #ffe4d6!important;
        color: black!important;
    }
</style>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
@endpush

@push('script')

<script type="application/javascript" src="{{ asset('/') }}backend/assets/plugins/clock-counter/jquery.flipTimer.js"></script>
<script type="application/javascript" src="{{ asset('/') }}backend/assets/plugins/image-uploader-master/dist/image-uploader.min.js"></script>

{{--    <script> var sliderTimer = 6000;</script>--}}
    <script>
        $(document).on('click', '.start-btn', function () {
            event.preventDefault()
            if (confirm('Are you sure to start the exam?'))
            {
                $(this).addClass('d-none');
                $('#quizDiv').removeClass('d-none');
                $('#questionsCard').removeClass('d-none');
                $('.finish-div').removeClass('d-none');
                $('.sticky-submit-btn').removeClass('d-none');
// timmer calling start
                @if($exam->exam_is_strict == 1)
                    @if(currentDateTimeYmdHi() < dateTimeFormatYmdHi($exam->exam_end_time))
                        {{ $diffTime  = \Illuminate\Support\Carbon::now()->diffInMinutes($exam->exam_end_time) }}
                    @else
                        {{ $diffTime = 0 }}
                    @endif
                @endif
                    @if($exam->written_is_strict == 1)
                        @if(currentDateTimeYmdHi() < dateTimeFormatYmdHi($exam->written_end_time))
                            {{ $writtenDiffTime  = \Illuminate\Support\Carbon::now()->diffInMinutes($exam->written_end_time) }}
                        @else
                            {{ $writtenDiffTime = 0 }}
                        @endif
                    @endif
                var currentTime = new Date();
                currentTime.setMinutes(currentTime.getMinutes() + {!! isset($exam) ? ($exam->content_type == 'exam' ? ($exam->exam_is_strict == 1 ? /*++$diffTime*/ ($diffTime < $exam->exam_duration_in_minutes ? $diffTime : $exam->exam_duration_in_minutes) :  $exam->exam_duration_in_minutes) : (($exam->written_is_strict == 1 ? /*++$diffTime*/ ($writtenDiffTime < $exam->written_exam_duration_in_minutes ? $writtenDiffTime : $exam->written_exam_duration_in_minutes) :  $exam->written_exam_duration_in_minutes))) : 1 !!}); //set custom time instead 60

                $('.flipTimer').flipTimer({
                    direction: 'down',
                    date: currentTime,
                    callback: function () {
                        $('body .action-button.finish').remove();
                        $('#quizForm').submit();
                    },
                });
                // timmer calling end
                var seconds = 1;
                setInterval(function () {
                    $('input[name="required_time"]').val(seconds++);
                }, 1000)
            }
        })
    </script>
{{--    <script>--}}
{{--        "use strict";--}}
{{--        $(document).ready(function () {--}}
{{--            // timmer calling start--}}
{{--            var currentTime = new Date();--}}
{{--            currentTime.setMinutes(currentTime.getMinutes() + {!! isset($exam) ? ($exam->content_type == 'exam' ? $exam->exam_duration_in_minutes : $exam->written_exam_duration_in_minutes) : 1 !!}); //set custom time instead 60--}}


{{--            $('.flipTimer').flipTimer({--}}
{{--                direction: 'down',--}}
{{--                date: currentTime,--}}
{{--                callback: function () {--}}
{{--                    $('body .action-button.finish').remove();--}}
{{--                    $('#quizForm').submit();--}}
{{--                },--}}
{{--            });--}}
{{--            // timmer calling end--}}
{{--        });--}}
{{--    </script>--}}
    <script>


        $(document).on('click', '.answer-label', function () {
            var questionOptionId = $(this).attr('data-ans-id');
            var questionId = $(this).attr('data-que-id');
            var hasDisableClass = false;
            $('#queRadio'+questionId+ ' .form-radio').each(function () {
                if ($(this).hasClass('disabled-it'))
                {
                    // event.stopPropagation();
                    // return false;
                    // alert('worked');
                    // return false;
                    // $('#queRadio'+questionId+ ' .form-radio').each(function () {
                    //     $(this).off('click');
                    // });
                    hasDisableClass = true;
                }
            })
            if(hasDisableClass)
            {
                // alert('true');
                return false;
            }

            $('#queRadio'+questionId+ ' .answer-label').each(function () {
                if ($(this).hasClass('now-active'))
                {
                    $(this).removeClass('now-active');
                }
            })
            $('#queRadio'+questionId+ ' .cont').each(function () {
                if (!$(this).hasClass('d-none'))
                {
                    $(this).addClass('d-none');
                }
            })
            $(this).addClass('now-active');
            // $('#ansCheck'+questionOptionId).css('cssText', 'display: block!important;');
            $('#ansCheck'+questionOptionId).removeClass('d-none');
        })
        $(document).on('click', '.check-ans', function () {
            $(this).parent().addClass('d-none');
            $($(this).parent().parent()).addClass('disabled-it');
            var questionParentDivId = $($(this).parent().parent().parent().parent().parent()).attr('id');
            $(this).parent().parent().parent().parent().parent().css({
                backgroundColor : '#8efaa4',
                // color           : 'white',
            });
        })
        $(document).on('click', '.cancel-ans', function () {
            if($($(this).parent().parent()).hasClass('disabled-it'))
            {
                $($(this).parent().parent()).removeClass('disabled-it');
            }
            var parentId = $(this).parent().attr('id').split('ansCheck').join('');
            if($('label[for="asw'+parentId+'"]').hasClass('now-active'))
            {
                $('label[for="asw'+parentId+'"]').removeClass('now-active')
            }
            $(this).parent().addClass('d-none');
        })

        function isset(iVal){
            return (iVal!=="" && iVal!=null && iVal!==undefined && typeof(iVal) != "undefined") ? 1 : 0;
        }

    </script>
<script>
    $(document).on('click', '.sticky-submit-btn', function () {
        event.preventDefault();
        document.getElementById('quizForm').submit();
    })
</script>
<script>
    $(function (){
        $('.ansFileUpload').imageUploader({
            imagesInputName: "ans_files",
            label: "Drag & Drop Answer Image files here or click to browse"
        });
    })
</script>
@endpush
