@extends('frontend.master')

@section('body')
    <div class="courses-area-two section-bg ">
        <div class="container bg-white p-t-70 pb-70 ps-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <button class="btn text-center border-main-color"><span class="fw-bolder fs-2">আমাদের সাবস্ক্রিপশন সমূহ</span></button>
                    </div>
                    <p class="f-s-20 mt-4">Participate on all our EXAMS by purchasing our subscription pack.</p>
                    <div class="row mt-4">
                        @foreach($subscriptions as $subscription)
                            <div class="col-md-4 mt-2">
                                <a href="{{ route('front.subscription-details', ['id' => $subscription->id, 'slug' => $subscription->slug]) }}" class="w-100">
                                    <div class="card">
                                        <img src="{{ !empty($subscription->banner) ? asset($subscription->banner) : 'https://i.ibb.co/vjLMjf4/302781896-3331421830467947-4650783196296068552-n.jpg' }}" alt="" style="height: 250px;" />
                                        <div class="card-body">
                                            <h3>{{ $subscription->name }}</h3>
                                            <p class="f-s-20">Price: {{ $subscription->price }}</p>
                                            <p class="f-s-20">Valid Till: {{ \Illuminate\Support\Carbon::parse($subscription->valid_to)->format('d-M-Y') }}</p>
                                        </div>
                                        <div class="border-top py-2">
                                            @if($subscription->purchase_status == 'true')
                                                <p class="f-s-20 float-end text-success pe-3">Purchased</p>
                                            @else
                                                <button type="button" class="btn btn-outline-warning float-end me-3">Order Now</button>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="text-center mb-5">
                    <a href="javascript:void(0)" class="btn border-main-color"><span class="fw-bolder fs-2">আমাদের এক্সাম ক্যাটাগরি সমূহ</span></a>
                </div>
                <div class="row">
                    @forelse($examCategories as $examCategory)
                        <div class="col-md-4 col-sm-6 px-1">
                            <div class="courses-item pb-0">
{{--                                <a href="{{ route('front.category-exams', ['xm_cat_id' => $examCategory->id, 'name' => $examCategory->name]) }}">--}}

                                    <img src="{{ !empty($examCategory->image) ? asset($examCategory->image) : asset('/frontend/logo/biddabari-card-logo.jpg') }}" alt="Courses" class="w-100" style="height: 230px"/>

                                    <div class="px-3 pt-3">
                                        <h3>{{ $examCategory->name }}</h3>
                                    </div>

                                <div class="d-flex px-3 pb-3">
                                    <span class="me-auto">Price: {{ $examCategory->price }} BDT</span> <br>
                                    <span class="">Valid Till: {{ \Illuminate\Support\Carbon::parse($examCategory->valid_to)->format('d-M-Y') }}</span>
                                    @if($examCategory->purchase_status == 'true')
                                        <button type="button" class="btn text-success ms-auto">Purchased</button>
                                    @else
                                    <button type="button" class="btn btn-outline-success btn-sm ms-auto open-modal" data-xm-category-id="{{ $examCategory->id }}">Buy Now</button>
                                        @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="text-center">
                                <h2>কোনো এক্সাম চালু হয়নি।  খুব দ্রুত এক্সাম চালু হবে। </h2>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order Exams</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="printHere">
                    <div class="courses-details-area p-b-20">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card card-body">
                                        <div class="text-center">
                                            <img style="max-height: 250px" src="https://i.ibb.co/vjLMjf4/302781896-3331421830467947-4650783196296068552-n.jpg" alt="exam-image-text" class="img-fluid" />
                                        </div>
                                        <div class="mt-3">
                                            <h2 id="catName">catName</h2>
                                            <div class="row mt-2 xm-details-row">
                                                <div class="col-md-4">
                                                    <p>Price: <span id="price">1000</span> BDT</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>Valid Schedule: <span id="validity"></span></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <span id="description"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-body" >
                                        <div id="checkEnroll">
                                            <form action="" id="xmCardForm" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="total_amount" id="totalAmount" value="" />
                                                <div class="payment-box">
                                                    <div class="payment-method">
                                                        <h3>Payment Method</h3>
                                                        <p>
                                                            <input type="radio" id="paypal" name="payment_method" value="ssl">
                                                            <label for="paypal">SSLCommerz</label>
                                                        </p>
                                                        <p>
                                                            <input type="radio" id="direct-bank-transfer" value="cod" name="payment_method" checked>
                                                            <label for="direct-bank-transfer">Manual Payment</label>
                                                        </p>
                                                    </div>
                                                    <div class="payment-des-parent-div">
                                                        <div class="payment-cod d-none xm-payment-div">
                                                            <p>ম্যানুয়াল পেমেন্ট করলে আমাদের <span>বিকাশ মার্চেন্ট</span> নাম্বারে টাকা পাঠাতে হবে। <br><span>01896 060828</span></p>
                                                            <p>রকেট এ পাঠাতে চাইলে <span>রকেট মার্চেন্ট</span> পাঠাতে হবে। <br><span>01963 929208</span></p>
                                                            <p>নগদ এ পাঠাতে চাইলে <span>নগদ মার্চেন্ট</span> নাম্বারে টাকা পাঠাতে হবে। <br><span>01896 060828</span></p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="paidTo">Paid To</label>
                                                                    <input type="number" id="paidTo" required name="paid_to" class="form-control" placeholder="Paid To" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="paidForm">Paid Form</label>
                                                                    <input type="number" id="paidForm" required name="paid_form" class="form-control" placeholder="Paid Form" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="transactionId">Transaction Id</label>
                                                                    <input type="text" id="transactionId" required name="txt_id" class="form-control" placeholder="Transaction Id" />
                                                                </div>
                                                                <div class="col-md-6 select2-div">
                                                                    <label for="vendor">Vendor</label>
                                                                    <select name="vendor" required id="vendor" class="form-control">
                                                                        <option value="" selected disabled>Select a Vendor</option>
                                                                        <option value="bkash">Bkash</option>
                                                                        <option value="nagad">Nagad</option>
                                                                        <option value="rocket">Rocket</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="default-btn">Place Order</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="msgPrint">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .xm-details-row p{
            font-size: 25px!important;
        }
        .xm-payment-div p{
            font-size: 20px!important;
        }
    </style>
