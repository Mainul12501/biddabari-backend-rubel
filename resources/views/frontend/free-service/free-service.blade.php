@extends('frontend.master')

@section('body')
    <div class="courses-area-two section-bg py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mb-5">
                        <a href="" class="btn border-main-color"><span class="fw-bolder fs-2">ফ্রি কোর্সসমূহ</span></a>
                    </div>
                    <div class="row">
                        @forelse($courses as $course)
                            <div class="courses-item col-md-4 col-sm-6 px-0 mx-2">
                                <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">
                                    <img src="{{ isset($course->banner) ? asset($course->banner) : asset('frontend/logo/biddabari-card-logo.jpg') }}" alt="Courses" class="w-100" style="height: 230px"/>

                                    <div class="content">
                                        <h3>{{ $course->title }}</h3>
                                        <div class="bottom-content">
                                            <button type="button" class="btn btn-warning">বিস্তারিত দেখুন</button>
                                            <div class="rating ">
                                                <button type="button" class="btn btn-warning">Free</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <h2 class="text-center">No Courses Available yet.</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="text-center mb-5">
                        <a href="javascript:void(0)" class="btn border-main-color"><span class="fw-bolder fs-2">ফ্রি পরীক্ষা সমূহ</span></a>
                    </div>
                    <div class="row mt-3">
                        @forelse($batchExams as $batchExam)
                            <div class="courses-item col-md-4 col-sm-6 px-0 mx-2 open-modal" data-xm-id="{{ $batchExam->id }}" style="cursor: pointer;">
                                <a href="" class="w-100">
                                    <img src="{{ isset($batchExam->banner) ? asset($batchExam->banner) : asset('frontend/logo/biddabari-card-logo.jpg') }}" alt="Courses" class="w-100" style="height: 230px"/>
                                    <div class="content">
                                        <h3>{{ $batchExam->title }}</h3>
                                        <div class="bottom-content">
                                            <button type="button" class="btn btn-warning">বিস্তারিত দেখুন</button>
                                            <div class="rating ">
                                                <button type="button" class="btn btn-warning">Free</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="card card-body">
                                    <h2 class="text-center">No Exams Available yet.</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>
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
                                <div class="col-sm-7">
                                    <div class="card card-body">
                                        <div class="text-center">
                                            <img style="max-height: 250px" id="xmImage" src="{{ asset('frontend/logo/biddabari-card-logo.jpg') }}" alt="exam-image-text" class="img-fluid" />
                                        </div>
                                        <div class="mt-3">
                                            <h2 id="catName">Category Name</h2>
                                            <div class="row mt-2 xm-details-row">
                                                {{--                                                <div class="col-md-4">--}}
                                                {{--                                                    <p>Price: <span id="price">1000</span> BDT</p>--}}
                                                {{--                                                </div>--}}
                                                {{--                                                <div class="col-md-8">--}}
                                                {{--                                                    <p>Valid Schedule: <span id="validity"></span></p>--}}
                                                {{--                                                </div>--}}
                                                <div class="col-md-12">
                                                    <span id="description"></span>
                                                </div>
{{--                                                <div class="col-md-12 mt-3" id="xmPackages">--}}
{{--                                                    <table class="table table-borderless">--}}
{{--                                                        <thead>--}}
{{--                                                        <tr>--}}
{{--                                                            <th>Package Name</th>--}}
{{--                                                            <th>Price</th>--}}
{{--                                                            <th>Duration</th>--}}
{{--                                                            <th>Discount</th>--}}
{{--                                                            <th>Valid Till</th>--}}
{{--                                                        </tr>--}}
{{--                                                        </thead>--}}
{{--                                                        <tbody>--}}
{{--                                                        <tr>--}}
{{--                                                            <td>Package One</td>--}}
{{--                                                            <td>Price: 100Tk</td>--}}
{{--                                                            <td>Duration: 100Tk</td>--}}
{{--                                                            <td>Discount: 100Tk</td>--}}
{{--                                                            <td>Valid Till: 22-23-5</td>--}}
{{--                                                        </tr>--}}
{{--                                                        <tr>--}}
{{--                                                            <td>Package One</td>--}}
{{--                                                            <td>Price: 100Tk</td>--}}
{{--                                                            <td>Duration: 100Tk</td>--}}
{{--                                                            <td>Discount: 100Tk</td>--}}
{{--                                                            <td>Valid Till: 22-23-5</td>--}}
{{--                                                        </tr>--}}
{{--                                                        </tbody>--}}
{{--                                                    </table>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="" >
                                        <div id="checkEnroll">
                                            <form action="" id="xmCardForm" method="post" enctype="multipart/form-data">
                                                @csrf
{{--                                                <input type="hidden" name="total_amount" id="totalAmount" />--}}
                                                <input type="hidden" name="ordered_for" value="batch_exam" />
                                                <div class="payment-box">
{{--                                                    <div class="payment-method">--}}
{{--                                                        <h3>Payment Method</h3>--}}
{{--                                                        <p>--}}
{{--                                                            <input type="radio" id="paypal" name="payment_method" value="ssl">--}}
{{--                                                            <label for="paypal">SSLCommerz</label>--}}
{{--                                                        </p>--}}
{{--                                                        <p>--}}
{{--                                                            <input type="radio" id="direct-bank-transfer" value="cod" name="payment_method" checked>--}}
{{--                                                            <label for="direct-bank-transfer">Manual Payment</label>--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="mt-2">--}}
{{--                                                        <h3>Select a Package</h3>--}}
{{--                                                        <div class="" id="selectPackages">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="payment-des-parent-div">--}}
{{--                                                        <div class="payment-cod d-none xm-payment-div">--}}
{{--                                                            <p>ম্যানুয়াল পেমেন্ট করলে আমাদের <span>বিকাশ মার্চেন্ট</span> নাম্বারে টাকা পাঠাতে হবে। <br><span>01896 060828</span></p>--}}
{{--                                                            <p>রকেট এ পাঠাতে চাইলে <span>রকেট মার্চেন্ট</span> পাঠাতে হবে। <br><span>01963 929208</span></p>--}}
{{--                                                            <p>নগদ এ পাঠাতে চাইলে <span>নগদ মার্চেন্ট</span> নাম্বারে টাকা পাঠাতে হবে। <br><span>01896 060828</span></p>--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-md-6">--}}
{{--                                                                    <label for="paidTo">Paid To</label>--}}
{{--                                                                    <input type="number" id="paidTo" required name="paid_to" class="form-control" placeholder="Paid To" />--}}
{{--                                                                    <span class="text-danger">{{ $errors->has('paid_to') ? $errors->first('paid_to') : '' }}</span>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-6">--}}
{{--                                                                    <label for="paidForm">Paid Form</label>--}}
{{--                                                                    <input type="number" id="paidForm" required name="paid_from" class="form-control" placeholder="Paid Form" />--}}
{{--                                                                    <span class="text-danger">{{ $errors->has('paid_from') ? $errors->first('paid_from') : '' }}</span>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-6">--}}
{{--                                                                    <label for="transactionId">Transaction Id</label>--}}
{{--                                                                    <input type="text" id="transactionId" required name="txt_id" class="form-control" placeholder="Transaction Id" />--}}
{{--                                                                    <span class="text-danger">{{ $errors->has('txt_id') ? $errors->first('txt_id') : '' }}</span>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-6 select2-div">--}}
{{--                                                                    <label for="vendor">Vendor</label>--}}
{{--                                                                    <select name="vendor" required id="vendor" class="form-control">--}}
{{--                                                                        <option value="" selected disabled>Select a Vendor</option>--}}
{{--                                                                        <option value="bkash">Bkash</option>--}}
{{--                                                                        <option value="nagad">Nagad</option>--}}
{{--                                                                        <option value="rocket">Rocket</option>--}}
{{--                                                                    </select>--}}
{{--                                                                    <span class="text-danger">{{ $errors->has('vendor') ? $errors->first('vendor') : '' }}</span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    @if(auth()->check())
                                                        <button type="submit" class="default-btn">Enroll Now</button>
                                                    @else
                                                        <a href="javascript:void(0)" class="default-btn" data-bs-toggle="modal" data-bs-target="#authModal">Enroll Now</a>
                                                    @endif
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
    @if($errors->any())
        <script>
            $(function () {
                $('#staticBackdrop').modal('show');
            })
        </script>
    @endif
    <script>
        $(function () {
            $('.select2').select2();

        })
    </script>
    <script>
        $(document).on('click', '.open-modal', function (e) {
            e.preventDefault();
            var xmId = $(this).attr('data-xm-id');
            {{--            @if(auth()->check())--}}
            $.ajax({
                url: base_url+"category-exams/"+xmId,
                method: "GET",
                success: function (data) {
                    console.log(data);
                    if ( data.exam.banner != null)
                    {
                        $('#xmImage').attr('src', data.exam.banner);
                    } else {
                        alert('sdf');
                        $('#xmImage').attr('src', base_url+'frontend/logo/biddabari-card-logo.jpg');
                    }
                    $('#catName').text(data.exam.title);
                    $('#price').text(data.exam.price);
                    $('#description').html(data.exam.description);

                    $('#xmCardForm').attr('action', base_url+'place-free-course-order/'+xmId);

                    // var div = '';
                    // div += '<h3 class="text-center">Available Packages for this Exam</h3>\n' +
                    //     '                                                    <div class="row">\n';
                    // $.each(data.exam.batch_exam_subscriptions, function (key, val) {
                    //     div += '<div class="col-md-6 mt-3">\n' +
                    //         '<div class="card card-body">\n' +
                    //         '<img src="'+base_url+'frontend/logo/biddabari-card-logo.jpg" alt="" class="card-img-top" style="height: 150px">\n'+
                    //         '       <h3 class="f-s-30">'+val.package_title+'</h3>\n' +
                    //         '       <p class="f-s-20 p-0 m-0">RegularPrice: <span class="f-s-24">'+val.price+'</span> Tk</p>\n' +
                    //         '       <p class="f-s-20 p-0 m-0">Duration: <span class="f-s-24">'+val.package_duration_in_days+'</span> Days</p>\n';
                    //     if(val.discount_amount > 0 && val.discount_amount != null)
                    //     {
                    //         div += '       <p class="f-s-20 p-0 m-0">Discount: <span class="f-s-24">'+val.discount_amount+'</span> Tk</p>\n' +
                    //             '       <p class="f-s-20 p-0 m-0">Current Price: <span class="f-s-24">'+(val.price - val.discount_amount)+'</span> Tk</p>\n' +
                    //             '       <p class="f-s-20 p-0 m-0">Valid Till: '+val.discount_end_date.split(" ")[0]+'</p>\n' ;
                    //     }
                    //
                    //     div += '   </div>\n'+
                    //         '   </div>\n';
                    // })
                    // div += '                                                    </div>';
                    // $('#xmPackages').empty().append(div);
                    // var label = '';
                    // $.each(data.exam.batch_exam_subscriptions, function (index, value) {
                    //     if (index == 0)
                    //     {
                    //         label += '<label for="pak'+index+'" class=""><input type="radio" class="select-package" checked name="batch_exam_subscription_id" data-package-sell-price="'+(value.price - value.discount_amount)+'" value="'+value.id+'" id="pak'+index+'"> <span class="f-s-23"> &nbsp;'+value.package_title+' ('+(value.price - value.discount_amount)+'tk for '+value.package_duration_in_days+' days)</span></label><br/>';
                    //         $('#totalAmount').val(value.price - value.discount_amount);
                    //     } else {
                    //
                    //         label += '<label for="pak'+index+'" class=""><input type="radio" class="select-package" name="batch_exam_subscription_id" data-package-sell-price="'+(value.price - value.discount_amount)+'" value="'+value.id+'" id="pak'+index+'"> <span class="f-s-23"> &nbsp;'+value.package_title+' ('+(value.price - value.discount_amount)+'tk for '+value.package_duration_in_days+' days)</span></label><br/>';
                    //     }
                    // });
                    // $('#selectPackages').empty().append(label);

                    if (data.enrollStatus == 'true' || data.enrollStatus == 'pending')
                    {
                        if (!$('#checkEnroll').hasClass('d-none'))
                        {
                            $('#checkEnroll').addClass('d-none');
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
            {{--            @else--}}
            //                 toastr.error('Please login first');
            {{--            @endif--}}
        })
        $(document).on('click', '.select-package', function () {
            var sellPrice = $(this).attr('data-package-sell-price');
            $('#totalAmount').val(sellPrice);
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
    <script>
        $(document).on('click', '.next', function () {
            event.preventDefault();
            var getClassDivOrder = $('.auth-div').find('[data-active="1"]').attr('data-order');
            var mobileNumber = $('.auth-div input[name="mobile"]').val();
            if (getClassDivOrder == 0)
            {


                $.ajax({
                    url: "{{ route('front.send-otp') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {mobile:mobileNumber},
                    success: function (data) {
                        console.log(data);
                        // if (data.status == 'success')
                        if (data.status == 'success')
                        {
                            $('.mobile-div').addClass('d-none').attr('data-active', '');

                            if (data.user_status == 'exist')
                            {
                                $('.password-div').removeClass('d-none').attr('data-active', 1);
                                $('.next').removeClass('next').addClass('submit').text('Login').attr('data-status', 'login');
                            } else if (data.user_status == 'not_exist')
                            {
                                $('.otp-div').removeClass('d-none').attr('data-active', 1);
                                toastr.success('You will get otp shortly. Please input Otp correctly.');
                            }



                            // $('.otp-div').removeClass('d-none').attr('data-active', 1);
                            // toastr.success('You will get otp shortly. Please input Otp correctly.');
                            // $('.mobile-div').addClass('d-none').attr('data-active', '');
                            // $('.otp-div').removeClass('d-none').attr('data-active', 1);
                        } else {
                            toastr.error('something went wrong. Please check your mobile Number & try again.');
                        }
                    }
                })
            } else if (getClassDivOrder == 1)
            {
                var otpNumber = $('#otpInput').val();

                $.ajax({
                    url: "{{ route('front.verify-otp') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {otp:otpNumber, mobile_number:mobileNumber},
                    success: function (data) {
                        console.log(data);
                        if (data.status == 'success')
                        {
                            $('.otp-div').addClass('d-none').attr('data-active', '');
                            if (data.user_status == 'exist')
                            {
                                $('.password-div').removeClass('d-none').attr('data-active', 1);
                                $('.next').removeClass('next').addClass('submit').text('Login').attr('data-status', 'login');
                            } else if (data.user_status == 'not_exist')
                            {
                                $('.name-div').removeClass('d-none').attr('data-active', 1);
                                $('.password-div').removeClass('d-none').attr('data-active', 1);
                                $('.next').removeClass('next').addClass('submit').text('Register').attr('data-status', 'register');
                            }
                            // $('#registerForm').submit();
                        } else {
                            console.log('something went wrong. Please try again.');
                        }
                    }
                })
            }
        })
        $(document).on('click', '.submit', function () {
            event.preventDefault();
            var formData = $('#authModalForm').serialize();
            var authStatus = $(this).attr('data-status');
            var ajaxUrl = '';
            if (authStatus == 'login')
            {
                ajaxUrl = "{{ route('login') }}";
            } else if (authStatus == 'register')
            {
                ajaxUrl = "{{ route('register') }}"
            }
            $.ajax({
                url: ajaxUrl,
                method: "POST",
                dataType: "JSON",
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (data.status == 'success')
                    {
                        var courseId = $('.order-free-course').attr('data-course-id');
                        toastr.success('Your are successfully logged in.');
                        $('#xmCardForm').submit();
                        // window.location.href = base_url+'place-free-course-order/'+courseId;
                    } else if (data.status == 'error')
                    {
                        toastr.error('Something went wrong. Please try again');
                    }
                },
                error: function (errors) {
                    if (errors.responseJSON)
                    {

                        var allErrors = errors.responseJSON.errors;
                        for (key in allErrors)
                        {
                            $('#'+key).empty().append(allErrors[key]);
                        }
                    }
                }
            })
        })
    </script>
@endsection
