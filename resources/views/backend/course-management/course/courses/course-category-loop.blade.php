@foreach($courseCategory->courseCategories as $index => $subCategory)

    <option value="{{ $subCategory->id }}" >
        @for($i = 0; $i <= $child; $i++)
            {{ '>' }}
        @endfor
        {{ $subCategory->name }}
    </option>
    @if(!empty($courseCategory))
        @if(count($courseCategory->courseCategories) > 0)
            @include('backend.course-management.course.courses.course-category-loop', ['courseCategory' => $subCategory, 'child' => $child + $child, 'course' => $course ?? ''])
        @endif
    @endif
@endforeach
