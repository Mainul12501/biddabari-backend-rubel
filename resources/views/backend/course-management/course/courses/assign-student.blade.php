@extends('backend.master')

@section('title', 'Course Students')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">{{ $course->title }} Students</h4>
                    <a href="{{ route('courses.index') }}" title="Back to Courses" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 m-r-50"><i class="fa-solid fa-arrow-left"></i></a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#coursesModal" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
                <div class="card-body">
                    <table class="table" id="file-datatable">
                        <thead>
                        <tr>
                            {{--                                <th>#</th>--}}
                            <th>Name</th>
{{--                            <th>Email</th>--}}
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($course))
                            @foreach($course->students as $student)
                                <tr>
                                    <td>{{ $student->user->name }}</td>
{{--                                    <td>{{ $student->user->email }}</td>--}}
                                    <td>{{ $student->user->mobile }}</td>
                                    <td>{{ $student->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
{{--                                        <a href="" data-course-id="{{ $course->id }}" class="btn btn-sm btn-warning edit-btn" title="Edit Course">--}}
{{--                                            <i class="mdi mdi-circle-edit-outline"></i>--}}
{{--                                        </a>--}}
                                        <form class="d-inline" action="{{ route('detach-student', $course->id) }}" method="post" onsubmit="return confirm('Are you sure to Detach this Student from this course?')">                                            @csrf
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Detach Student from this Course?">
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
    <div class="modal fade modal-div" id="coursesModal" data-modal-parent="coursesModal" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modalForm">
                <form action="{{ route('assign-student', ['course_id' => $course->id]) }}" method="post" enctype="multipart/form-data" id="coursesForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Students</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{--                    <input type="hidden" name="category_id" >--}}
                    <div class="modal-body">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-12 select2-div">
                                    <label for="">Assign Students</label>
                                    <select name="students[]" required class="form-control select2"  multiple data-placeholder="Assign Students" >
                                        <option label="Assign Students"></option>
                                        @if(isset($students))
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}" >{{ $student->user->mobile }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="text-danger" id="name">{{ $errors->has('students') ? $errors->first('students') : '' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit-btn" value="save">Save</button>
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
        input[switch]+label {
            margin-bottom: 0px;
        }
    </style>
@endpush

@push('script')

@include('backend.includes.assets.plugin-files.datatable')
@if($errors->any())
    <script>
        $(function () {
            $('#coursesModal').modal('show');
        })
    </script>
@endif
    {{--    edit course category--}}
    <script>
        $(document).on('click', '.edit-btn', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-course-id');
            console.log(courseId);
            $.ajax({
                url: base_url+"courses/"+courseId+"/edit",
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    $('#modalForm').empty().append(data);

                    $('.select2').select2({
                        placeholder: $(this).attr('data-placeholder'),
                        dropdownParent: $('#'+$('.modal-fix').attr('data-modal-parent')),
                        // dropdownParent: $('.modal').attr('data-modal-parent'),
                    });


                    $('#coursesModal').modal('show');
                }
            })
        })
    </script>
    {{-- update course category--}}
{{--    <script>--}}
{{--        $(document).on('click', '.update-btn', function () {--}}
{{--            event.preventDefault();--}}
{{--            var formData = $('#courseCategoryForm').serialize();--}}
{{--            $.ajax({--}}
{{--                url: $('#courseCategoryForm').attr('action'),--}}
{{--                method: "PUT",--}}
{{--                data: formData,--}}
{{--                dataType: "JSON",--}}
{{--                // async: false,--}}
{{--                // cache: false,--}}
{{--                contentType: false,--}}
{{--                processData: false,--}}
{{--                // enctype: 'multipart/form-data',--}}
{{--                success: function (message) {--}}
{{--                    // console.log(formData);--}}
{{--                    toastr.success(message);--}}
{{--                    $('.update-btn').addClass('submit-btn').removeClass('update-btn');--}}
{{--                    $('#courseCategoryForm').attr('action', '');--}}
{{--                    $('#courseCategoryModal').modal('hide');--}}
{{--                    window.location.reload();--}}
{{--                    resetInputFields();--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
{{--    <!-- DragNDrop js -->--}}

{{--    --}}{{--    <script src="{{ asset('/') }}backend/assets/js/dragNdrop/init.js"></script>--}}


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
