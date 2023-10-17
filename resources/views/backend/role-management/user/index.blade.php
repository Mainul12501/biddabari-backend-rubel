@extends('backend.master')

@section('title', 'Permission')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">Manage Users</h4>
                    @can('create-user')
                        <a href="{{ route('users.create') }}" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4">
                            <i class="fa-solid fa-circle-plus"></i>
                        </a>
                    @endcan
                </div>
                <div class="card-body">
{{--                    <div class="row py-5">--}}
{{--                        <form action="" method="get">--}}
{{--                            <div class="col-md-6 mx-auto">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-10 select2-div">--}}
{{--                                        <label for="">Select User Type</label>--}}
{{--                                        <select name="user_type" id="" class="select2 form-control" data-placeholder="Select a User Type">--}}
{{--                                            <option value=""></option>--}}
{{--                                            <option value="admin">Admin</option>--}}
{{--                                            <option value="stuff">Stuff</option>--}}
{{--                                            <option value="teacher">Teacher</option>--}}
{{--                                            <option value="student">Student</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 mt-5">--}}
{{--                                        <input type="submit" class="btn btn-success" value="Search" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                    <table class="table" id="file-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Roles</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->title }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $user->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="">
                                    @can('edit-user')
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('delete-user')
                                        <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="post" >
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger data-delete-form">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
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
    <!-- DataTables -->
{{--    <link href="{{ asset('/') }}backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ asset('/') }}backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />--}}
@endpush

@push('script')
    <!-- Required datatable js -->
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>--}}
    <!-- Buttons examples -->
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/jszip/jszip.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/pdfmake/build/pdfmake.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/pdfmake/build/vfs_fonts.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>--}}

    <!-- Responsive examples -->
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>--}}
{{--    <script src="{{ asset('/') }}backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>--}}

    <!-- Datatable init js -->
{{--    <script src="{{ asset('/') }}backend/assets/js/pages/datatables.init.js"></script>--}}
{{--    <script>--}}
{{--        // $('#datatable-buttons_wrapper').DataTable();--}}
{{--    </script>--}}
    @include('backend.includes.assets.plugin-files.datatable')
@endpush
