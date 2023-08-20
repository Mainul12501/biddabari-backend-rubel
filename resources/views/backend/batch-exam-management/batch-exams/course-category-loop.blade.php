@foreach($batchExamCategory->batchExamCategories as $index => $subCategory)

    <option value="{{ $subCategory->id }}" >
        @for($i = 0; $i <= $child; $i++)
            {{ '>' }}
        @endfor
        {{ $subCategory->name }}
    </option>
    @if(!empty($subCategory))
        @if(count($batchExamCategory->batchExamCategories) > 0)
{{--            <option value="xx">{{ $subCategory->batchExamCategories }}</option>--}}
{{--            @include('backend.batch-exam-management.batch-exams.course-category-loop', ['batchExamCategory' => $subCategory, 'child' => $child + $child, 'batchExamCategory' => $batchExamCategory ?? ''])--}}
        @endif
    @endif
@endforeach
