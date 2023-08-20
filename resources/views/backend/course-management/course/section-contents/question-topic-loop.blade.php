@foreach($questionTopic->questionTopics as $index => $subCategory)

    <option value="{{ $subCategory->id }}" >
        @for($i = 0; $i <= $child; $i++)
            {{ '>' }}
        @endfor
        {{ $subCategory->name }}
    </option>
    @if(!empty($subCategory))
        @if(count($subCategory->questionTopics) > 0)
            @include('backend.course-management.course.section-contents.question-topic-loop', ['questionTopic' => $subCategory, 'child' => $child + $child ?? ''])
        @endif
    @endif
@endforeach
