@extends('backend.master')

@section('title', 'Course Routines')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">Course Routines</h4>
                    <a href="{{ route('courses.index') }}" title="Back to Courses" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 m-r-50"><i class="fa-solid fa-arrow-left"></i></a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#coursesModal" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
                <div class="card-body">
                    <table class="table" id="file-datatable">
                        <thead>
                            <tr>
{{--                                <th>#</th>--}}
                                <th>Date</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Fack Status</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($courseRoutines))
                                @foreach($courseRoutines as $courseRoutine)
                                    <tr>
{{--                                        <td>{{ $loop->iteration }}</td>--}}
                                        <td>{{ $courseRoutine->date_time }}</td>
                                        <td>{{ $courseRoutine->day }}</td>
                                        <td>{{ $courseRoutine->date_time }}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="nav-link">{{ $courseRoutine->is_fack == 1 ? 'Yes' : 'No' }}</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="nav-link">{{ $courseRoutine->status == 1 ? 'Published' : 'Unpublished' }}</a>
                                        </td>
                                        <td>
                                            <a href="" data-course-routine-id="{{ $courseRoutine->id }}" class="btn btn-sm btn-warning edit-btn" title="Edit Course Routine">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('course-routines.destroy', $courseRoutine->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Course Routine">
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
    <div class="modal fade modal-div" id="coursesModal" data-bs-backdrop="static" data-modal-parent="coursesModal" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="modalForm">
                @include('backend.course-management.course.course-routines.form')
            </div>
        </div>
    </div>
@endsection
@push('style')
{{--    date time picker--}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">


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
{{--    datatables js--}}
@include('backend.includes.assets.plugin-files.datatable')
{{--@include('backend.includes.assets.plugin-files.date-time-picker')--}}
@if($errors->any())
    <script>
        $(function () {
            $('#coursesModal').modal('show');
        })
    </script>
@endif
{{--datetime picker--}}
{{--    <script src="{{ asset('/') }}backend/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>--}}
    <script src="{{ asset('/') }}backend/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
    <script>
        $(function () {
            // $('#dateTime').bootstrapMaterialDatePicker({
            //     format: 'YYYY-MM-DD HH:mm'
            // });
            $("#dateTime").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
        });
    </script>

    {{--    store course--}}
    <script>
        {{--$(document).on('click', '.submit-btn', function () {--}}
        {{--    event.preventDefault();--}}
        {{--    var form = $('#coursesForm')[0];--}}
        {{--    var formData = new FormData(form);--}}
        {{--    $.ajax({--}}
        {{--        url: "{{ route('course-routines.store') }}",--}}
        {{--        method: "POST",--}}
        {{--        data: formData,--}}
        {{--        dataType: "JSON",--}}
        {{--        contentType: false,--}}
        {{--        processData: false,--}}
        {{--        success: function (message) {--}}
        {{--            // console.log(message);--}}
        {{--            toastr.success(message);--}}
        {{--            $('#coursesModal').modal('hide');--}}
        {{--            resetInputFields();--}}
        {{--            window.location.reload();--}}
        {{--        }--}}
        {{--    })--}}
        {{--})--}}
    </script>

{{--    edit course category--}}
    <script>
        $(document).on('click', '.edit-btn', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-course-routine-id');
            $.ajax({
                url: base_url+"course-routines/"+courseId+"/edit",
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    $('#modalForm').empty().append(data);

                    // $('#dateTime').bootstrapMaterialDatePicker({
                    //     format: 'YYYY-MM-DD HH:mm'
                    // });
                    $("#dateTime").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})

                    $('.select2').select2({
                        placeholder: $(this).attr('data-placeholder'),
                        // dropdownParent: $('#'+$('.modal-fix').attr('data-modal-parent')),
                        // dropdownParent: $('.modal').attr('data-modal-parent'),
                    });


                    $('#coursesModal').modal('show');
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

    <script>
        $(document).ready(function() {
            $('#categoryImage').change(function() {
                var imgURL = URL.createObjectURL(event.target.files[0]);
                $('#imagePreview').attr('src', imgURL).css({
                    height: 150+'px',
                    width: 150+'px',
                    marginTop: '5px'
                });
            });
        });
    </script>
@endpush
