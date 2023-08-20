<div class="card mt-4">
    <div class="card-header">
        <h2 class="text-center float-start">Question Form</h2>
        <button type="button" class="btn btn-warning position-absolute end-0 me-4 full-form-append-btn"><i class="fa-solid fa-plus"></i></button>
    </div>
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="question_topics[]" value="{{ $questionStore->questionTopics[0]->id }}">
            <input type="hidden" name="question_type" id="questionType" value="{{ $questionStore->question_type }}">
{{--            <div class="col-12">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <label for="totalQuestions">Total Question</label>--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="number" id="totalForm" class="form-control" placeholder="Total Question Append" />--}}
{{--                            <span class="input-group-text full-form-append-btn" style="cursor: pointer"><i class="fa-solid fa-check"></i></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 select2-div">--}}
{{--                <label for="questionType" class="">Question Type</label>--}}
{{--                <select name="question_type" id="questionType" class="form-control select2" data-placeholder="Select a Question Type">--}}
{{--                    <option value=""></option>--}}
{{--                    <option value="MCQ" {{ $questionStore->question_type == 'MCQ' ? 'selected' : '' }}>MCQ</option>--}}
{{--                    <option value="Written" {{ $questionStore->question_type == 'Written' ? 'selected' : '' }}>Written</option>--}}
{{--                </select>--}}
{{--                @csrf--}}
{{--            </div>--}}
{{--            <div class="col-md-6 select2-div">--}}
{{--                <label for="questionTopic" class="">Question Topic</label>--}}
{{--                <select name="question_topics[]" multiple id="questionTopic" class="form-control select2" data-placeholder="Select a Question Topics">--}}
{{--                    <option value=""></option>--}}
{{--                    @foreach($questionTopics as $question)--}}
{{--                        <option value="{{ $question->id }}" @if(!empty($questionStore->questionTopics)) @foreach($questionStore->questionTopics as $questionTopic) @if($questionTopic->id == $question->id) selected @endif @endforeach @endif>{{ $question->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="col-md-12 mt-3">
                <label for="summernote">Question</label>
                <textarea name="question[0][question]" id="summernote111" class="form-control" placeholder="Question " cols="30" rows="10">{{ $questionStore->question }}</textarea>
            </div>
            <div class="col-md-12 mt-3">
                <label for="summernote1">Question Description</label>
                <textarea name="question[0][question_description]" id="summernote222" placeholder="Question Description" class="form-control" cols="30" rows="10">{{ $questionStore->question_description }}</textarea>
            </div>
            <div class="col-md-6 mt-3">
                <label for="questionImage">Que Image</label>
                <input type="file" class="form-control" id="questionImage" name="question[0][question_image]" accept="image/*" />
                <img src="{{ asset($questionStore->question_image) }}" alt="" style="height: 60px;">
            </div>
            <div class="col-md-6 mt-3">
                <label for="queVidDes">Que Video Description</label>
                <input type="text" class="form-control" id="queVidDes" name="question[0][question_video_link]" value="{{ $questionStore->question_video_link }}" placeholder="Question Video Description" />
            </div>
            <div class="col-md-6 mt-3">
                <label for="markPerQue">Mark Per Question</label>
                <input type="text" class="form-control" id="markPerQue" name="question[0][question_mark]" value="{{ $questionStore->question_mark }}" placeholder="Mark Per Question" />
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="currentAppendNumber" value="0" />

<div class="card mcq-ans-sec {{ $questionStore->question_type == 'MCQ' ? '' : 'd-none' }}" data-key-id="0" id="mcqAnsSection">
    <div class="card-header">
        <h3 class="float-start">MCQ Options</h3>
        <button type="button" data-key-id="0" class="btn append-div position-absolute end-0 me-4 btn-outline-success "><i class="fa-solid fa-circle-plus"></i></button>
    </div>
    <div class="card-body" id="mcqOptionSection0">
        @if(!empty($questionStore->questionOptions))
            @foreach($questionStore->questionOptions as $questionOption)
                <div class="row">
                    <div class="col-md-12">
                        <label for="optionTitle">Option Title</label>
                        <div class="input-group">
                            <input type="text" name="question[0][answer][0][option_title]" value="{{ $questionOption->option_title }}" id="optionTitle" class="form-control" placeholder="Option" />
                            {{--                                        <button type="button" class="btn btn-danger input-group-text delete-option-btn"><i class="fa-solid fa-trash"></i></button>--}}
                        </div>
                        <label for="" class="mt-2">Is Correct?</label>
                        <div class="material-switch">
                            <input id="someSwitchOptionInfo" name="question[0][answer][0][is_correct]" type="checkbox" {{ $questionOption->is_correct == 1 ? 'checked' : '' }} />
                            <label for="someSwitchOptionInfo" class="label-info"></label>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="card-body pt-0 border-top-0">
        <div class="row">
            <div class="col-md-6">
                <label for="negativeMark">Negative Mark</label>
                <input type="text" class="form-control" id="negativeMark" name="question[0][negative_mark]" value="0" placeholder="Mark Per Question" />
            </div>
            <div class="col-md-6">
                <label for="wrongAns">All Wrong Answers?</label>
                <div class="material-switch">
                    <input id="someSwitchOptionWarning" name="question[0][has_all_wrong_ans]" type="checkbox" >
                    <label for="someSwitchOptionWarning" class="label-warning"></label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card written-ans-sec {{ $questionStore->question_type == 'Written' ? '' : 'd-none' }}" data-key-id="0" id="writtenAnsSection">
    <div class="card-header">
        <h3>Written Question Answer</h3>
    </div>
    <div class="card-body">
        <div class="row mt-2" >
            <div class="col-md-12 mt-3">
                <label for="">Written Question Answer</label>
                <textarea name="question[0][written_que_ans]" id="summernote333" class="form-control" cols="30" rows="5">{{ $questionStore->written_que_ans }}</textarea>
            </div>
            <div class="col-md-12 mt-3">
                <label for="">Written Question Answer Description</label>
                <textarea name="question[0][written_que_ans_description]" id="summernote444" class="form-control" cols="30" rows="5">{{ $questionStore->written_que_ans_description }}</textarea>
            </div>
            <div class="col-md-4 mt-3">
                <label for="">Written Question Answer Upload</label>
                <input type="file" name="question[0][written_que_file]" class="form-control" />
                <img src="{{ asset($questionStore->written_que_file) }}" alt="" style="height: 60px">
            </div>
        </div>
    </div>
</div>

<div id="fullFormAppendDiv"></div>