@endpush

@section('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function () {
            $('.select2').select2();
        })
    </script>
    <script>
        $(document).on('click', '.open-modal', function () {
            var categoryId = $(this).attr('data-xm-category-id');
            @if(auth()->check())
                $.ajax({
                    url: base_url+"category-exams/"+categoryId,
                    method: "GET",
                    success: function (data) {
                        console.log(data);
                        $('#price').text(data.examCategory.price);
                        $('#description').html(data.examCategory.description);
                        $('#totalAmount').html(data.examCategory.price);
                        $('#validity').text(data.examCategory.validity);
                        $('#xmCardForm').attr('action', base_url+'student/order-exam/'+categoryId);
                        if (data.enrollStatus == 'true' || data.enrollStatus == 'pending')
                        {
                            if (!$('#checkEnroll').hasClass('d-none'))
                            {
                                $('#checkEnroll').addClass('d-none');
                                // $('#msgPrint').empty().append('<p class="fw-bolder f-s-22">You already enrolled this Exam.</p>');
                                $('.msgPrint').html('<p class="fw-bolder f-s-22">You already enrolled this Exam.</p>');

                            }
                        } else {
                            if ($('#checkEnroll').hasClass('d-none'))
                            {
                                $('#checkEnroll').removeClass('d-none');
                                $('#msgPrint').empty();
                            }
                        }
                        $('#staticBackdrop').modal('show');
                    }
                })
            @else
                toastr.error('Please login first');
            @endif
        })
    </script>
    <script>
        $(function () {
            showHidePaymentMethod();
        })
        $(document).on('click', 'input[name="payment_method"]', function () {
            showHidePaymentMethod();
        });
        function showHidePaymentMethod() {
            var paymentMethod = $('input[name="payment_method"]:checked').val();
            if (paymentMethod == 'cod')
            {
                if ($('.payment-cod').hasClass('d-none'))
                {
                    $('.payment-cod').removeClass('d-none');
                }

            } else if (paymentMethod == 'ssl')
            {
                $('.payment-cod').addClass('d-none');
            }
        }
    </script>
@endsection
