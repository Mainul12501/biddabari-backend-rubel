@extends('frontend.student-master')

@section('student-body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="section-title ">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center"> {!! $content->title !!} Question Answers</h2>
                            <hr class="w-25 mx-auto bg-danger"/>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                @if($content->content_type == 'exam')
                                    @foreach($content->questionStores as $questionStore)
                                        <div class="col-md-6 mt-3">
                                            <h2>{{ $loop->iteration }}. {!! strip_tags($questionStore->question) !!}</h2>
                                            @if($content->content_type == 'exam')
                                                <div class="mt-2">
                                                    <ul class="nav flex-column">
                                                        @foreach($questionStore->questionOptions as $questionOption)
                                                            <li class="f-s-20 border px-2 {{ $questionOption->is_correct == 1 ? 'correct-ans-bg' : '' }} {{ isset($questionOption->my_ans) && $questionOption->my_ans == 1 ? 'correct-ans-bg' : '' }} {{ isset($questionOption->my_ans) && $questionOption->my_ans == 0 ? 'bg-danger' : '' }}"><p class="{{ $questionOption->is_correct == 1 ? 'text-white' : '' }}"> {{ $loop->iteration }}. {{ $questionOption->option_title }}</p></li>
                                                        @endforeach
                                                    </ul>
                                                    @if($questionStore->has_all_wrong_ans == 1)
                                                        <span class="text-danger">All Options are incorrect.</span>
                                                    @endif
                                                    <div class="mt-2">
                                                        <a href="#" class="toggleAnsDes nav-link" data-question-id="{{ $questionStore->id }}">Show Answer Description</a>
                                                        @if(isset($questionStore->mcq_ans_description))
                                                            <div class="mt-2" id="ansDes{{ $questionStore->id }}" style="display: none">
                                                                {!! $questionStore->mcq_ans_description !!}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @elseif($content->content_type == 'written_exam')
                                                <div>
                                                    <p class="f-s-20">{!! $questionStore->written_que_ans !!}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @elseif($content->content_type == 'written_exam')
                                    <div class="col-md-12 mt-3">
                                        <div id="pdf-container"></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugins/pdf-draw/pdfannotate.css">
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugins/pdf-draw/styles.css">
    <style>
        .canvas-container, canvas { width: 100%!important; margin-top: 10px!important;}
    </style>
    <style>
        .correct-ans-bg { background-color: #B2DB9A}
    </style>
@endpush

@section('js')
    <script>
        $(document).on('click', '.toggleAnsDes', function () {
            event.preventDefault();
            var questionStoreId = $(this).attr('data-question-id');
            $('#ansDes'+questionStoreId).toggle(500);
        })
    </script>
@endsection
