<div class="card card-body">
    <h3 class="text-center">{{ $content->title }}</h3>
    @if($content->content_type == 'note')
        <div class="mt-2">
            {!! $content->note_content !!}
        </div>
    @endif
    @if($content->content_type == 'link')
        <div class="mt-2">
            <p>Please click the button to view this content.</p>
            <div class="mt-2">
                <a href="{{ $content->regular_link }}" class="btn btn-success rounded-0" target="_blank">View</a>
            </div>
        </div>
    @endif
    @if($content->content_type == 'live')
        <div class="mt-2">
            <p>Our today's live class will held through {{ $content->live_source_type == 'meet' ? 'Google Meet' : '' }} {{ $content->live_source_type == 'others' ? 'Live Vendor' : '' }} {{ $content->live_source_type == 'youtube' ? 'Youtube Live' : '' }} {{ $content->live_source_type == 'zoom' ? 'Zoom Meeting' : '' }} {{ $content->live_source_type == 'facebook' ? 'Facebook' : '' }}</p>
            <span>{!! $content->live_msg !!}</span>
            <div class="mt-2">
                <a href="{{ $content->live_link }}" class="btn btn-success rounded-0" target="_blank">Go Live</a>
            </div>
        </div>
    @endif
    @if($content->content_type == 'assignment')
        <div class="mt-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Assignment Title</th>
                        <td>{{ $content->title }}</td>
                    </tr>
                    <tr>
                        <th>Total Mark</th>
                        <td>{{ $content->assignment_total_mark }}</td>
                    </tr>
                    <tr>
                        <th>Pass Mark</th>
                        <td>{{ $content->assignment_pass_mark }}</td>
                    </tr>
                    <tr>
                        <th>Assignment Starts At</th>
                        <td>{{ \Illuminate\Support\Carbon::parse($content->assignment_start_time)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Assignment Ends At</th>
                        <td>{{ \Illuminate\Support\Carbon::parse($content->assignment_end_time)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Assignment Result Publish Time</th>
                        <td>{{ \Illuminate\Support\Carbon::parse($content->assignment_end_time)->format('d-m-Y') }}</td>
                    </tr>
                </thead>
            </table>
            <div class="mt-1">
                <p class="f-s-22">Assignment Instructions</p>
                <span>{!! $content->assignment_instruction !!}</span>
            </div>
            <div>
                <a href="{{ asset($content->assignment_question) }}" class="text-center btn btn-warning " download="download">Download Question</a>
            </div>
            <div class="mt-3">
                <p>Done Your assignment? Submit Your Answers Now</p>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" >
                    <div class="row">
                        <label for="">Upload Files</label>
                        <input type="file" name="files" class="float-start" accept="image/*" />
                    </div>
                    <input type="submit" class="btn btn-success float-start mt-3 btn-sm" value="Upload"/>
                </form>
            </div>
        </div>
    @endif
    @if($content->content_type == 'testmoj')
        <div class="mt-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>TestMoj Title</th>
                        <td>{{ $content->title }}</td>
                    </tr>
                    <tr>
                        <th>Total Questions</th>
                        <td>{{ $content->testmoj_total_questions }}</td>
                    </tr>
                    <tr>
                        <th>Total Duration</th>
                        <td>{{ $content->testmoj_xm_duration_in_minutes }} Mins</td>
                    </tr>
                    <tr>
                        <th>Exam Starts At</th>
                        <td>{{ \Illuminate\Support\Carbon::parse($content->testmoj_start_time)->format('d-m-Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Result Publish Date</th>
                        <td>{{ \Illuminate\Support\Carbon::parse($content->testmoj_result_publish_time)->format('d-m-Y') }}</td>
                    </tr>
                </thead>
            </table>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div>
                        <p class="f-s-22">Go For Exam</p>
                        <a href="{{ $content->testmoj_link }}" class="btn btn-success" target="_blank">Visit TestMoz</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        @if(\Illuminate\Support\Carbon::parse($content->testmoj_result_publish_time)->format('d-m-Y H:i') < \Illuminate\Support\Carbon::now()->format('d-m-Y H:i'))
                            <p class="f-s-22">Check Result</p>
                            <a href="{{ $content->testmoj_link }}" class="btn btn-secondary" target="_blank">Get Result</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($content->content_type == 'exam')
        <div class="mt-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Exam Title</th>
                        <td>{{ $content->title }}</td>
                    </tr>
                    <tr>
                        <th>Exam Type</th>
                        <td>MCQ</td>
                    </tr>
                    <tr>
                        <th>Exam Mode</th>
                        <td>{{ $content->exam_mode }}</td>
                    </tr>
                    <tr>
                        <th>Exam Duration</th>
                        <td>{{ $content->exam_duration_in_minutes }} Min</td>
                    </tr>
                    <tr>
                        <th>Total Questions</th>
                        <td>{{ $content->exam_total_questions }}</td>
                    </tr>
                    <tr>
                        <th>Per Question Mark</th>
                        <td>{{ $content->exam_per_question_mark }}</td>
                    </tr>
                    <tr>
                        <th>Exam Negative Mark</th>
                        <td>{{ $content->exam_negative_mark }}</td>
                    </tr>
                    <tr>
                        <th>Exam Pass Mark</th>
                        <td>{{ $content->exam_pass_mark }}</td>
                    </tr>
                    @if(!$content->exam_mode == 'practice')
                        <tr>
                            <th>Exam Starts At</th>
                            <td>{{ \Illuminate\Support\Carbon::parse($content->exam_start_time)->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Exam Ends At</th>
                            <td>{{ \Illuminate\Support\Carbon::parse($content->exam_end_time)->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Exam Result Publish Time</th>
                            <td>{{ \Illuminate\Support\Carbon::parse($content->exam_result_publish_time)->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endif
                    @if($content->exam_mode == 'group')
                        <tr>
                            <th>Exam Total Subject</th>
                            <td>{{ $content->exam_total_subject }}</td>
                        </tr>
                    @endif
                </thead>
            </table>
            <div class="row mt-3">
                @if(\Illuminate\Support\Carbon::parse($content->exam_start_time)->format('Y-m-d H:i') < \Illuminate\Support\Carbon::now()->format('Y-m-d H:i') && \Illuminate\Support\Carbon::parse($content->exam_end_time)->format('Y-m-d H:i') > \Illuminate\Support\Carbon::now()->format('Y-m-d H:i'))
                    <div>
                        <p class="f-s-22">Start your exam NOW!</p>
                        <a href="{{ route('front.student.start-course-exam', ['content_id' => $content->id, 'slug' => str_replace(' ', '-', $content->title)]) }}" class="btn btn-success">Enter Exam</a>
                    </div>
                @endif
                @if( \Illuminate\Support\Carbon::parse($content->exam_end_time)->format('Y-m-d H:i') < \Illuminate\Support\Carbon::now()->format('Y-m-d H:i'))
                    <div class="bg-danger py-4">
                        <p class="text-white ">Exam Has ended</p>
                    </div>
                    <div class="mt-3">
                        <a href="" class="btn btn-warning border" style="background-color: #f18345!important; border: 1px solid #F18345!important; color: white">See Answers</a>
                        <a href="" class="btn btn-primary">See Ranking</a>
                    </div>
                @endif
            </div>
        </div>
    @endif
    @if($content->content_type == 'written_exam')
        <div class="mt-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Exam Title</th>
                        <td>{{ $content->title }}</td>
                    </tr>
                    <tr>
                        <th>Exam Type</th>
                        <td>Written</td>
                    </tr>
                    <tr>
                        <th>Exam Duration</th>
                        <td>{{ $content->written_exam_duration_in_minutes }} Min</td>
                    </tr>
                    <tr>
                        <th>Total Questions</th>
                        <td>{{ $content->written_total_questions }}</td>
                    </tr>
                    <tr>
                        <th>Exam Starts At</th>
                        <td>{{ \Illuminate\Support\Carbon::parse($content->written_start_time)->format('d-m-Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Exam Ends At</th>
                        <td>{{ \Illuminate\Support\Carbon::parse($content->written_end_time)->format('d-m-Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Exam Result Publish Time</th>
                        <td>{{ \Illuminate\Support\Carbon::parse($content->written_publish_time)->format('d-m-Y H:i') }}</td>
                    </tr>
                </thead>
            </table>
            <div class="row mt-3">
                @if(\Illuminate\Support\Carbon::parse($content->written_start_time)->format('Y-m-d H:i') < \Illuminate\Support\Carbon::now()->format('Y-m-d H:i') && \Illuminate\Support\Carbon::parse($content->written_end_time)->format('Y-m-d H:i') > \Illuminate\Support\Carbon::now()->format('Y-m-d H:i'))
                    <div>
                        <p class="f-s-22">Start your exam NOW!</p>
                        <a href="{{ route('front.student.start-course-exam', ['content_id' => $content->id, 'slug' => str_replace(' ', '-', $content->title)]) }}" class="btn btn-success">Enter Exam</a>
                    </div>
                @endif
                @if( \Illuminate\Support\Carbon::parse($content->written_end_time)->format('Y-m-d H:i') < \Illuminate\Support\Carbon::now()->format('Y-m-d H:i'))
                    <div class="bg-danger py-4">
                        <p class="text-white ">Exam Has ended</p>
                    </div>
                    <div class="mt-3">
                        <a href="" class="btn btn-warning border" style="background-color: #f18345!important; border: 1px solid #F18345!important; color: white">See Answers</a>
                        <a href="" class="btn btn-primary">See Ranking</a>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
