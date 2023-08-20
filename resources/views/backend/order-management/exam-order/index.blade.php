@extends('backend.master')

@section('title', 'Manage Batch Exam')

@section('body')
{{--    <div class="row mt-5">--}}
{{--        <div class="col-sm-6 mx-auto">--}}
{{--            <div class="card card-body">--}}
{{--                <form action="" method="get">--}}
{{--                    @csrf--}}
{{--                    <div class="row" >--}}
{{--                        <div class="col select2-div">--}}
{{--                            <label for="">Exam Category </label>--}}
{{--                            <select name="category_id" class="form-control select2" id="categoryId" data-placeholder="Select Exam Category">--}}
{{--                                <option value=""></option>--}}
{{--                                @foreach($examCategories as $examCategory)--}}
{{--                                    <option value="{{ $examCategory->id }}">{{ $examCategory->name }}</option>--}}
{{--                                    @if(isset($examCategory->examCategories))--}}
{{--                                        @include('backend.order-management.exam-order.include-cat-option', ['child' => 1, 'examCategory' => $examCategory])--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col select2-div show-hide-exam-div d-none">--}}
{{--                            <label for="">Exam Name</label>--}}
{{--                            <select name="exam_id" class="form-control select2" id="examId" data-placeholder="Select a Exam">--}}
{{--                                <option value=""></option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <input type="submit" class="btn btn-success ms-4 " style="margin-top: 18px" value="Search" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    @if(isset($examOrders) && !empty($examOrders))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Manage Batch Exam Orders</h2>
                    </div>
                    <div class="card-body">
                        <table class="table" id="file-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order No.</th>
                                    <th>Exam Title</th>
{{--                                    <th>C.Image</th>--}}
{{--                                    <th>Price</th>--}}
{{--                                    <th>Discount</th>--}}
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Vendor</th>
                                    <th>Paid Form</th>
                                    <th>Paid to</th>
                                    <th>Txt Id</th>
                                    <th>Enroll Date</th>
{{--                                    <th>Payment Status</th>--}}
                                    <th>Contact Status</th>
                                    <th>Order Status</th>
                                    <th>Contacted By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($examOrders))
                                @foreach($examOrders as $examOrder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $examOrder->order_invoice_number }}</td>
                                        <td>{{ $examOrder->batchExam->title }}</td>
{{--                                        <td>--}}
{{--                                            <img src="{{ asset($examOrder->course->banner) }}" alt="" style="height: 70px" />--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $examOrder->course->price }}</td>--}}
{{--                                        <td>{{ $totalDiscount = $examOrder->course->discount_type == 1 ? $examOrder->course->discount_amount : ($examOrder->course->discount_amount * $examOrder->course->price)/100 }}</td>--}}
                                        <td>{{ $examOrder->total_amount }}</td>
                                        <td>{{ $examOrder->paid_amount ?? 0 }}</td>
                                        <td>{{ $examOrder->total_amount - $examOrder->paid_amount  }}</td>
                                        <td>{{ $examOrder->vendor ?? '' }}</td>
                                        <td>{{ $examOrder->paid_from }}</td>
                                        <td>{{ $examOrder->paid_to }}</td>
                                        <td>{{ $examOrder->txt_id }}</td>
                                        <td>{{ $examOrder->created_at->format('d M, Y') }}</td>
{{--                                        <td>{{ $examOrder->payment_status }}</td>--}}
                                        <td>
                                            <a href="javascript:void(0)" class="badge bg-primary m-1"> {{ $examOrder->contact_status }}</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $examOrder->status }}</a>
                                        </td>
                                        <td>{{ $examOrder->chckedBy->name ?? '' }}</td>
                                        <td>
                                            <a href="" data-blog-category-id="{{ $examOrder->id }}" class="btn btn-sm btn-warning blog-category-edit-btn" title="Change Order Status">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <a href="" data-blog-category-id="{{ $examOrder->id }}" class="btn btn-sm btn-primary blog-category-edit-btnx" title="Change Order Status">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('exam-orders.destroy', $examOrder->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Blog Category">
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
                                    <input type="text" class="form-control" name="paid_amount" placeholder="Paid Amount" />
                                    <span class="text-danger" id="paid_amount"></span>
                                </div>
{{--                                <div class="col-sm-6 select2-div">--}}
{{--                                    <label for="paymentStatus">Payment Status</label>--}}
{{--                                    <select name="payment_status" class="form-control select2" id="paymentStatus" data-placeholder="Set Payment Status">--}}
{{--                                        <option value=""></option>--}}
{{--                                        <option value="pending">Pending</option>--}}
{{--                                        <option value="partial">Partial</option>--}}
{{--                                        <option value="complete">Complete</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
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
                url: base_url+"exam-orders/"+courseId+"/edit",
                method: "GET",
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
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
                    $('#courseSectionForm').attr('action', base_url+"exam-orders/"+courseId);
                    $('#blogCategoryModal').modal('show');
                }
            })
        })
    </script>
    <script>
        $(document).on('click', '.blog-category-edit-btnx', function () {
            event.preventDefault();
            var courseId = $(this).attr('data-blog-category-id'); //change value
            $.ajax({
                url: base_url+"exam-orders/"+courseId+"/edit",
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
                    $('#contactStatusForm').attr('action', base_url+"exam-orders/status/"+courseId);
                    $('#contactStatusModal').modal('show');
                }
            })
        })
        $(document).on('submit', $('#courseSectionForm'), function () {
            var totalAmount = Number($('input[name="paid_amount"]').attr('data-total-amount'));
            var paidAmount = Number($('input[name="paid_amount"]').val());
            if (paidAmount > totalAmount)
            {
                $('#paid_amount').text('Paid Amount can\'t be bigger then Batch Exam Total amount.')
                return false;
            }
        })
    </script>
    <script>
        // $(document).on('change', '#categoryId', function () {
        //     event.preventDefault();
        //     var categoryId = $(this).val(); //change value
        //     $.ajax({
        //         url: base_url+"get-exams-by-category/"+categoryId,
        //         method: "GET",
        //         dataType: "JSON",
        //         success: function (data) {
        //             console.log(data);
        //             var option = '';
        //             option += '<option value=""></option>';
        //             $.each(data, function (key, value) {
        //                 option += '<option value="'+value.id+'">'+value.title+'</option>';
        //             })
        //             $(".select2").select2({
        //                 minimumResultsForSearch: "",
        //                 width: "100%",
        //
        //             })
        //             $('.show-hide-exam-div').removeClass('d-none').css('transition', '1s');
        //             $('#examId').empty().append(option);
        //         }
        //     })
        // })
    </script>
@endpush
