@extends('backend.master')

@section('title', 'Course Routines')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">Course Sections</h4>
                    <a href="{{ route('courses.index') }}" title="Back to Courses" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 m-r-50"><i class="fa-solid fa-arrow-left"></i></a>
                    @can('create-course-section')
                        <button type="button" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4 course-section-modal-btn"><i class="fa-solid fa-circle-plus"></i></button>
                    @endcan
                </div>




                <div class="card-body">
                    <div class="py-5">
                        <div class="accordion" id="accordionExample">
                            @if(isset($courseSections))
                                @foreach($courseSections as $key => $courseSection)
                                    <div class="accordion-item card p-3 mb-0">
                                        <div class="accordian_header" style="cursor: pointer">
                                            <div class="row">
                                                <h3 class="col-sm-9" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}">
                                                    @if(count($courseSection->courseSectionContents) > 0)
                                                        <i class="fa-solid fa-arrow-circle-down f-s-16"></i>
                                                    @endif
                                                    <span class="f-s-18">{{ $courseSection->title }}</span>
                                                </h3>
                                                <div class="col-sm-3">
                                                    <div class="float-end">
{{--                                                        @can('add-sub-cat-to-notice-category')--}}
{{--                                                            <button type="button" data-notice-category-id="{{ $courseSection->id }}" class="btn btn-sm btn-info add-sub-category-btn" title="Add Sub Category">--}}
{{--                                                                <i class="fa-solid fa-plus"></i>--}}
{{--                                                            </button>--}}
{{--                                                        @endcan--}}
                                                        @can('create-course-section-content')
                                                            <button type="button"  data-section-id="{{ $courseSection->id }}" class="btn btn-sm btn-info {{--add-sub-category-btn--}} open-section-content-form-modal" title="Add Section Content">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        @endcan
                                                        @can('edit-course-section')
                                                            <button type="button" data-course-section-id="{{ $courseSection->id }}" class="btn btn-sm btn-warning course-section-edit-btn" title="Edit Course Section">
                                                                <i class="fa-solid fa-edit"></i>
                                                            </button>
                                                        @endcan
                                                        @can('delete-course-section')
                                                            <form class="d-inline" action="{{ route('course-sections.destroy', $courseSection->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Course Sections">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapse{{ $key }}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @if(isset($courseSection->courseSectionContents))
                                                    @include('backend.course-management.course.course-sections.show-nested-cats', ['sectionContents' => $courseSection->courseSectionContents, 'child' => 1])
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>






{{--                <div class="card-body">--}}


