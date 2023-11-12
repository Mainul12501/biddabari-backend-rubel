@extends('backend.master')

@section('title', 'Batch Exam Routines')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">Batch Exam Sections</h4>
                    <a href="{{ route('batch-exams.index') }}" title="Back to Batch Exams" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 m-r-50"><i class="fa-solid fa-arrow-left"></i></a>
                    @can('create-batch-exam-section')
                        <button type="button" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4 course-section-modal-btn"><i class="fa-solid fa-circle-plus"></i></button>
                    @endcan
                </div>
                <div class="card-body">



                    <div class="card-body">
                        <div class="py-5">
                            <div class="accordion" id="accordionExample">
                                @if(isset($batchExamSections))
                                    @foreach($batchExamSections as $key => $batchExamSection)
                                        <div class="accordion-item card p-3 mb-0">
                                            <div class="accordian_header" style="cursor: pointer">
                                                <div class="row">
                                                    <h3 class="col-sm-9" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}">
                                                        @if(count($batchExamSection->batchExamSectionContents) > 0)
                                                            <i class="fa-solid fa-arrow-circle-down f-s-16"></i>
                                                        @endif
                                                        <span class="f-s-18">{{ $batchExamSection->title }}</span>
                                                    </h3>
                                                    <div class="col-sm-3">
                                                        <div class="float-end">
                                                            {{--                                                        @can('add-sub-cat-to-notice-category')--}}
                                                            {{--                                                            <button type="button" data-notice-category-id="{{ $batchExamSection->id }}" class="btn btn-sm btn-info add-sub-category-btn" title="Add Sub Category">--}}
                                                            {{--                                                                <i class="fa-solid fa-plus"></i>--}}
                                                            {{--                                                            </button>--}}
                                                            {{--                                                        @endcan--}}
                                                            <a href="{{ route('change-order-number', ['model_name' => 'batch_exam_section', 'model_id' => $batchExamSection->id, 'order' => 'up']) }}" class="btn btn-sm btn-secondary " title="Change Order top One level">
                                                                <i class="fa-solid fa-arrow-up-long"></i>
                                                            </a>
                                                            <a href="{{ route('change-order-number', ['model_name' => 'batch_exam_section', 'model_id' => $batchExamSection->id, 'order' => 'down']) }}" class="btn btn-sm btn-secondary " title="Change Order Bottom One level">
                                                                <i class="fa-solid fa-arrow-down-long"></i>
                                                            </a>
                                                            @can('create-batch-exam-section')
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#courseContentModal" data-section-id="{{ $batchExamSection->id }}" class="btn btn-sm btn-info {{--add-sub-category-btn--}} open-section-content-form-modal" title="Add Section Content">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </button>
                                                            @endcan
                                                            @can('edit-batch-exam-section')
                                                                <a href="" data-course-section-id="{{ $batchExamSection->id }}" class="btn btn-sm btn-warning course-section-edit-btn" title="Edit Batch Exam Section">
                                                                    <i class="fa-solid fa-edit"></i>
                                                                </a>
                                                            @endcan
                                                            @can('delete-batch-exam-section')
                                                                <form class="d-inline" action="{{ route('batch-exam-sections.destroy', $batchExamSection->id) }}" method="post" >
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-sm btn-danger data-delete-form" title="Delete Batch Exam Section">
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
                                                    @if(isset($batchExamSection->batchExamSectionContents))
                                                        @include('backend.batch-exam-management.batch-exam-sections.show-nested-cats', ['sectionContents' => $batchExamSection->batchExamSectionContents, 'child' => 1])
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>



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
{{--                            @if(isset($batchExamSections))--}}
{{--                                @foreach($batchExamSections as $batchExamSection)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $loop->iteration }}</td>--}}
{{--                                        <td>{{ $batchExamSection->title }}</td>--}}
{{--                                        <td>{{ $batchExamSection->available_at }}</td>--}}
{{--                                        <td>{!! $batchExamSection->note !!}</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $batchExamSection->is_paid == 1 ? 'Paid' : 'Free' }}</a>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary change-status" style="background-color: #8fbd56" data-section-id="{{ $batchExamSection->id }}">{{ $batchExamSection->status == 1 ? 'Published' : 'Unpublished' }}</a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @can('manage-batch-exam-section-content')--}}
{{--                                            <a href="{{ route('batch-exam-section-contents.index', ['section_id' => $batchExamSection->id,'batch_exam_id' => $_GET['batch_exam_id']]) }}" data-course-section-id="{{ $batchExamSection->id }}" class="btn btn-sm btn-success content-add-btn" title="Add Batch Exam Section Content">--}}
{{--                                                <i class="fa-solid fa-circle-plus"></i>--}}
{{--                                            </a>--}}
{{--                                            @endcan--}}
{{--                                            @can('edit-batch-exam-section')--}}
{{--                                            <a href="" data-course-section-id="{{ $batchExamSection->id }}" class="btn btn-sm btn-warning course-section-edit-btn" title="Edit Batch Exam Section">--}}
{{--                                                <i class="fa-solid fa-edit"></i>--}}
{{--                                            </a>--}}
{{--                                                @endcan--}}
{{--                                            @can('delete-batch-exam-section')--}}
{{--                                            <form class="d-inline" action="{{ route('batch-exam-sections.destroy', $batchExamSection->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">--}}
{{--                                                @csrf--}}
{{--                                                @method('delete')--}}
{{--                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Batch Exam Section">--}}
{{--                                                    <i class="fa-solid fa-trash"></i>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                                @endcan--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
                </div>
            </div>
        </div>
    </div>

{{--    form test design--}}

    <div class="modal fade modal-div" id="courseSectionModal" data-modal-parent="courseSectionModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="">
                <form id="courseSectionForm" action="{{ isset($batchExamSection) ? route('batch-exam-sections.update', $batchExamSection->id) : route('batch-exam-sections.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Create Batch Exam Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="card card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    @csrf
                                    <input type="hidden" name="batch_exam_id" value="{{ request()->input('batch_exam_id') }}">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" required placeholder="Title" />
                                    <span class="text-danger" id="title">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Available at</label>
                                    <input type="text" id="dateTimezz" class="form-control" required data-dtp="dtp_Nufud" name="available_at"  placeholder="Available At" />
                                    <span class="text-danger" id="available_at">{{ $errors->has('available_at') ? $errors->first('available_at') : '' }}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="note" class="form-control" id="summernotezz" placeholder="Description" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <label for="">Is Paid</label> <br>
{{--                                    <input type="checkbox" id="switch4" name="is_paid" switch="primary" />--}}
{{--                                    <label for="switch4" data-on-label="Yes" data-off-label="No"></label>--}}
                                    <div class="material-switch">
                                        <input id="someSwitchOptionWarningzz" name="is_paid" type="checkbox" checked="">
                                        <label for="someSwitchOptionWarningzz" class="label-info"></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Status</label> <br>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionInfozz" name="status" type="checkbox" checked="">
                                        <label for="someSwitchOptionInfozz" class="label-info"></label>
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



{{--    section content html code starts--}}
    <div class="modal fade modal-div" id="courseContentModal" data-modal-parent="courseContentModal" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="courseSectionContentForm">
                @include('backend.batch-exam-management.section-contents.form')
            </div>
        </div>
    </div>
    <div class="modal fade modal-div" id="courseContentShowModal" data-modal-parent="courseContentModal" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="courseSectionContentShowForm">

            </div>
        </div>
    </div>
    <div class="modal fade modal-div" id="setQuestionOnSectionContentModal" >
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
    <div class="modal fade " id="courseVideoPdfContentShowModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content" id="">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="d-none" id="pdfContentPrintDiv">
                        <div class="" style="">
                            <div id="pdf-container"></div>
                        </div>
                    </div>
                    <div id="videoShowSection" class="d-none">
                        <div class="private d-none">
                            <video class="w-100 video" height="500" controls="controls" controlist="nodownload">
                                <source id="privatVid" src="//samplelib.com/lib/preview/mp4/sample-5s.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="youtube d-none">
                            {{--                            <iframe style="width: 100%!important;" id="youtubePlayer" height="500" src="" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; " allowfullscreen></iframe>--}}
                            {{--                            <iframe width="560" height="315" src="https://www.youtube.com/embed/PNF0OJITows" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
                            <div class="video-container" >
                                <div class="video-foreground">
                                    <iframe style="width: 100%!important;" height="500" id="youtubePlayer" src="" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" ></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="vimeo d-none">
                            <div style="padding:56.25% 0 0 0;position:relative;">
                                <iframe id="vimeoPlayer" src="" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
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
        .datetimepicker {z-index: 100009!important;}
        .section-content-title i { font-size: 14px!important; }
    </style>
    <style>
        /*.canvas-container, canvas { !*width: 100%!important;*! margin-top: 10px!important;}*/
    </style>
    <style>
        .video-container{
            width:100%!important;
            height: 440px;
            overflow:hidden;
            position:relative;
        }
        .video-container iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .video-container iframe{
            position: absolute;
            top: -60px;
            left: 0;
            width: 100%;
            /*height: calc(80% + 100px);*/
            height: 500px!important;
        }
        .video-foreground{
            pointer-events:auto;
        }

    </style>
@endpush

@push('script')
    @if($errors->any())
        <script>
            $(function () {
                // $('input[data-dtp="dtp_Nufud"]').val(currentDateTime);
                $('#courseSectionModal').modal('show');
            })
        </script>
    @endif

    @include('backend.includes.assets.plugin-files.datatable')
{{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
    @include('backend.includes.assets.plugin-files.editor')
    <script src="{{ asset('/') }}backend/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    <script>pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js';</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.0/fabric.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/pdf-draw/arrow.fabric.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/pdf-draw/pdfannotate.js"></script>
    <script>

        function changeActiveTool(event) {
            var element = $(event.target).hasClass("tool-button")
                ? $(event.target)
                : $(event.target).parents(".tool-button").first();
            $(".tool-button.active").removeClass("active");
            $(element).addClass("active");
        }

        function enableSelector(event) {
            event.preventDefault();
            changeActiveTool(event);
            pdf.enableSelector();
        }

        function enablePencil(event) {
            event.preventDefault();
            changeActiveTool(event);
            pdf.enablePencil();
        }

        function enableAddText(event) {
            event.preventDefault();
            changeActiveTool(event);
            pdf.enableAddText();
        }

        function enableAddArrow(event) {
            event.preventDefault();
            changeActiveTool(event);
            pdf.enableAddArrow();
        }

        function addImage(event) {
            event.preventDefault();
            pdf.addImageToCanvas()
        }

        function enableRectangle(event) {
            event.preventDefault();
            changeActiveTool(event);
            pdf.setColor('rgba(255, 0, 0, 0.3)');
            pdf.setBorderColor('blue');
            pdf.enableRectangle();
        }

        function deleteSelectedObject(event) {
            event.preventDefault();
            pdf.deleteSelectedObject();
        }

        function savePDF() {
            // pdf.savePdf();
            pdf.savePdf("written-ans"); // save with given file name
        }

        function clearPage() {
            pdf.clearActivePage();
        }

        function showPdfData() {
            var string = pdf.serializePdf();
            $('#dataModal .modal-body pre').first().text(string);
            PR.prettyPrint();
            $('#dataModal').modal('show');
        }

        $(function () {
            $('.color-tool').click(function () {
                $('.color-tool.active').removeClass('active');
                $(this).addClass('active');
                color = $(this).get(0).style.backgroundColor;
                pdf.setColor(color);
            });

            $('#brush-size').change(function () {
                var width = $(this).val();
                pdf.setBrushSize(width);
            });

            $('#font-size').change(function () {
                var font_size = $(this).val();
                pdf.setFontSize(font_size);
            });
        });

    </script>

    <script>
        $(document).on('click', '.show-pdf-video-btn', function () {
            event.preventDefault();
            var dataContentType = $(this).attr('data-content-type');
            if (dataContentType == 'pdf')
            {
                var pdflink = $(this).attr('data-pdf-url');

                $('#pdf-container').empty();
                var pdf = new PDFAnnotate("pdf-container", pdflink, {
                    onPageUpdated(page, oldData, newData) {
                        console.log(page, oldData, newData);
                    },
                    ready() {
                        console.log("Plugin initialized successfully");
                    },
                    scale: 1.5,
                    pageImageCompression: "MEDIUM", // FAST, MEDIUM, SLOW(Helps to control the new PDF file size)
                });
                $('#pdfContentPrintDiv').removeClass('d-none');
                $('#videoShowSection').addClass('d-none');
            } else if (dataContentType == 'video')
            {
                var videoVendor = $(this).attr('data-video-vendor');
                var videoLink = $(this).attr('data-video-url');
                // console.log(videoLink);
                if (videoVendor == 'youtube')
                {
                    // const arrayOne = videoLink.split('https://www.youtube.com/watch?v=')
                    const arrayOne = videoLink.split('https://youtu.be/')
                    var splitVidUrl = arrayOne[1].split('&')[0];
                    $('.youtube').removeClass('d-none');
                    $('.private').addClass('d-none');
                    $('.vimeo').addClass('d-none');
                    $('#youtubePlayer').attr('src', 'https://www.youtube.com/embed/'+splitVidUrl+'?rel=0&amp;modestbranding=1');
                    // $('.video-modal').modal('show');
                } else if (videoVendor == 'private')
                {
                    $('.private').removeClass('d-none');
                    $('.youtube').addClass('d-none');
                    $('.vimeo').addClass('d-none');
                    $('#privatVid').attr('src', videoLink);
                    // $('.video-modal').modal('show');
                } else if (videoVendor == 'vimeo')
                {
                    $('.private').removeClass('d-none');
                    $('.youtube').addClass('d-none');
                    $('.vimeo').addClass('d-none');
                    $('#vimeoPlayer').attr('src', 'https://player.vimeo.com/video/'+videoLink+'?h=627084a88d&autoplay=0&loop=1&title=0&byline=0&portrait=0');
                    // $('.video-modal').modal('show');
                }
                $('#pdfContentPrintDiv').addClass('d-none');
                $('#videoShowSection').removeClass('d-none');
            }
            $('#courseVideoPdfContentShowModal').modal('show');
        })
    </script>

    {{--    store course--}}
    <script>
        $(function () {
            $('input[data-dtp="dtp_Nufud"]').val(currentDateTime);
            $("#dateTimezz").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
        })
        $(document).on('click', '.course-section-modal-btn', function () {
            event.preventDefault();
            // resetInputFields();
            if ($('input[name="_method"]').length)
            {
                $('input[name="_method"]').remove();
            }
            $('#courseSectionForm').attr('action', "{{ route('batch-exam-sections.store') }}");
            $('#courseSectionModal').modal('show');
        })
    </script>
    <script>
        $(document).on('click', '.change-status', function () {
            event.preventDefault();
            var ele = $(this);
            var sectionId = $(this).attr('data-section-id');
            changeStatus('batch_exam_sections', sectionId, ele);
        })
    </script>

{{--    edit course category--}}
    <script>
        $(document).on('click', '.course-section-edit-btn', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-course-section-id'); //change value
            $.ajax({
                url: base_url+"batch-exam-sections/"+courseId+"/edit",
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    // console.log(data.note);
                    $('#courseSectionForm input[name="title"]').val(data.title);
                    $('#courseSectionForm input[name="available_at"]').val(data.available_at);
                    $('#summernotezz').summernote('destroy');
                    $('#courseSectionForm textarea[name="note"]').html(data.note);
                    $('#summernotezz').summernote();
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
                    $("#dateTimezz").datetimepicker({format: "yyyy-mm-dd hh:ii", autoclose: !0})
                    $('#courseSectionForm').attr('action', base_url+"batch-exam-sections/"+data.id).append('<input type="hidden" name="_method" value="put">');
                    $('#courseSectionModal').modal('show');
                }
            })
        })
    </script>






{{--    batch exam section content script codes--}}

    {{--    open section content modal--}}
    <script>
        $(document).on('click', '.open-section-content-form-modal', function () {
            event.preventDefault();
            var sectionContentId = $(this).attr('data-section-id'); //change value
            $('input[name="batch_exam_section_id"]').val(sectionContentId);
            // $.ajax({
            //     url: base_url + "course-section-contents/create?section_id=" + sectionContentId ,
            //     method: "GET",
            //     // dataType: "JSON",
            //     success: function (data) {
            //         var option = '';
            //         $.each(data, function (key, value) {
            //             option  += '<option value="'+value.id+'">'+value.title+'</option>';
            //         })
            //         $('#classXmOf').empty().append(option);
            //         $('.select2').select2();
            //         $('#courseContentModal').modal('show');
            //     }
            // })
            $('#courseContentModal').modal('show');
        })
    </script>
    <script>
        $(function () {
            $('#summernote1').summernote({height:70,inheritPlaceholder: true});
            $('#summernote2').summernote({height:70,inheritPlaceholder: true});
            $('#summernote3').summernote({height:70,inheritPlaceholder: true});
            $('#summernote4').summernote({height:50,inheritPlaceholder: true});
            $('input[data-dtp="dtp_Nufud"]').val(currentDateTime);
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
                url: base_url+"batch-exam-section-contents/"+sectionContentId+"/edit",
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
                url: base_url+"batch-exam-section-contents/"+sectionContentId,
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
            } else if(contentType == 'note')
            {
                addHideClassToSelector('typeNote');
            } else if(contentType == 'exam')
            {
                addHideClassToSelector('typeExam');
            } else if(contentType == 'written_exam')
            {
                addHideClassToSelector('typeWrittenExam');
            }

        })

        function addHideClassToSelector(selector) {
            var idData = ['typePdf','typeNote','typeExam','typeWrittenExam'];
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
            window.location = base_url+"batch-exam-section-contents?section_id="+sectionId+"&batch_exam_id={{ $_GET['batch_exam_id'] }}";
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
                url: base_url+"get-batch-exam-content-for-add-question",
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
                url: base_url+"detach-question-from-content",
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
                    // var div = '';
                    // $.each(data, function (key, topic) {
                    //     div += '';
                    // })
                    // $('#queCard').empty().append(data);
                },
                error: function ($error) {
                    toastr.error($error);
                }
            })
        });
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

@endpush
