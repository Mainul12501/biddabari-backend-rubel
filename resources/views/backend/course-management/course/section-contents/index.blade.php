@extends('backend.master')

@section('title', 'Course Routines')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">Course Contents</h4>
                    <div class="position-absolute end-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#courseContentModal" class="rounded-circle text-white border-5 text-light f-s-22 btn float-end me-4 course-section-modal-btn"><i class="fa-solid fa-circle-plus"></i></button>
                        <a href="{{ route('course-sections.index', ['course_id' => $_GET['course_id']]) }}" class="rounded-circle text-white border-5 text-light f-s-22 btn float-end "><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="" method="get">
                        {{--                    @csrf--}}
                        <div class="row w-50 mx-auto mb-4" >
                            <div class="col select2-div">
                                <label for="">Course Section</label>
                                <select name="category_id" class="form-control select2" id="sectionId" data-placeholder="Select Exam Category">
                                    <option value=""></option>
                                    @foreach($courseSections as $courseSection)
                                        <option value="{{ $courseSection->id }}">{{ $courseSection->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <input type="button" class="btn btn-success ms-4 change-url" style="margin-top: 18px" value="Visit" />
                            </div>
                        </div>
                    </form>

                    <table class="table" id="file-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Available at</th>
                                <th>Content Type</th>
                                <th>Features</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($sectionContents))
                                @foreach($sectionContents as $sectionContent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($sectionContent->content_type == 'pdf')
                                            <a href="{{ asset($sectionContent->pdf_file) }}" target="_blank">{{ $sectionContent->title }}</a>
                                            @else
                                                <a href="javascript:void(0)" >{{ $sectionContent->title }}</a>
                                            @endif
                                        </td>
                                        <td>{{ $sectionContent->available_at }}</td>
                                        <td>{{ $sectionContent->content_type == 'written_exam' ? 'Written Exam' : $sectionContent->content_type }}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="badge badge-sm bg-primary">{{ $sectionContent->is_paid == 1 ? 'Paid' : 'Free' }}</a>
                                            <a href="javascript:void(0)" class="badge badge-sm bg-primary">{{ $sectionContent->status == 1 ? 'Published' : 'Unpublished' }}</a>
                                        </td>
                                        <td class="float-end">
                                            @if($sectionContent->content_type == 'exam' || $sectionContent->content_type == 'written_exam')
                                                <a href="" data-section-content-id="{{ $sectionContent->id }}" data-xm-type="{{ $sectionContent->content_type }}" class="btn btn-sm btn-primary add-question-modal-btn" title="Add Questions">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                            @endif
                                            @if($sectionContent->has_class_xm == 1)
                                                <a href="" data-section-content-id="{{ $sectionContent->id }}" data-xm-of="{{ $sectionContent->course_section_content_id }}" class="btn btn-sm btn-secondary add-class-question-modal-btn" title="Add Questions">
                                                    <i class="fa-solid fa-plus-circle"></i>
                                                </a>
                                            @endif
                                            <a href="" data-section-content-id="{{ $sectionContent->id }}" class="btn btn-sm btn-success show-btn" title="Show Course">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="" data-section-content-id="{{ $sectionContent->id }}" class="btn btn-sm btn-warning section-content-edit-btn" title="Edit Course">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('course-section-contents.destroy', $sectionContent->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Course">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-div" id="courseContentModal" data-modal-parent="courseContentModal" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="courseSectionContentForm">
                @include('backend.course-management.course.section-contents.form')
            </div>
        </div>
    </div>
    <div class="modal fade modal-div" id="setQuestionOnSectionContentModal" data-modal-parent="courseContentModal" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="">
                <div class="modal-header">
                    <h2 class="text-center">Set Questions to Exam</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body" id="addQueModalBody">

                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <!-- DragNDrop Css -->
{{--    <link href="{{ asset('/') }}backend/assets/css/dragNdrop.css" rel="stylesheet" type="text/css" />--}}
    <style>
        .datetimepicker {z-index: 100009!important;}
        input[switch]+label {
            margin-bottom: 0px;
        }

    </style>
@endpush

@push('script')
    @if($errors->any())
        <script>
            $(function () {
                $('#courseContentModal').modal('show');
            })
        </script>
    @endif
    @include('backend.includes.assets.plugin-files.datatable')
{{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
    @include('backend.includes.assets.plugin-files.editor')
    <script src="{{ asset('/') }}backend/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

    <script>
        $(function () {
            $('#summernote1').summernote({height:70,inheritPlaceholder: true});
            $('#summernote2').summernote({height:70,inheritPlaceholder: true});
            $('#summernote3').summernote({height:70,inheritPlaceholder: true});
            $('#summernote4').summernote({height:50,inheritPlaceholder: true});
            // $('#dateTime1').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime2').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime3').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime4').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime5').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime6').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime7').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime8').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime9').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime10').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime11').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime12').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            // $('#dateTime13').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
            $("#datetimepicker").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker1").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker2").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker3").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker4").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker5").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker6").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker7").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker8").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker9").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker10").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker11").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker12").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            $("#datetimepicker13").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
        })
    </script>
{{--    edit section contents--}}
    <script>
        $(document).on('click', '.section-content-edit-btn', function () {
            event.preventDefault();
            var sectionContentId = $(this).attr('data-section-content-id'); //change value
            $.ajax({
                url: base_url+"course-section-contents/"+sectionContentId+"/edit",
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    $('#courseSectionContentForm').empty().append(data);
                    var summernote = $('#summernote');
                    var summernote1 = $('#summernote1');
                    var summernote2 = $('#summernote2');
                    var summernote3 = $('#summernote3');
                    var summernote4 = $('#summernote4');
                    summernote.summernote('destroy');
                    summernote.summernote();
                    summernote1.summernote('destroy');
                    summernote1.summernote();
                    summernote2.summernote('destroy');
                    summernote2.summernote();
                    summernote4.summernote('destroy');
                    summernote4.summernote();
                    $('.select2').select2();
                    // $('#dateTime1').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime2').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime3').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime4').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime5').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime6').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime7').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime8').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime9').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime10').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime11').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime12').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    // $('#dateTime13').bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm:ss'});
                    $("#datetimepicker").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker1").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker2").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker3").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker4").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker5").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker6").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker7").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker8").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker9").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker10").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker11").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker12").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $("#datetimepicker13").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})

                    // $('#dateTime').bootstrapMaterialDatePicker({
                    //     format: 'YYYY-MM-DD HH:mm'
                    // });
                    $('#courseContentModal').modal('show');
                }
            })
        })
    </script>
{{--    Show Course contents--}}
    <script>
        $(document).on('click', '.show-btn', function () {
            event.preventDefault();
            var sectionContentId = $(this).attr('data-section-content-id'); //change value
            $.ajax({
                url: base_url+"course-section-contents/"+sectionContentId,
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    $('#courseSectionContentForm').empty().append(data);
                    var summernote = $('#summernote');
                    var summernote1 = $('#summernote1');
                    var summernote2 = $('#summernote2');
                    var summernote3 = $('#summernote3');
                    var summernote4 = $('#summernote4');
                    summernote.summernote('destroy');
                    summernote.summernote();
                    summernote1.summernote('destroy');
                    summernote1.summernote();
                    summernote2.summernote('destroy');
                    summernote2.summernote();
                    summernote4.summernote('destroy');
                    summernote4.summernote();
                    $('.select2').select2();
                    $('#courseContentModal').modal('show');
                }
            })
        })
    </script>

