@extends('frontend.master')
@section('body')
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
@endsection
