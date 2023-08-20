@extends('frontend.student-master')

@section('student-body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h2>  আমার অর্ডার সমূহ</h2>
                    <hr class="w-25 mx-auto bg-danger"/>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="courses-item pt-5">
                        <div class="content">
                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <th>sl</th>
                                    <th>Order No</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                                @foreach($courseOrders as $courseOrder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>#{{ $courseOrder->order_invoice_number }}</td>
                                        <td>{{ $courseOrder->course->title }}</td>
                                        <td>{{ $courseOrder->course->price }}</td>
                                        <td>
                                            {{ $courseOrder->status == 0 ? 'Pending' : '' }}
                                            {{ $courseOrder->status == 1 ? 'Confirmed' : '' }}
                                            {{ $courseOrder->status == 0 ? 'Canceled' : '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