{{--    show hide input fields depends on content type--}}
    <script>
        $(document).on('change', '#contentType', function () {
            let contentType = $(this).val();

            if (contentType == 'pdf')
            {
                addHideClassToSelector('typePdf');
            } else if(contentType == 'video')
            {
                addHideClassToSelector('typeVideo');
            } else if(contentType == 'note')
            {
                addHideClassToSelector('typeNote');
            } else if(contentType == 'live')
            {
                addHideClassToSelector('typeLive');
            } else if(contentType == 'link')
            {
                addHideClassToSelector('typeLink');
            } else if(contentType == 'assignment')
            {
                addHideClassToSelector('typeAssignment');
            } else if(contentType == 'testmoj')
            {
                addHideClassToSelector('typeTestmoj');
            } else if(contentType == 'exam')
            {
                addHideClassToSelector('typeExam');
            } else if(contentType == 'written_exam')
            {
                addHideClassToSelector('typeWrittenExam');
            }

        })

        function addHideClassToSelector(selector) {
            var idData = ['typePdf','typeVideo','typeNote','typeLive','typeLink','typeAssignment','typeTestmoj','typeExam','typeWrittenExam'];
            $.each(idData, function (key, idValue) {
                if (!$('#'+idValue).hasClass('d-none'))
                {
                    $('#'+idValue).addClass('d-none');
                }
            })
            $('#'+selector).removeClass('d-none');
        }

        $(document).on('change', '#examMode', function () {
            var examMode = $(this).val();
            if (examMode == 'exam' || examMode == 'group')
            {
                if ($('.xm-group').hasClass('d-none'))
                {
                    $('.xm-group').removeClass('d-none')
                }
            }
            if (examMode == 'group')
            {
                $('.group').removeClass('d-none');
            } else {
                $('.group').addClass('d-none');
            }
            if (examMode == 'practice')
            {
                $('.xm-group').addClass('d-none');
                $('.group').addClass('d-none');
            }
        })


    </script>

    <script>
        $(document).on('click', '.change-url', function () {
            var sectionId = $('#sectionId').val();
            window.location = base_url+"course-section-contents?section_id="+sectionId+"&course_id={{ $_GET['course_id'] }}";
        })
    </script>

