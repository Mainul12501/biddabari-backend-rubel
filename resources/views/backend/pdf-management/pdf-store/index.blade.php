@extends('backend.master')

@section('title', 'PDF Stores')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">PDF Store</h4>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#coursesModal" class="rounded-circle open-modal text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
                <div class="card-body">
                    <table class="table" id="file-datatable">
                        <thead>
                            <tr>
{{--                                <th>#</th>--}}
                                <th>PDF Category</th>
                                <th>Title</th>
{{--                                <th>Ext Link</th>--}}
                                <th>PDF file</th>
{{--                                <th>Size</th>--}}
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($pdfStores))
                                @foreach($pdfStores as $pdfStore)
                                    <tr>
{{--                                        <td>{{ $loop->iteration }}</td>--}}
                                        <td>{{ $pdfStore->pdfStoreCategory->title }}</td>
                                        <td>{{ $pdfStore->title }}</td>
{{--                                        <td><a href="{{ $pdfStore->file_external_link }}" target="_blank">External Link</a></td>--}}
                                        <td>
                                            <a href="{{ asset($pdfStore->file_url) }}" target="_blank">{{ $pdfStore->title }}</a>
                                        </td>
                                        <td>{{ $pdfStore->slug }}</td>
                                        <td>
                                            <a href="" data-blog-id="{{ $pdfStore->id }}" class="btn btn-sm btn-warning edit-btn" title="Edit Blog">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('pdf-stores.destroy', $pdfStore->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Blog">
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
                @include('backend.pdf-management.pdf-store.form')
            </div>
        </div>
    </div>
@endsection
@push('style')
    <!-- DragNDrop Css -->
{{--    <link href="{{ asset('/') }}backend/assets/css/dragNdrop.css" rel="stylesheet" type="text/css" />--}}

@endpush

@push('script')
{{--    datatable--}}
@include('backend.includes.assets.plugin-files.datatable')
@include('backend.includes.assets.plugin-files.editor')

<script>
    $(document).on('click', '.open-modal', function () {
        event.preventDefault();
        // resetForm('coursesForm');
        $('#coursesModal').modal('show');
    })
</script>

    {{--    store course--}}
    <script>
        $(document).on('click', '.submit-btn', function () {
            event.preventDefault();
            var form = $('#coursesForm')[0];
            var formData = new FormData(form);
            $.ajax({
                url: "{{ route('pdf-stores.store') }}",
                method: "POST",
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function (message) {
                    // console.log(message);
                    toastr.success(message);
                    $('#coursesModal').modal('hide');
                    window.location.reload();
                },
                error: function (errors) {
                    if (errors.responseJSON)
                    {
                        $('span[class="text-danger"]').empty();
                        var allErrors = errors.responseJSON.errors;
                        for (key in allErrors)
                        {
                            $('#'+key).empty().append(allErrors[key]);
                        }
                    }
                }
            })
        })
    </script>

{{--    edit course category--}}
    <script>
        $(document).on('click', '.edit-btn', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-blog-id');
            $.ajax({
                url: base_url+"pdf-stores/"+courseId+"/edit",
                method: "GET",
                success: function (data) {
                    $('#modalForm').empty().append(data);

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
            $('#image').change(function() {
                var imgURL = URL.createObjectURL(event.target.files[0]);
                $('#imagePreview').attr('src', imgURL).css({
                    height: 150+'px',
                    width: 150+'px',
                    marginTop: '5px'
                });
            });
        });
    </script>
<script>
    $(document).on('keyup', 'input:not(#discountAmount),textarea', function () {
        var selectorId = $(this).attr('name');
        if ($('#'+selectorId).text().length)
        {
            $('#'+selectorId).text('');
        }
    })
    $(document).on('change', 'select', function () {
        var selectorId = $(this).attr('name');
        if ($('#'+selectorId).text().length)
        {
            $('#'+selectorId).text('');
        }
    })
    {{--        // date time error empty not working--}}
    {{--        // $(document).on('click', '#dateTime', function () {--}}
    {{--        //     var selectorId = $(this).attr('name');--}}
    {{--        //     alert('hi');--}}
    {{--        //     if ($('#'+selectorId).text().length)--}}
    {{--        //     {--}}
    {{--        //         $('#'+selectorId).text('');--}}
    {{--        //     }--}}
    {{--        // })--}}
</script>
@endpush
