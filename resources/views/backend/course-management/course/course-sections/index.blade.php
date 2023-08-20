@extends('backend.master')

@section('title', 'Course Routines')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">Course Sections</h4>
                    <a href="{{ route('courses.index') }}" title="Back to Courses" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 m-r-50"><i class="fa-solid fa-arrow-left"></i></a>
                    <button type="button" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4 course-section-modal-btn"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
                <div class="card-body">


                    <table class="table" id="file-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Available at</th>
                                <th>Description</th>
                                <th>Features</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($courseSections))
                                @foreach($courseSections as $courseSection)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $courseSection->title }}</td>
                                        <td>{{ $courseSection->available_at }}</td>
                                        <td>{!! $courseSection->note !!}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $courseSection->is_paid == 1 ? 'Paid' : 'Free' }}</a>
                                            <a href="javascript:void(0)" class="badge bg-primary change-status" style="background-color: #8fbd56" data-section-id="{{ $courseSection->id }}">{{ $courseSection->status == 1 ? 'Published' : 'Unpublished' }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('course-section-contents.index', ['section_id' => $courseSection->id,'course_id' => $_GET['course_id']]) }}" data-course-section-id="{{ $courseSection->id }}" class="btn btn-sm btn-success content-add-btn" title="Add Course Section Content">
                                                <i class="fa-solid fa-circle-plus"></i>
                                            </a>
                                            <a href="" data-course-section-id="{{ $courseSection->id }}" class="btn btn-sm btn-warning course-section-edit-btn" title="Edit Course Section">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('course-sections.destroy', $courseSection->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Course Section">
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
                                    <input type="text" id="dateTime" class="form-control" required name="available_at" placeholder="Available At" />
                                    <span class="text-danger" id="available_at">{{ $errors->has('available_at') ? $errors->first('available_at') : '' }}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="note" class="form-control" id="summernote" placeholder="Description" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <label for="">Is Paid</label> <br>
{{--                                    <input type="checkbox" id="switch4" name="is_paid" switch="primary" />--}}
{{--                                    <label for="switch4" data-on-label="Yes" data-off-label="No"></label>--}}
                                    <div class="material-switch">
                                        <input id="someSwitchOptionWarning" name="is_paid" type="checkbox" checked="">
                                        <label for="someSwitchOptionWarning" class="label-info"></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Status</label> <br>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionInfo" name="status" type="checkbox" checked="">
                                        <label for="someSwitchOptionInfo" class="label-info"></label>
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
    @include('backend.includes.assets.plugin-files.datatable')
{{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
    @include('backend.includes.assets.plugin-files.editor')
    <script src="{{ asset('/') }}backend/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
    <script>
        $(function () {
            $("#dateTime").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
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
                    // console.log(data.note);
                    $('input[name="title"]').val(data.title);
                    $('input[name="available_at"]').val(data.available_at);
                    $('#summernote').summernote('destroy');
                    $('textarea[name="note"]').html(data.note);
                    $('#summernote').summernote();
                    if (data.is_paid == 1)
                    {
                        $('input[name="is_paid"]').attr('checked', true);
                    } else {
                        $('input[name="is_paid"]').attr('checked', false);
                    }
                    if (data.status == 1)
                    {
                        $('input[name="status"]').attr('checked', true);
                    } else {
                        $('input[name="status"]').attr('checked', false);
                    }
                    // $('#dateTime').bootstrapMaterialDatePicker({
                    //     format: 'YYYY-MM-DD HH:mm'
                    // });
                    $("#dateTime").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0});
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

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#categoryImage').change(function() {--}}
{{--                var imgURL = URL.createObjectURL(event.target.files[0]);--}}
{{--                $('#imagePreview').attr('src', imgURL).css({--}}
{{--                    height: 150+'px',--}}
{{--                    width: 150+'px',--}}
{{--                    marginTop: '5px'--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


@endpush
