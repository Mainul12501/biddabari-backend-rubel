@extends('backend.master')

@section('title', 'Batch Exam Students')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">{{ $batchExam->title }} Students</h4>
                    <a href="{{ route('batch-exams.index') }}" title="Back to Batch Exams" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 m-r-50"><i class="fa-solid fa-arrow-left"></i></a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#coursesModal" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
                <div class="card-body">
                    <table class="table" id="file-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($batchExam))
                            @foreach($batchExam->students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    <td>{{ $student->user->email }}</td>
                                    <td>{{ $student->user->mobile }}</td>
                                    <td>{{ $student->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
{{--                                        <a href="" data-course-id="{{ $batchExam->id }}" class="btn btn-sm btn-warning edit-btn" title="Edit Course">--}}
{{--                                            <i class="mdi mdi-circle-edit-outline"></i>--}}
{{--                                        </a>--}}
                                        <form class="d-inline" action="{{ route('detach-batch-exam-student', $batchExam->id) }}" method="post" onsubmit="return confirm('Are you sure to Detach this Student from this Batch Exam?')">                                            @csrf
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Detach Student from this Batch Exam?">
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
                <form action="{{ route('assign-batch-exam-student', ['batch_exam_id' => $batchExam->id]) }}" method="post" enctype="multipart/form-data" id="coursesForm">
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
@endpush
