<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>@yield('title') | BiddaBari</title>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta content="Learning management system" name="description" />
        <meta content="Biddabari" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

       @include('backend.includes.assets.css')
        <style>
            .vertical-menu a {
                color: #0b0b0b!important;
            }
            .select2 {
                width: 100%!important;
                /*margin-top: -25px;*/
            }
            thead tr th {
                text-transform:capitalize!important;
            }
             input[switch]+label {
                 margin-bottom: 0px;
             }
            .dtp_modal-content {
                z-index: 9999;
            }
        </style>
    </head>

    <body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


{{--        header start--}}
        @include('backend.includes.header')
{{--        header end--}}

        <!-- ========== Left Sidebar Start ========== -->
        @include('backend.includes.menu')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                   @yield('body')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Transaction Modal -->
            @include('backend.includes.transaction-modal')
            <!-- end modal -->

            @include('backend.includes.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
{{--    @include('backend.includes.right-sidebar')--}}
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('backend.includes.assets.js')
    </body>
</html>
