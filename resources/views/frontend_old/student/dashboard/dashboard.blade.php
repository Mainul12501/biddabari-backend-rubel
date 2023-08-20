@extends('frontend.student-master')

@section('student-body')
    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2> ড্যাশবোর্ড </h2>
                        <hr class="w-25 mx-auto bg-danger"/>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-4">
                            <div class="card card-body text-center">
                                <h3 class="f-s-30">Total Enrolled Courses</h3>
                                <span class="f-s-50">4</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-body text-center">
                                <h3 class="f-s-30">Total Enrolled Exams</h3>
                                <span class="f-s-50">5</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-6 mt-2">
                            <div class="card card-body">
                                <h2 class="mb-0 f-s-23">Today's Live Sessions</h2>
                                <p class="mb-0 f-s-20">Vendor: Zoom</p>
                                <p class="mb-0 f-s-20">ID: 235645</p>
                                <p class="mb-0 f-s-20">PAssword: 235645</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="card card-body">
                                <h2 class="mb-0 f-s-23">Today's Exams</h2>
                                <ul class="nav flex-column">
                                    <li><a href="" class="text-dark f-s-20 mb-0">* MCQ Exam for Slot One</a></li>
                                    <li><a href="" class="text-dark f-s-20 mb-0">* Written exam for bsc </a></li>
                                    <li><a href="" class="text-dark f-s-20 mb-0">* Written exam for bsc New </a></li>
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* Mcq exam for bsc NEW </a></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="card card-body">
                                <h2 class="mb-0 f-s-23">Notifications</h2>
                                <ul class="nav flex-column">
                                    <li><a href="" class="text-dark f-s-20 mb-0">* This is simple Notification</a></li>
                                    <li><a href="" class="text-dark f-s-20 mb-0">* This is simple Notification</a></li>
                                    <li><a href="" class="text-dark f-s-20 mb-0">* This is simple Notification</a></li>
                                    <li><a href="" class="text-dark f-s-20 mb-0">* This is simple Notification</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