{{--                    <table class="table" id="file-datatable">--}}
{{--                        <thead>--}}
{{--                            <tr>--}}
{{--                                <th>#</th>--}}
{{--                                <th>Title</th>--}}
{{--                                <th>Available at</th>--}}
{{--                                <th>Description</th>--}}
{{--                                <th>Features</th>--}}
{{--                                <th>Actions</th>--}}
{{--                            </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                            @if(isset($courseSections))--}}
{{--                                @foreach($courseSections as $courseSection)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $loop->iteration }}</td>--}}
{{--                                        <td>{{ $courseSection->title }}</td>--}}
{{--                                        <td>{{ $courseSection->available_at }}</td>--}}
{{--                                        <td>{!! $courseSection->note !!}</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $courseSection->is_paid == 1 ? 'Paid' : 'Free' }}</a>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary change-status" style="background-color: #8fbd56" data-section-id="{{ $courseSection->id }}">{{ $courseSection->status == 1 ? 'Published' : 'Unpublished' }}</a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @can('manage-course-section-content')--}}
{{--                                                <a href="{{ route('course-section-contents.index', ['section_id' => $courseSection->id,'course_id' => $_GET['course_id']]) }}" data-course-section-id="{{ $courseSection->id }}" class="btn btn-sm btn-success content-add-btn" title="Add Course Section Content">--}}
{{--                                                    <i class="fa-solid fa-circle-plus"></i>--}}
{{--                                                </a>--}}
{{--                                            @endcan--}}
{{--                                            @can('edit-course-section')--}}
{{--                                                <a href="" data-course-section-id="{{ $courseSection->id }}" class="btn btn-sm btn-warning course-section-edit-btn" title="Edit Course Section">--}}
{{--                                                    <i class="fa-solid fa-edit"></i>--}}
{{--                                                </a>--}}
{{--                                            @endcan--}}
{{--                                            @can('delete-course-section')--}}
{{--                                                <form class="d-inline" action="{{ route('course-sections.destroy', $courseSection->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('delete')--}}
{{--                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete Course Section">--}}
{{--                                                        <i class="fa-solid fa-trash"></i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            @endcan--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

{{--    form test design--}}

    <div class="modal fade modal-div" id="courseSectionModal" data-modal-parent="courseSectionModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="">
                <form id="courseSectionForm" action="{{ isset($courseSection) ? route('course-sections.update', $courseSection->id) : route('course-sections.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Create Course Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="card card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ request()->input('course_id') }}">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" required placeholder="Title" />
                                    <span class="text-danger" id="title">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Available at</label>
                                    <input type="text" id="dateTimexx" class="form-control" required name="available_at" placeholder="Available At" />
                                    <span class="text-danger" id="available_at">{{ $errors->has('available_at') ? $errors->first('available_at') : '' }}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="note" class="form-control" id="summernotexxx" placeholder="Description" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <label for="">Is Paid</label> <br>
{{--                                    <input type="checkbox" id="switch4" name="is_paid" switch="primary" />--}}
{{--                                    <label for="switch4" data-on-label="Yes" data-off-label="No"></label>--}}
                                    <div class="material-switch">
                                        <input id="someSwitchOptionWarningz" name="is_paid" type="checkbox" checked="">
                                        <label for="someSwitchOptionWarningz" class="label-info"></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Status</label> <br>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionInfoz" name="status" type="checkbox" checked="">
                                        <label for="someSwitchOptionInfoz" class="label-info"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary " value="save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



{{--    section contents modal start--}}
    <div class="modal fade " id="courseContentModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content" id="courseSectionContentForm">
                @include('backend.course-management.course.section-contents.form')
            </div>
        </div>
    </div>
    <div class="modal fade " id="courseContentShowModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content" id="courseSectionContentShowForm">

            </div>
        </div>
    </div>
    <div class="modal fade " id="setQuestionOnSectionContentModal" data-bs-backdrop="static" >
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
{{--    section contents modal end--}}

@endsection
@push('style')
    <!-- DragNDrop Css -->
{{--    <link href="{{ asset('/') }}backend/assets/css/dragNdrop.css" rel="stylesheet" type="text/css" />--}}
    <style>
        .datetimepicker {z-index: 100009!important;}
        input[switch]+label {
            margin-bottom: 0px;
        }
        .section-content-title i { font-size: 14px!important; }
    </style>
@endpush

@push('script')
    @include('backend.includes.assets.plugin-files.datatable')
{{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
    @include('backend.includes.assets.plugin-files.editor')
    <script src="{{ asset('/') }}backend/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
    <script>
        $(function () {
            $('input[data-dtp="dtp_Nufud"]').val(currentDateTime);
            $("#dateTimexx").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
            @if($errors->any())
            $('#courseSectionModal').modal('show');
            @endif
        })
    </script>
    {{--    store course--}}
    <script>
        $(document).on('click', '.course-section-modal-btn', function () {
            event.preventDefault();
            // resetInputFields();
            if ($('input[name="_method"]').length)
            {
                $('input[name="_method"]').remove();
            }
            $('#courseSectionForm').attr('action', "{{ route('course-sections.store') }}");
            $('#courseSectionModal').modal('show');
        })
    </script>
    <script>
        $(document).on('click', '.change-status', function () {
            event.preventDefault();
            var ele = $(this);
            var sectionId = $(this).attr('data-section-id');
            changeStatus('course_sections', sectionId, ele);
        })
    </script>

{{--    edit course category--}}
    <script>
        $(document).on('click', '.course-section-edit-btn', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-course-section-id'); //change value
            $.ajax({
                url: base_url+"course-sections/"+courseId+"/edit",
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    console.log(data.note);
                    $('#courseSectionForm input[name="title"]').val(data.title);
                    $('#courseSectionForm input[name="available_at"]').val(data.available_at);
                    $('#summernotexxx').summernote('destroy');
                    $('#courseSectionForm textarea[name="note"]').html(data.note);
                    $('#summernotexxx').summernote();
                    if (data.is_paid == 1)
                    {
                        $('#courseSectionForm input[name="is_paid"]').attr('checked', true);
                    } else {
                        $('#courseSectionForm input[name="is_paid"]').attr('checked', false);
                    }
                    if (data.status == 1)
                    {
                        $('#courseSectionForm input[name="status"]').attr('checked', true);
                    } else {
                        $('#courseSectionForm input[name="status"]').attr('checked', false);
                    }
                    // $('#dateTime').bootstrapMaterialDatePicker({
                    //     format: 'YYYY-MM-DD HH:mm'
                    // });
                    $("#dateTimexx").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0});
                    $('#courseSectionForm').attr('action', base_url+"course-sections/"+data.id).append('<input type="hidden" name="_method" value="put">');
                    $('#courseSectionModal').modal('show');
                }
            })
        })
    </script>
{{-- update course category--}}
    <script>
        // $(document).on('click', '.update-btn', function () {
        //     event.preventDefault();
        //     var formData = $('#courseCategoryForm').serialize();
        //     $.ajax({
        //         url: $('#courseCategoryForm').attr('action'),
        //         method: "PUT",
        //         data: formData,
        //         dataType: "JSON",
        //         // async: false,
        //         // cache: false,
        //         contentType: false,
        //         processData: false,
        //         // enctype: 'multipart/form-data',
        //         success: function (message) {
        //             // console.log(formData);
        //             toastr.success(message);
        //             $('.update-btn').addClass('submit-btn').removeClass('update-btn');
        //             $('#courseCategoryForm').attr('action', '');
        //             $('#courseCategoryModal').modal('hide');
        //             window.location.reload();
        //             resetInputFields();
        //         }
        //     })
        // })
    </script>











{{--    section content script starts here--}}
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
            // $('input[data-dtp="dtp_Nufud"]').val(currentDateTime);
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

{{--    open section content modal--}}
    <script>
        $(document).on('click', '.open-section-content-form-modal', function () {
            event.preventDefault();
            var sectionContentId = $(this).attr('data-section-id'); //change value
            $('input[name="course_section_id"]').val(sectionContentId);
            $.ajax({
                url: base_url + "course-section-contents/create?section_id=" + sectionContentId ,
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    var option = '';
                    $.each(data, function (key, value) {
                        option  += '<option value="'+value.id+'">'+value.title+'</option>';
                    })
                    $('#classXmOf').empty().append(option);
                    $('.select2').select2();
                    $('#courseContentModal').modal('show');
                }
            })
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
                    $('#courseSectionContentShowForm').empty().append(data);
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
                    $('#courseContentShowModal').modal('show');
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
                    // console.log(data);
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
                    // console.log(data);
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
                    // console.log(data);

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
                    // console.log(data);
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
                    // console.log(data);
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


    {{--    set value to input fields from modal start--}}
    <script>
        var ids = [];
        var topicNames = '';
        $(document).on('click', '#questionTopicInputField', function () {
            $('#questionTopicModal').modal('show');
            // $('#questionTopicModal').css('display', 'block');
        })
        $(document).on('click', '.check', function () {
            var existVal = $(this).val();
            var topicName = $(this).parent().text();
            if ($(this).is(':checked'))
            {
                if (!ids.includes(existVal))
                {
                    ids.push(existVal);
                    topicNames += topicName+',';
                }
            } else {
                if (ids.includes(existVal))
                {
                    ids.splice(ids.indexOf(existVal), 1);
                    topicNames = topicNames.replace(topicName+',','');
                    // topicNames = topicNames.split(topicName).join('');
                }
            }
        })
        $(document).on('click', '#okDone', function () {
            $('#questionTopicInputField').val(topicNames.slice(0, -1));
            $('#questionTopic').val(ids);
            $('#questionTopicModal').modal('hide');
        })
    </script>
    {{--    set value to input fields from modal ends--}}
    <!--show hide test start-->
    <script>
        $(document).on('click', '.drop-icon', function () {
            var dataId = $(this).attr('data-id');
            if ($(this).find('fa-circle-arrow-down'))
            {
                $(this).html('<i class="fa-solid fa-circle-arrow-up"></i>');
            }
            if($(this).find('fa-circle-arrow-up')) {
                $(this).html('<i class="fa-solid fa-circle-arrow-down"></i>');
            }
            if($('.childDiv'+dataId).hasClass('d-none'))
            {
                $('.childDiv'+dataId).removeClass('d-none');
            } else {
                $('.childDiv'+dataId).addClass('d-none');
            }
        })
        $(document).on('click', '.close-topic-modal', function () {
            // $('#questionTopicModal').css('display', 'none');
            $('#questionTopicModal').modal('hide');
        })
    </script>
    <!--show hide test end-->
{{--    section content script ends here--}}

@endpush
