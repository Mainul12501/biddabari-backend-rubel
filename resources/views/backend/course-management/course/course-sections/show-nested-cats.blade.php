
@foreach($sectionContents as $index => $sectionContent)
    <div class="row card-body border-0 py-1" >
        <h3 class="col-sm-9">
            @if(count($sectionContent->courseSectionContents) > 0)
                <i class="fa-solid fa-arrow-circle-down f-s-16"></i>
            @endif
            <span class="f-s-18">{{ $sectionContent->title }}</span>
        </h3>
        <div class="col-sm-3">
            <div class="float-end">
{{--                @can('create-course-section-content')--}}
{{--                    <button type="button"  data-section-id="{{ $sectionContent->courseSection->id }}" class="btn btn-sm btn-info --}}{{--add-sub-category-btn--}}{{-- open-section-content-form-modal" title="Add Section Content">--}}
{{--                        <i class="fa-solid fa-plus-square"></i>--}}
{{--                    </button>--}}
{{--                @endcan--}}
                    @can('add-question-to-course-section-content')
                        @if($sectionContent->content_type == 'exam' || $sectionContent->content_type == 'written_exam')
                            <a href="" data-section-content-id="{{ $sectionContent->id }}" data-xm-type="{{ $sectionContent->content_type }}" class="btn btn-sm btn-primary add-question-modal-btn" title="Add Exam Questions">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        @endif
                    @endcan
                    @can('add-question-to-course-section-content-class')
                        @if($sectionContent->has_class_xm == 1)
                            <a href="" data-section-content-id="{{ $sectionContent->id }}" data-xm-of="{{ $sectionContent->course_section_content_id }}" class="btn btn-sm btn-secondary add-class-question-modal-btn" title="Add Class Exam Questions">
                                <i class="fa-solid fa-plus-circle"></i>
                            </a>
                        @endif
                    @endcan
                    @can('show-course-section-content')
                        <a href="" data-section-content-id="{{ $sectionContent->id }}" class="btn btn-sm btn-success show-btn" title="Show Course">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    @endcan
                @can('edit-course-section-content')
                    <button type="button" data-section-content-id="{{ $sectionContent->id }}" class="btn btn-sm btn-warning section-content-edit-btn" title="Edit Section Content">
                        <i class="fa-solid fa-edit"></i>
                    </button>
                    @endcan
                @can('delete-course-section-content')
                    <form class="d-inline" action="{{ route('course-section-contents.destroy', $sectionContent->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Course Section Content">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    @endcan
            </div>
        </div>
    </div>
    @if(isset($sectionContent->noticeCategories))
        <div class="ps-5">
            @include('backend.course-management.course.course-sections.show-nested-cats', ['sectionContents' => $sectionContent->courseSectionContents, 'child' => $child + $child])
        </div>
    @endif
@endforeach
