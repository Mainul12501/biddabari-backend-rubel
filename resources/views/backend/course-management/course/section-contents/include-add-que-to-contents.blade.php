<div class="row">
    <div class="col-md-6">
        <div class="card card-body">
            <h4>Title: <span id="sectionContentTitle">{{ $content->title }}</span></h4>
        </div>
    </div>
</div>
<form action="{{ route('assign-question-to-content') }}" method="post" id="" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="xm_type" value="{{ $content->content_type }}">
    <input type="hidden" name="section_content_id" value="{{ $content->id }}">
    <div class="" id="">
        <div class="row mt-3">
            <div class="col-md-5 select2-div">
                <label for="">Question Topics</label>
                <select name="" id="questionTopic" multiple class="form-control select2" data-placeholder="Select a Question Type">
                    <option disabled >Select a Question Type</option>
                    @foreach($questionTopics as $questionTopic)
                        <option value="{{ $questionTopic->id }}">{{ $questionTopic->name }}</option>
                        @if(!empty($questionTopic))
                            @if(count($questionTopic->questionTopics) > 0)
                                @include('backend.course-management.course.section-contents.question-topic-loop', ['questionTopic' => $questionTopic, 'child' => 1])
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary mt-5 check-topics">Apply</button>
            </div>
            <div class="col-md-12" id="questionListDiv">
                <div class="card" id="queCard">

                </div>
            </div>
        </div>
    </div>
</form>

{{--@if(!empty($content->questionStores))--}}
{{--    <div class="card card-body">--}}
{{--        <h2 class="text-center">Assigned Questions</h2>--}}
{{--        <div class="row">--}}
{{--            @foreach($content->questionStores as $questionStore)--}}
{{--                <div class="col-md-6 mt-2 border  p-3 shadow" style="cursor: pointer">--}}
{{--                    <input type="checkbox" id="que{{ $questionStore->id }}" class="" name="" value="{{ $questionStore->id }}" style="display: none">--}}
{{--                    <label for="que{{ $questionStore->id }}" class="que-check"  style="cursor: pointer" data-question-id="{{ $questionStore->id }}">--}}
{{--                        <span class="float-start">#{{ $loop->iteration }}&nbsp;</span> <span class="float-start">{!! $questionStore->question !!}</span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}

@if(!empty($content->questionStores))
    <div class="card card-body">
        <h2 class="text-center">Assigned Questions ({{ count($content->questionStores) }} Ques)</h2>
        <div class="row">
            @foreach($content->questionStores as $questionStore)
                <div class="col-md-6 mt-2 border  p-3 shadow" id="question{{ $questionStore->id }}" style="cursor: pointer">
                    <div class="row">
                        <div class="col-sm-10">
                            <label for="que{{ $questionStore->id }}" class="que-check"  style="cursor: pointer" data-question-id="{{ $questionStore->id }}">
                                <span class="float-start">{{--#{{ $loop->iteration }}--}}&nbsp;</span> <span class="float-start">{!! $questionStore->question !!}</span>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <label class="float-end"><button type="button" class="btn btn-danger detach-question btn-sm" data-content-id="{{ $content->id }}" data-question-id="{{ $questionStore->id }}"><i class="fa-solid fa-trash"></i></button></label>
                        </div>
                    </div>
                    {{--                    <input type="checkbox" id="que{{ $questionStore->id }}" class="" name="" value="{{ $questionStore->id }}" style="display: none">--}}


                    @if(!empty($questionStore->questionOptions) && count($questionStore->questionOptions) > 0)
                        <div class="">
                            <div>
                                <ol type="A">
                                    @foreach($questionStore->questionOptions as $questionOption)
                                        <li class="{{ $questionOption->is_correct == 1 ? 'text-success' : '' }}"><p class="{{ $questionOption->is_correct == 1 ? 'fw-bold' : '' }}">{{ $questionOption->option_title }}</p></li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
