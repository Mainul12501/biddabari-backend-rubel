@extends('backend.master')

@section('title', 'Manage Order')

@section('body')
    <div class="row mt-5">
        <div class="col-sm-8 mx-auto">
            <div class="card card-body">
                <form action="" method="get">
{{--                    @csrf--}}
                    <div class="row" >
                        <div class="col select2-div">
                            <label for="">Course Category </label>
                            <select name="category_id" class="form-control select2" id="categoryId" data-placeholder="Select Course Category">
                                <option value=""></option>
                                @foreach($courseCategories as $courseCategory)
                                    <option value="{{ $courseCategory->id }}">{{ $courseCategory->name }}</option>
                                    @if(!empty($courseCategory))
                                        @if(count($courseCategory->courseCategories) > 0)
                                            @include('backend.course-management.course.courses.course-category-loop', ['courseCategory' => $courseCategory, 'child' => 1])
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col select2-div show-hide-exam-div d-none">
                            <label for="">Course Name</label>
                            <select name="course_id" class="form-control select2" id="courseId" data-placeholder="Select a Course">
                                <option value=""></option>
{{--                                @foreach($courses as $course)--}}
{{--                                    <option value="{{ $course->id }}">{{ $course->title }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="col-auto">
                            <input type="submit" class="btn btn-success ms-4 " style="margin-top: 18px" value="Search" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(isset($courseOrders) && !empty($courseOrders))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Manage Course Orders</h2>
                    </div>
                    <div class="card-body">
                        <table class="table" id="file-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order No.</th>
                                    <th>Course Title</th>
{{--                                    <th>C.Image</th>--}}
{{--                                    <th>Price</th>--}}
{{--                                    <th>Discount</th>--}}
                                    <th>S. Name</th>
                                    <th>Payment</th>
{{--                                    <th>Paid</th>--}}
{{--                                    <th>Due</th>--}}
                                    <th>Payment Info</th>
{{--                                    <th>Vendor</th>--}}
{{--                                    <th>Paid Form</th>--}}
{{--                                    <th>Paid to</th>--}}
                                    <th>Txt Id</th>
                                    <th>Enroll Date</th>
{{--                                    <th>Payment Status</th>--}}
                                    <th>Payment & Contact Status</th>
{{--                                    <th>Order Status</th>--}}
{{--                                    <th>Contacted By</th>--}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($courseOrders))
                                @foreach($courseOrders as $courseOrder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="" data-order-id="{{ $courseOrder->id }}" class="show-order-details">#{{ $courseOrder->order_invoice_number }}</a></td>
                                        <td>{{ $courseOrder->course->title }}</td>
{{--                                        <td>--}}
{{--                                            <img src="{{ asset($courseOrder->course->banner) }}" alt="" style="height: 70px" />--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $courseOrder->course->price }}</td>--}}
{{--                                        <td>{{ $totalDiscount = $courseOrder->course->discount_type == 1 ? $courseOrder->course->discount_amount : ($courseOrder->course->discount_amount * $courseOrder->course->price)/100 }}</td>--}}
{{--                                        @php($totalDiscount = $courseOrder->course->discount_type == 1 ? $courseOrder->course->discount_amount : ($courseOrder->course->discount_amount * $courseOrder->course->price)/100)--}}
                                        <td>{{ $courseOrder->user->name }}</td>
                                        <td>
                                            Total: {{ $courseOrder->total_amount }} <br>
                                            Paid: {{ $courseOrder->paid_amount ?? 0 }} <br>
                                            Due: {{ $courseOrder->total_amount - $courseOrder->paid_amount }}
                                        </td>
{{--                                        <td>{{ $courseOrder->paid_amount ?? 0 }}</td>--}}
{{--                                        <td>{{ $courseOrder->total_amount - $courseOrder->paid_amount }}</td>--}}
                                        <td>F- {{ $courseOrder->paid_from }} <br> T- {{ $courseOrder->paid_to }} <br> V- {{ $courseOrder->vendor }}  </td>
{{--                                        <td>{{ $courseOrder->vendor ?? '' }}</td>--}}
{{--                                        <td>{{ $courseOrder->paid_from }}</td>--}}
{{--                                        <td>{{ $courseOrder->paid_to }}</td>--}}
                                        <td>{{ $courseOrder->txt_id }}</td>
                                        <td>{{ $courseOrder->created_at->format('d M, Y') }}</td>
{{--                                        <td>{{ $courseOrder->payment_status }}</td>--}}
                                        <td>
                                            <a href="javascript:void(0)" class="badge bg-primary m-1">Payment {{ $courseOrder->payment_status }}</a><br>
                                            <a href="javascript:void(0)" class="badge bg-primary m-1">Contact {{ $courseOrder->contact_status }}</a><br>
                                            <a href="javascript:void(0)" class="badge bg-primary m-1">Order {{ $courseOrder->status }}</a>
                                        </td>
{{--                                        <td>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $courseOrder->status == 0 ? 'Pending' : '' }}</a>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $courseOrder->status == 1 ? 'Approved' : '' }}</a>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $courseOrder->status == 2 ? 'Canceled' : '' }}</a>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $courseOrder->chckedBy->name ?? '' }}</td>--}}
                                        <td>
                                            <a href="" data-blog-category-id="{{ $courseOrder->id }}" class="btn btn-sm btn-warning blog-category-edit-btn mt-1" title="Change Order Status">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <br>
                                            <a href="" data-blog-category-id="{{ $courseOrder->id }}" class="btn btn-sm btn-primary blog-category-edit-btnx mt-1" title="Change Order Status">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <br>
                                            <form class="d-inline" action="{{ route('course-orders.destroy', $courseOrder->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger mt-1" title="Delete Blog Category">
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
    @endif
    <div class="modal fade modal-div" id="blogCategoryModal" data-modal-parent="blogCategoryModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="">
                <form id="courseSectionForm" action="" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update Course Order Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="card card-body">
                            @csrf
                            @method('put')
{{--                            <input type="hidden" id="courseIdEdit" name="edit_course_id" />--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="paidAmount">Paid Amount</label>
                                    <input type="text" class="form-control" required name="paid_amount" placeholder="Paid Amount" />
                                    <span class="text-danger" id="paid_amount"></span>
                                </div>
                                <div class="col-sm-6 select2-div">
                                    <label for="paymentStatus">Payment Status</label>
                                    <select name="payment_status" class="form-control select2" id="paymentStatus" data-placeholder="Set Payment Status">
                                        <option value=""></option>
                                        <option value="pending">Pending</option>
                                        <option value="partial">Partial</option>
                                        <option value="complete">Complete</option>
                                    </select>
                                </div>
{{--                                <div class="col-sm-6 select2-div">--}}
{{--                                    <label for="paymentStatus">Contact Status</label>--}}
{{--                                    <select name="contact_status" class="form-control select2" id="paymentStatus" data-placeholder="Set Contact Status">--}}
{{--                                        <option value=""></option>--}}
{{--                                        <option value="pending">Pending</option>--}}
{{--                                        <option value="not_answered">Not Answered</option>--}}
{{--                                        <option value="confirmed">Confirmed</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="col-sm-6 select2-div">
                                    <label for="paymentStatus">Order Status</label>
                                    <select name="status" class="form-control select2" id="paymentStatus" data-placeholder="Set Order Status">
                                        <option value=""></option>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
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

    <div class="modal fade modal-div" id="contactStatusModal" data-modal-parent="blogCategoryModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="">
                <form id="contactStatusForm" action="" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update Course Order Contact Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-body">
                            @csrf
{{--                            <input type="hidden" id="courseIdEdit" name="edit_course_id" />--}}
                            <div class="row">
                                <div class="col-sm-6 select2-div">
                                    <label for="paymentStatus">Contact Status</label>
                                    <select name="contact_status" class="form-control select2" id="paymentStatus" data-placeholder="Set Contact Status">
                                        <option value=""></option>
                                        <option value="pending">Pending</option>
                                        <option value="not_answered">Not Answered</option>
                                        <option value="confirmed">Confirmed</option>
                                    </select>
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

    <div class="modal fade modal-div" id="courseDetailsModal" data-modal-parent="blogCategoryModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Course Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card card-body" id="courseDetailsCard">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    @include('backend.includes.assets.plugin-files.datatable')
    {{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
    {{--    @include('backend.includes.assets.plugin-files.editor')--}}

    {{--    edit course category--}}
    <script>
        $(document).on('click', '.blog-category-edit-btn', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-blog-category-id'); //change value
            $.ajax({
                url: base_url+"course-orders/"+courseId+"/edit",
                method: "GET",
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    if (data.paid_amount > 0)
                    {
                        $('input[name="paid_amount"]').val(data.paid_amount);
                    } else {
                        $('input[name="paid_amount"]').val(data.total_amount);
                    }
                    $('input[name="paid_amount"]').attr('data-total-amount', data.total_amount);
                    $.each($('select[name="payment_status"] option'), function (paymentIndex, payment) {
                        if ($(this).val() == data.payment_status)
                        {
                            $(this).attr('selected', true);
                        }
                    })
                    $.each($('select[name="contact_status"] option'), function (contactIndex, contact) {
                        if ($(this).val() == data.contact_status)
                        {
                            $(this).attr('selected', true);
                        }
                    })
                    $.each($('select[name="status"] option'), function (statusIndex, status) {
                        if ($(this).val() == data.status)
                        {
                            $(this).attr('selected', true);
                        }
                    })
                    $(".select2").select2({
                        minimumResultsForSearch: "",
                        width: "100%",

                    })
                    $('#courseSectionForm').attr('action', base_url+"course-orders/"+courseId);
                    $('#blogCategoryModal').modal('show');
                }
            })
        })
        $(document).on('submit', $('#courseSectionForm'), function () {

            var totalAmount = Number($('input[name="paid_amount"]').attr('data-total-amount'));
            var paidAmount = Number($('input[name="paid_amount"]').val());
            if (paidAmount > totalAmount)
            {
                $('#paid_amount').text('Paid Amount can\'t be bigger then course Total amount.')
                return false;
            }
        })
    </script>
    <script>
        $(document).on('click', '.blog-category-edit-btnx', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-blog-category-id'); //change value
            $.ajax({
                url: base_url+"course-orders/"+courseId+"/edit",
                method: "GET",
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    $.each($('select[name="contact_status"] option'), function (contactIndex, contact) {
                        if ($(this).val() == data.contact_status)
                        {
                            $(this).attr('selected', true);
                        }
                    })
                    $(".select2").select2({
                        minimumResultsForSearch: "",
                        width: "100%",

                    })
                    $('#contactStatusForm').attr('action', base_url+"course-orders/status/"+courseId);
                    $('#contactStatusModal').modal('show');
                }
            })
        })
    </script>
    <script>
        $(document).on('change', '#categoryId', function () {
            event.preventDefault();
            var categoryId = $(this).val(); //change value
            $.ajax({
                url: base_url+"get-courses-by-category/"+categoryId,
                method: "GET",
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    console.log('data');
                    var option = '';
                    option += '<option value=""></option>';
                    $.each(data, function (key, value) {
                        option += '<option value="'+value.id+'">'+value.title+'</option>';
                    })
                    $(".select2").select2({
                        minimumResultsForSearch: "",
                        width: "100%",

                    })
                    $('.show-hide-exam-div').removeClass('d-none').css('transition', '1s');
                    $('#courseId').empty().append(option);
                }
            })
        })
        $(document).on('click', '.show-order-details', function () {
            event.preventDefault();
            var orderId = $(this).attr('data-order-id'); //change value
            $.ajax({
                url: base_url+"get-course-order-details/"+orderId,
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    $('#courseDetailsCard').empty().append(data);
                    $('#courseDetailsModal').modal('show');
                }
            })
        })
    </script>
@endpush
