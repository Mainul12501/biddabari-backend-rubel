@extends('backend.master')

@section('title', 'Exam Ranking')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">Exam Ranking</h4>
                </div>
                <div class="card-body">

                    <table class="table" id="file-datatable">
                        <thead>
                        <tr>
                            <th>RANK</th>
                            <th>NAME</th>
                            <th>MARK</th>
                            <th>Provided Ans</th>
                            <th>Right Ans</th>
                            <th>Wrong Ans</th>
                            <th>DURATION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($examResults as $key => $examResult)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $examResult->user->name }}</td>
                                <td>{{ $examResult->result_mark ?? 0 }}</td>
                                <td>{{ $examResult->total_provided_ans ?? 0 }}</td>
                                <td>{{ $examResult->total_right_ans ?? 0 }}</td>
                                <td>{{ $examResult->total_wrong_ans ?? 0 }}</td>
                                <td>{{ \Carbon\CarbonInterval::seconds($examResult->required_time)->cascade()->forHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <!-- DragNDrop Css -->
    <style>
        #imagePreview {
            display: none;
        }
    </style>
@endpush

@push('script')
    @include('backend.includes.assets.plugin-files.datatable')
@endpush
