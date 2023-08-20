@extends('backend.master')

@section('title', 'Contacts')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">INBOX</h4>
                    <button type="button" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4 blog-category-modal-btn"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-borderless" id="file-datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Info</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($contacts))
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span>Name: {{ $contact->user->name }}</span> <br>
                                            <span>Mobile: {{ $contact->user->mobile }}</span> <br>
                                            @if($contact->type == 'course')
                                                <span>{{ $contact->course->title }}</span> <br>
                                            @elseif($contact->type == 'batch_exam')
                                                <span>{{ $contact->batchExam->title }}</span> <br>
                                            @endif
                                            <span>Date: {{ $contact->created_at->format('M d, Y g:i') }}</span>
                                        </td>
                                        <td>{!! str()->words(strip_tags($contact->message), 80) !!}</td>
                                        <td>
                                            <a href="" class="badge change-seen-status-{{ $contact->id }} badge-sm bg-primary">{{ $contact->is_seen == 1 ? 'Seen' : 'Unseen' }}</a>
                                        </td>
                                        <td>
                                            @if($contact->is_seen == 0)
                                                <a data-contact-id="{{ $contact->id }}" class="btn btn-sm btn-warning change-seen-btn change-seen-btn-{{ $contact->id }}" title="Edit Advertisement">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endif
                                            <form class="d-inline" action="{{ route('contacts.destroy', $contact->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Advertisement">
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
    {{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
{{--    @include('backend.includes.assets.plugin-files.editor')--}}
    {{--    store course--}}

        <script>
            $(document).on('click', '.change-seen-btn', function () {
                event.preventDefault();
                var contactId = $(this).attr('data-contact-id');
                $.ajax({
                    url: base_url+"contacts/"+contactId,
                    method: "GET",
                    success: function (data) {
                        if (data.is_seen == 1)
                        {
                            $('.change-seen-status-'+contactId).text('Seen');
                            $('.change-seen-btn-'+contactId).remove();
                        }
                    }
                })
            })
        </script>

@endpush
