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
                        <div class="col-md-3">
                            <div class="card card-body text-center">
                                <h3 class="f-s-30">Enrolled Courses</h3>
                                <span class="f-s-50">{{ $totalEnrolledCourse }}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-body text-center">
                                <h3 class="f-s-30">Enrolled Exams</h3>
                                <span class="f-s-50">{{ $totalEnrolledExams }}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-body text-center">
                                <h3 class="f-s-30">Purchased Products</h3>
                                <span class="f-s-50">{{ $totalPurchasedProducts }}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-body text-center">
                                <h3 class="f-s-30">Pending Orders</h3>
                                <span class="f-s-50">{{ $totalPendingOrders }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center f-s-32">Enrolled Courses & Exams</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped f-s-22">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Price</th>
                                                <th>Paid Amount</th>
                                                <th>Due</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                @if($order->ordered_for != 'product')
                                                    <tr>
                                                        <td>
                                                            {{ $order->ordered_for == 'course' ? $order->course->title : '' }}
                                                            {{ $order->ordered_for == 'batch_exam' ? $order->batchExam->title : '' }}
                                                        </td>
                                                        <td>
                                                            {{ $order->ordered_for == 'course' ? 'Course' : '' }}
                                                            {{ $order->ordered_for == 'batch_exam' ? "Exam" : '' }}
                                                        </td>
                                                        <td>{{ $order->total_amount }}</td>
                                                        <td>{{ $order->paid_amount }}</td>
                                                        <td>{{ $order->total_amount - $order->paid_amount }}</td>
                                                        <td>{{ $order->status }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
{{--                        <div class="col-md-6 mt-2">--}}
{{--                            <div class="card card-body">--}}
{{--                                <h2 class="mb-0 f-s-23">Today's Live Sessions</h2>--}}
{{--                                <p class="mb-0 f-s-20">Vendor: Zoom</p>--}}
{{--                                <p class="mb-0 f-s-20">ID: 235645</p>--}}
{{--                                <p class="mb-0 f-s-20">Password: 235645</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 mt-2">--}}
{{--                            <div class="card card-body">--}}
{{--                                <h2 class="mb-0 f-s-23">Today's Exams</h2>--}}
{{--                                <ul class="nav flex-column">--}}
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* MCQ Exam for Slot One</a></li>--}}
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* Written exam for bsc </a></li>--}}
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* Written exam for bsc New </a></li>--}}
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* Mcq exam for bsc NEW </a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 mt-2">--}}
{{--                            <div class="card card-body">--}}
{{--                                <h2 class="mb-0 f-s-23">Notifications</h2>--}}
{{--                                <ul class="nav flex-column">--}}
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* This is simple Notification</a></li>--}}
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* This is simple Notification</a></li>--}}
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* This is simple Notification</a></li>--}}
{{--                                    <li><a href="" class="text-dark f-s-20 mb-0">* This is simple Notification</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
