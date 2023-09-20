<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugins.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/iconplugins.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/responsive.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/theme-dark.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/custom.css">
    <title>BiddaBari - The First Job Study Online Platform in Bangladesh</title>

    <!-- HELPER CSS -->
    <link href="{{ asset('/') }}backend/assets/css/helper.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('/') }}frontend/assets/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/news-tinker/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/custom-my-mod.css">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mirazmac/bengali-webfont-cdn@master/solaimanlipi/style.css">--}}
{{--    <link href="https://fonts.cdnfonts.com/css/siyam-rupali" rel="stylesheet">--}}

    <style>
        /*body {*/
        /*    font-family: 'SolaimanLipi', serif;*/
        /*}*/
        /*body {*/
        /*    font-family: 'Siyam Rupali', sans-serif;*/
        /*}*/

        .box-shadow {
            box-shadow: 1px 1px 10px 0px rgba(0,0,0,0.75);
            -webkit-box-shadow: 1px 1px 10px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 1px 1px 10px 0px rgba(0,0,0,0.75);
        }
    </style>
    <style>
        .student-panel-menu li a { color: white; font-size: 20px;}
        .student-panel-menu li:hover a { color: #85AF54!important;}
        .st-menu-active { color: #85AF54!important; }
        .content-shadow{box-shadow: 0px 0px 25px #D6D6D6;}
    </style>
    <style>
        /* width */
        ::-webkit-scrollbar {
          width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
          background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
          background: #F18345;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
          background: black;
        }
    </style>
    @stack('style')
</head>
<body>

<!--<div id="preloader">-->
<!-- <div id="preloader-area">-->
<!--  <div class="spinner"></div>-->
<!--  <div class="spinner"></div>-->
<!--  <div class="spinner"></div>-->
<!--  <div class="spinner"></div>-->
<!--  <div class="spinner"></div>-->
<!--  <div class="spinner"></div>-->
<!--  <div class="spinner"></div>-->
<!--  <div class="spinner"></div>-->
<!-- </div>-->
<!-- <div class="preloader-section preloader-left"></div>-->
<!-- <div class="preloader-section preloader-right"></div>-->
<!--</div>-->


@include('frontend.includes.header')


@yield('body')

@include('frontend.includes.footer')


<script src="{{ asset('/') }}frontend/assets/js/jquery.min.js"></script>

<!--<script src="{{ asset('/') }}frontend/assets/js/plugins.js"></script>-->

<script src="{{ asset('/') }}frontend/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/meanmenu.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/ajaxchimp.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/form-validator.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/contact-form-script.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/magnific-popup.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/aos.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/odometer.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/appear.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/tweenMax.min.js" type="text/javascript"></script>



<script src="{{ asset('/') }}frontend/assets/js/custom.js"></script>


<script src="{{ asset('/') }}frontend/assets/news-tinker/acmeticker.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/multi-countdown.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


@yield('js')

{{--custom js--}}
<script src="{{ asset('/') }}frontend/assets/js/my-custom-mod.js"></script>


<!-- Toastr Css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Sweet Alert -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet" />
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Sweet Alert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
@if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif
@if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif
@if(Session::has('customError'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ Session::get('customError') }}",
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    </script>
@endif
<script>
    let base_url = {!! json_encode(url('/')) !!}+'/';
</script>
{{--<script>--}}
{{--    $(document).on('click', '.next', function () {--}}
{{--        event.preventDefault();--}}
{{--        var getClassDivOrder = $('.auth-div').find('[data-active="1"]').attr('data-order');--}}
{{--        var mobileNumber = $('.auth-div input[name="mobile"]').val();--}}
{{--        if (getClassDivOrder == 0)--}}
{{--        {--}}
{{--            $('.mobile-div').addClass('d-none').attr('data-active', '');--}}
{{--            $('.otp-div').removeClass('d-none').attr('data-active', 1);--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('front.send-otp') }}",--}}
{{--                method: "POST",--}}
{{--                dataType: "JSON",--}}
{{--                data: {mobile:mobileNumber},--}}
{{--                success: function (data) {--}}
{{--                    console.log(data);--}}
{{--                    if (data.status == 'success')--}}
{{--                    {--}}
{{--                        toastr.success('You will get otp shortly. Please input Otp correctly.');--}}
{{--                        // $('.mobile-div').addClass('d-none').attr('data-active', '');--}}
{{--                        // $('.otp-div').removeClass('d-none').attr('data-active', 1);--}}
{{--                    } else {--}}
{{--                        console.log('something went wrong. Please try again.');--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        } else if (getClassDivOrder == 1)--}}
{{--        {--}}
{{--            var otpNumber = $('#otpInput').val();--}}

{{--            $.ajax({--}}
{{--                url: "{{ route('front.verify-otp') }}",--}}
{{--                method: "POST",--}}
{{--                dataType: "JSON",--}}
{{--                data: {otp:otpNumber, mobile_number:mobileNumber},--}}
{{--                success: function (data) {--}}
{{--                    console.log(data);--}}
{{--                    if (data.status == 'success')--}}
{{--                    {--}}
{{--                        $('.otp-div').addClass('d-none').attr('data-active', '');--}}
{{--                        if (data.user_status == 'exist')--}}
{{--                        {--}}
{{--                            $('.password-div').removeClass('d-none').attr('data-active', 1);--}}
{{--                            $('.next').removeClass('next').addClass('submit').text('Login').attr('data-status', 'login');--}}
{{--                        } else if (data.user_status == 'not_exist')--}}
{{--                        {--}}
{{--                            $('.name-div').removeClass('d-none').attr('data-active', 1);--}}
{{--                            $('.password-div').removeClass('d-none').attr('data-active', 1);--}}
{{--                            $('.next').removeClass('next').addClass('submit').text('Register').attr('data-status', 'register');--}}
{{--                        }--}}
{{--                        // $('#registerForm').submit();--}}
{{--                    } else {--}}
{{--                        console.log('something went wrong. Please try again.');--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--    })--}}
{{--    $(document).on('click', '.submit', function () {--}}
{{--        event.preventDefault();--}}
{{--        var formData = $('#authModalForm').serialize();--}}
{{--        var authStatus = $(this).attr('data-status');--}}
{{--        var ajaxUrl = '';--}}
{{--        if (authStatus == 'login')--}}
{{--        {--}}
{{--            ajaxUrl = "{{ route('login') }}";--}}
{{--        } else if (authStatus == 'register')--}}
{{--        {--}}
{{--            ajaxUrl = "{{ route('register') }}"--}}
{{--        }--}}
{{--        $.ajax({--}}
{{--            url: ajaxUrl,--}}
{{--            method: "POST",--}}
{{--            dataType: "JSON",--}}
{{--            data: formData,--}}
{{--            success: function (data) {--}}
{{--                console.log(data);--}}
{{--                if (data.status == 'success')--}}
{{--                {--}}
{{--                    toastr.success('Your are successfully logged in.');--}}
{{--                    window.location.reload();--}}
{{--                } else if (data.status == 'error')--}}
{{--                {--}}
{{--                    toastr.error('Something went wrong. Please try again');--}}
{{--                }--}}
{{--            },--}}
{{--            error: function (errors) {--}}
{{--                if (errors.responseJSON)--}}
{{--                {--}}

{{--                    var allErrors = errors.responseJSON.errors;--}}
{{--                    for (key in allErrors)--}}
{{--                    {--}}
{{--                        $('#'+key).empty().append(allErrors[key]);--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}
@stack('script')
</body>
</html>
