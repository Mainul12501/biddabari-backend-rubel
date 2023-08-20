@extends('backend.master')

@section('title', 'Exam Sheets')

@section('body')
    <div class="row mt-5">
        <div class="col-sm-8 mx-auto">
            <div class="card card-body">
                <form action="" method="get">
                    {{--                    @csrf--}}
                    <div class="row" >
                        <div class="col select2-div">
                            <label for="">Exam Name</label>
                            <select name="exam_id" class="form-control select2" id="courseId" data-placeholder="Select a Exam">
                                <option value=""></option>
                                @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <input type="submit" class="btn btn-success ms-4 " style="margin-top: 18px" value="Search" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(isset($examSheets) && !empty($examSheets))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Manage Exam Sheets</h2>
                    </div>
                    <div class="card-body">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Exam Name</th>
                                <th>Student Name</th>
                                <th>Xm File</th>
                                <th>Total Mark</th>
                                <th>Result Mark</th>
                                <th>Result Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($examSheets))
                                @foreach($examSheets as $examSheet)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $examSheet->exam->title ?? '' }}</td>
                                        <td>{{ $examSheet->user->name ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('check-xm-paper', ['id' => $examSheet->id]) }}" target="_blank" >pdf file</a>
                                        </td>
                                        <td>{{ $examSheet->exam->total_mark ?? '' }}</td>
                                        <td>{{ $examSheet->result_mark ?? '' }}</td>
                                        <td>{{ $examSheet->status ?? '' }}</td>
                                        <td>
                                        <a href="" data-blog-category-id="{{ $examSheet->id }}" class="btn btn-sm btn-warning blog-category-edit-btn" title="Change Order Status">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
{{--                                        <a href="" data-blog-category-id="{{ $examSheet->id }}" class="btn btn-sm btn-primary blog-category-edit-btnx" title="Change Order Status">--}}
{{--                                                <i class="fa-solid fa-edit"></i>--}}
{{--                                            </a>--}}
                                        {{--                                            <form class="d-inline" action="{{ route('course-orders.destroy', $examSheet->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">--}}
                                        {{--                                                @csrf--}}
                                        {{--                                                @method('delete')--}}
                                        {{--                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Blog Category">--}}
                                        {{--                                                    <i class="fa-solid fa-trash"></i>--}}
                                        {{--                                                </button>--}}
                                        {{--                                            </form>--}}
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
    @endif
    <div class="modal fade modal-div" id="blogCategoryModal" data-modal-parent="blogCategoryModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="">
                <form id="courseSectionForm" action="{{ route('update-xm-result') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update Course Order Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-body">
                            @csrf
                            {{--                            <input type="hidden" id="courseIdEdit" name="edit_course_id" />--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="paidAmount">result Mark</label>
                                    <input type="text" class="form-control" name="result_mark" id="resultMark" placeholder="Result Mark" />
                                    <input type="hidden" class="form-control" name="xm_result_id" id="xmResultId" />
                                </div>
                                <div class="col-md-6">
                                    <label for="paidAmount">Upload File</label>
                                    <input type="file" class="form-control" name="written_xm_file" placeholder="Written Xm File" />
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

@push('script')

    @include('backend.includes.assets.plugin-files.datatable')
    {{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
    {{--    @include('backend.includes.assets.plugin-files.editor')--}}

    {{--    edit course category--}}
    <script>
        $(document).on('click', '.blog-category-edit-btn', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-blog-category-id'); //change value
            $('#xmResultId').val(courseId);
            $.ajax({
                url: base_url+"get-exam-sheet-data/"+courseId,
                method: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#resultMark').val(data.result_mark);
                    $('#blogCategoryModal').modal('show');
                }
            })

        })
    </script>
@endpush
