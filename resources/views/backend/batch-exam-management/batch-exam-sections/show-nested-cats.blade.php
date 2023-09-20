
@foreach($sectionContents as $index => $sectionContent)
    <div class="row card-body border-0 py-1" >
        <h3 class="col-sm-9">
            @if(count($sectionContent->batchExamSectionContents) > 0)
                <i class="fa-solid fa-arrow-circle-down f-s-16"></i>
            @endif
            <span class="f-s-18 section-content-title">
                @if($sectionContent->content_type == 'pdf')
                    <i class="fa-regular fa-file-pdf"></i>
                @endif

                @if($sectionContent->content_type == 'note')
                    <i class="fa-regular fa-note-sticky"></i>
                @endif
                @if($sectionContent->content_type == 'exam')
                    <i class="fa-regular fa-note-sticky"></i>
                @endif
                @if($sectionContent->content_type == 'written_exam')
                    <i class="fa-regular fa-paste"></i>
                @endif
                {{ $sectionContent->title }}
            </span>
        </h3>
        <div class="col-sm-3">
            <div class="float-end">
{{--                @can('create-course-section-content')--}}
{{--                    <button type="button"  data-section-id="{{ $sectionContent->courseSection->id }}" class="btn btn-sm btn-info --}}{{--add-sub-category-btn--}}{{-- open-section-content-form-modal" title="Add Section Content">--}}
{{--                        <i class="fa-solid fa-plus-square"></i>--}}
{{--                    </button>--}}
{{--                @endcan--}}
                @if($sectionContent->content_type == 'pdf')
                    <a href="" data-course-id="{{ $sectionContent->id }}" data-content-type="{{ $sectionContent->content_type }}" @if($sectionContent->content_type == 'pdf') data-pdf-url="{{ isset($sectionContent->pdf_link) ? $sectionContent->pdf_link : (isset($sectionContent->pdf_file) ? $sectionContent->pdf_file : '') }}" @endif @if($sectionContent->content_type == 'video') data-video-vendor="{{ $sectionContent->video_vendor }}" data-video-url="{{ $sectionContent->video_link }}" @endif class="btn btn-sm mt-1 btn-warning show-pdf-video-btn" title="View Pdf Or Video" >
                        <i class="fa-solid fa-eye"></i>
                    </a>
                @endif
                @can('add-question-to-batch-exam-section-content')
                    @if($sectionContent->content_type == 'exam' || $sectionContent->content_type == 'written_exam')
                        <a href="" data-section-content-id="{{ $sectionContent->id }}" data-xm-type="{{ $sectionContent->content_type }}" class="btn btn-sm btn-primary add-question-modal-btn" title="Add Questions">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    @endif
                @endcan
                @can('show-batch-exam-section-content')
                    <a href="" data-section-content-id="{{ $sectionContent->id }}" class="btn btn-sm btn-success show-btn" title="Show Batch Exam Content">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                @endcan
                @can('edit-batch-exam-section-content')
                    <a href="" data-section-content-id="{{ $sectionContent->id }}" class="btn btn-sm btn-warning section-content-edit-btn" title="Edit Batch Exam Content">
                        <i class="fa-solid fa-edit"></i>
                    </a>
                @endcan
                @can('delete-batch-exam-section-content')
                    <form class="d-inline" action="{{ route('batch-exam-section-contents.destroy', $sectionContent->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Batch Exam">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
    @if(isset($sectionContent->batchExamSectionContents))
        <div class="ps-5">
            @include('backend.batch-exam-management.batch-exam-sections.show-nested-cats', ['sectionContents' => $sectionContent->batchExamSectionContents, 'child' => $child + $child])
        </div>
    @endif
@endforeach