{{--    pdf store show hide--}}
    <script>
        $(document).on('change', '#selectPdfFrom', function () {
            var selectPdfFrom = $(this).val();
            if (selectPdfFrom == 1)
            {
                $('#manualPdf').removeClass('d-none');
                $('#fromPdfStore').addClass('d-none');
            } else if (selectPdfFrom == 2)
            {
                $('#fromPdfStore').removeClass('d-none');
                $('#manualPdf').addClass('d-none');
            }
        });
        // get cat wise pdf file
        $(document).on('change', '#pdfStoreCategory', function () {
            var sectionContentId = $(this).val();
            $.ajax({
                url: base_url+"get-pdf-by-cat/"+sectionContentId,
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    var option = '';
                    $.each(data, function (key, val) {
                        option += '<option value="'+val.file_url+'">'+val.title+'</option>';
                    })
                    $('#pdfStore').empty().append(option);
                }
            })
        })
    </script>

{{--    show question add modal--}}
    <script>
        $(document).on('click', '.add-question-modal-btn', function () {
            event.preventDefault();
            var sectionContentId = $(this).attr('data-section-content-id');
            var examType = $(this).attr('data-xm-type');
            $.ajax({
                url: base_url+"get-content-for-add-question",
                method: "GET",
                // dataType: "JSON",
                data: {section_content_id:sectionContentId,exam_type:examType},
                success: function (data) {
                    console.log(data);
                    $('#addQueModalBody').empty().append(data);
                    $('.select2').select2();
                    $('#setQuestionOnSectionContentModal').modal('show');
                }
            })
        });
        $(document).on('click', '.add-class-question-modal-btn', function () {
            event.preventDefault();
            var sectionContentId = $(this).attr('data-section-content-id');
            var examOf = $(this).attr('data-xm-of');
            $.ajax({
                url: base_url+"get-content-for-add-class-question",
                method: "GET",
                // dataType: "JSON",
                data: {section_content_id:sectionContentId,exam_of:examOf},
                success: function (data) {
                    // console.log(data);
                    $('#addQueModalBody').empty().append(data);
                    $('.select2').select2();
                    $('#setQuestionOnSectionContentModal').modal('show');
                }
            })
        });
        $(document).on('click', '.check-topics', function () {
            event.preventDefault();
            var questionTopicId = $('#questionTopic').val();
            var xmType = $('input[name="xm_type"]').val();
            $.ajax({
                url: base_url+"get-ques-by-topic",
                method: "GET",
                // dataType: "JSON",
                data: {question_topic_ids:questionTopicId,exam_type:xmType},
                success: function (data) {
                    console.log(data);

                    // var div = '';
                    // $.each(data, function (key, topic) {
                    //     div += '';
                    // })
                    $('#queCard').empty().append(data);
                }
            })
        });
        $(document).on('change', '.check-all', function () {
            var questionTopicId = $(this).attr('data-question-topic-id');
            if (this.checked)
            {
                $('.que-top-'+questionTopicId).each(function () {
                    this.checked = true;
                });
                $('.que-check-id-'+questionTopicId).each(function () {
                    $(this).parent().addClass('bg-warning');
                });
            } else {
                $('.que-top-'+questionTopicId).each(function () {
                    this.checked = false;
                });
                $('.que-check-id-'+questionTopicId).each(function () {
                    $(this).parent().removeClass('bg-warning');
                });
            }
        });
        $(document).on('click', '.que-check', function () {
            var questionTopicId = $(this).attr('data-topic-id');
            var questionId = $(this).attr('data-question-id');
            if (!$(this).parent().hasClass('bg-warning'))
            {
                $(this).parent().addClass('bg-warning');
            } else {
                $(this).parent().removeClass('bg-warning');
            }
            if ($('#que'+questionId).is(':checked'))
            {
                var unchecked = 0;
                $('.que-check-id-'+questionTopicId).each(function () {
                    if(!this.checked){
                        unchecked = 1;
                    }
                });
                if (unchecked == 0){
                    $('#selectAll-'+questionTopicId).prop('checked', true);
                } else {
                    $('#selectAll-'+questionTopicId).prop('checked', false);
                }
            } else {
                // $('#selectAll-'+questionTopicId).prop('checked', false);
                $('#selectAll-'+questionTopicId).attr('checked', false);
            }
        });
    </script>
    <script>
        $(document).on('click', '.detach-question', function () {
            event.preventDefault();
            var questionId = $(this).attr('data-question-id');
            var contentId = $(this).attr('data-content-id');
            $.ajax({
                url: base_url+"detach-question-from-course-content",
                method: "GET",
                // dataType: "JSON",
                data: {question_id:questionId,content_id:contentId},
                success: function (data) {
                    console.log(data);
                    if (data.status == 'success')
                    {
                        $('#question'+questionId).remove();
                        toastr.success('Question deleted form this content successfully.');
                    }
                },
                error: function ($error) {
                    toastr.error($error);
                }
            })
        });
        $(document).on('click', '.detach-class-question', function () {
            event.preventDefault();
            var questionId = $(this).attr('data-question-id');
            var contentId = $(this).attr('data-content-id');
            $.ajax({
                url: base_url+"detach-question-from-course-class-content",
                method: "GET",
                // dataType: "JSON",
                data: {question_id:questionId,content_id:contentId},
                success: function (data) {
                    console.log(data);
                    if (data.status == 'success')
                    {
                        $('#question'+questionId).remove();
                        toastr.success('Question deleted form this content successfully.');
                    }
                },
                error: function ($error) {
                    toastr.error($error);
                }
            })
        });
    </script>

    <script>
        $(document).on('click', '#classXm', function () {
            if ($(this).is(':checked'))
            {
                $('#classContentOf').removeClass('d-none');
            } else
            {
                $('#classContentOf').addClass('d-none');
            }
        })
    </script>
@endpush
