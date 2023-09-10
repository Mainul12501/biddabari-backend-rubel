@extends('backend.master')

@section('title', 'Manage Order')

@section('body')
    <div class="row mt-5">
        <div class="col-sm-6 mx-auto">
            <div class="card card-body">
                <form action="" method="get">
{{--                    @csrf--}}
                    <div class="row" >
                        <div class="col select2-div">
                            <label for="">Order Types </label>
                            <select name="order_type" class="form-control select2" id="categoryId" data-placeholder="Select Course Category">
                                <option value="all">All Orders</option>
                                <option value="course">Course Orders</option>
                                <option value="batch_exam">Batch Exam Orders</option>
                                <option value="product">Product Orders</option>
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
    @if(isset($allOrders) && !empty($allOrders))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Manage All Orders</h2>
                    </div>
                    <div class="card-body">
                        <table class="table" id="file-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order No.</th>
                                    <th>Title</th>
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
                            @if(isset($allOrders))
                                @foreach($allOrders as $allOrder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="javascript:void(0)" data-order-id="{{ $allOrder->id }}" class="">#{{ $allOrder->order_invoice_number }}</a></td>
                                        <td>
                                            {{ $allOrder->ordered_for == 'course' ? $allOrder->course->title : '' }}
                                            {{ $allOrder->ordered_for == 'batch_exam' ? $allOrder->batchExam->title : '' }}
                                            {{ $allOrder->ordered_for == 'product' ? $allOrder->product->title : '' }}
                                        </td>
{{--                                        <td>--}}
{{--                                            <img src="{{ asset($allOrder->course->banner) }}" alt="" style="height: 70px" />--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $allOrder->course->price }}</td>--}}
{{--                                        <td>{{ $totalDiscount = $allOrder->course->discount_type == 1 ? $allOrder->course->discount_amount : ($allOrder->course->discount_amount * $allOrder->course->price)/100 }}</td>--}}
{{--                                        @php($totalDiscount = $allOrder->course->discount_type == 1 ? $allOrder->course->discount_amount : ($allOrder->course->discount_amount * $allOrder->course->price)/100)--}}
                                        <td>{{ $allOrder->user->name }}</td>
                                        <td>
                                            Total: {{ $allOrder->total_amount }} <br>
                                            Paid: {{ $allOrder->paid_amount ?? 0 }} <br>
                                            Due: {{ $allOrder->total_amount - $allOrder->paid_amount }}
                                        </td>
{{--                                        <td>{{ $allOrder->paid_amount ?? 0 }}</td>--}}
{{--                                        <td>{{ $allOrder->total_amount - $allOrder->paid_amount }}</td>--}}
                                        <td>F- {{ $allOrder->paid_from }} <br> T- {{ $allOrder->paid_to }} <br> V- {{ $allOrder->vendor }}  </td>
{{--                                        <td>{{ $allOrder->vendor ?? '' }}</td>--}}
{{--                                        <td>{{ $allOrder->paid_from }}</td>--}}
{{--                                        <td>{{ $allOrder->paid_to }}</td>--}}
                                        <td>{{ $allOrder->txt_id }}</td>
                                        <td>{{ $allOrder->created_at->format('d M, Y') }}</td>
{{--                                        <td>{{ $allOrder->payment_status }}</td>--}}
                                        <td>
                                            <a href="javascript:void(0)" class="badge bg-primary m-1">Payment {{ $allOrder->payment_status }}</a><br>
                                            <a href="javascript:void(0)" class="badge bg-primary m-1">Contact {{ $allOrder->contact_status }}</a><br>
                                            <a href="javascript:void(0)" class="badge bg-primary m-1">Order {{ $allOrder->status }}</a>
                                        </td>
{{--                                        <td>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $allOrder->status == 0 ? 'Pending' : '' }}</a>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $allOrder->status == 1 ? 'Approved' : '' }}</a>--}}
{{--                                            <a href="javascript:void(0)" class="badge bg-primary">{{ $allOrder->status == 2 ? 'Canceled' : '' }}</a>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $allOrder->chckedBy->name ?? '' }}</td>--}}
                                        <td>
                                            @can('get-order-details')
                                            <a href="" data-order-id="{{ $allOrder->id }}" class="btn btn-sm show-order-details btn-warning mt-1" title="Change Order Status">
                                                <i class="fa-solid fa-print"></i>
                                            </a>
                                            @endcan
{{--                                            <a href="" data-blog-category-id="{{ $allOrder->id }}" class="btn btn-sm btn-warning blog-category-edit-btn mt-1" title="Change Order Status">--}}
{{--                                                <i class="fa-solid fa-edit"></i>--}}
{{--                                            </a>--}}
{{--                                            <br>--}}
{{--                                            <a href="" data-blog-category-id="{{ $allOrder->id }}" class="btn btn-sm btn-primary blog-category-edit-btnx mt-1" title="Change Order Status">--}}
{{--                                                <i class="fa-solid fa-edit"></i>--}}
{{--                                            </a>--}}
                                            <br>
                                                @can('delete-course-order')
                                                <form class="d-inline" action="{{ route('course-orders.destroy', $allOrder->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this? Once deleted, It can not be undone.')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger mt-1" title="Delete Blog Category">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                                @endcan
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
    <script src="{{ asset('/backend/assets/plugins/printThis/printThis.js') }}"></script>
    @include('backend.includes.assets.plugin-files.datatable')
    {{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
    {{--    @include('backend.includes.assets.plugin-files.editor')--}}

    <script>
        $(document).on('click', '.show-order-details', function () {
            event.preventDefault();
            var orderId = $(this).attr('data-order-id'); //change value
            $.ajax({
                url: base_url+"get-order-details/"+orderId,
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    $('#courseDetailsCard').empty().append(data);
                    $('#courseDetailsModal').modal('show');
                }
            })
        })
        $(document).on('click', '.print-btn', function () {
            event.preventDefault();
            $("#print-div").printThis({
                debug: false,               // show the iframe for debugging
                importCSS: true,            // import parent page css
                importStyle: false,         // import style tags
                printContainer: true,       // print outer container/$.selector
                loadCSS: "",                // path to additional css file - use an array [] for multiple
                pageTitle: "",              // add title to print page
                removeInline: false,        // remove inline styles from print elements
                removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
                printDelay: 333,            // variable print delay
                header: null,               // prefix to html
                footer: null,               // postfix to html
                base: false,                // preserve the BASE tag or accept a string for the URL
                formValues: true,           // preserve input/form values
                canvas: false,              // copy canvas content
                doctypeString: '',       // enter a different doctype for older markup
                removeScripts: false,       // remove script tags from print content
                copyTagClasses: false,      // copy classes from the html & body tag
                beforePrintEvent: null,     // function for printEvent in iframe
                beforePrint: null,          // function called before iframe is filled
                afterPrint: null            // function called before iframe is removed
            });
        })
    </script>
@endpush
