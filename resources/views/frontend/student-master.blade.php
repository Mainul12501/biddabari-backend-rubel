
<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


<section class="">
    <div class=" ps-0">
        <div class="row">
            <div class="col-md-2 pe-0">
                <div class="bg-dark pt-5" style="min-height: 450px; height: 100%">
                    <ul class="nav flex-column student-panel-menu">
                        <li class="nav-item border-1">
                            <a class="nav-link {{ request()->is('student/dashboard') ? 'st-menu-active' : '' }}" href="{{ route('front.student.dashboard') }}">My Dashboard</a>
                        </li>
                        <li class="nav-item border-1">
                            <a class="nav-link {{ request()->is('student/my-courses') ? 'st-menu-active' : '' }}" href="{{ route('front.student.my-courses') }}">My Courses</a>
                        </li>
                        <li class="nav-item border-1">
                            <a class="nav-link {{ request()->is('student/my-exams') ? 'st-menu-active' : '' }}" href="{{ route('front.student.my-exams') }}">My Exams</a>
                        </li>
                        <li class="nav-item border-1">
                            <a class="nav-link {{ request()->is('student/my-orders') ? 'st-menu-active' : '' }}" href="{{ route('front.student.my-orders') }}">My Orders</a>
                        </li>
                        <li class="nav-item border-1">
                            <a class="nav-link {{ request()->is('student/view-profile') ? 'st-menu-active' : '' }}" href="{{ route('front.student.view-profile') }}">My Profile</a>
                        </li>
                        {{--                            <li class="nav-item border-1">--}}
                        {{--                                <a class="nav-link" href="#">My Affiliation</a>--}}
                        {{--                            </li>--}}
                        <li class="nav-item border-1">
                            <a class="nav-link" href="{{ route('front.student.change-password') }}">Change Password</a>
                        </li>
                        <li class="nav-item border-1">
                            <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout').submit()">Logout</a>
                            <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 pe-5 ps-0">
                @yield('student-body')
            </div>
        </div>
    </div>
</section>

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
@stack('script')
</body>
</html>

