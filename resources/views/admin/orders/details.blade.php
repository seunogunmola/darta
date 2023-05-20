@extends('admin.templates.main')
@section('pageTitle',$title)
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ $resource }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-box me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">{{ $title }}</h5>
                        </div>
                        <hr />
                        <button class="btn btn-primary" onclick="window.print()"> <i class="bx bx-print"></i> Print</button>
                        <div style="text-align:center;">
                            <img src="{{ asset('logo.png') }}" alt="">
                            <br>
                            <br>
                            <h4>Order Manifest</h4>
                        </div>
                        <br>
                        <br>
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Retailer Name</td>
                                    <td>{{ auth()->user()->fullname }}</td>
                                </tr>
                                <tr>
                                    <td>Retailer Phone Number</td>
                                    <td>{{ auth()->user()->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Order Title</td>
                                    <td>{{ $order->order_title }}</td>
                                </tr>
                                <tr>
                                    <td>Order Date</td>
                                    <td>{{ $order->order_date }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Products</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table mb-0">
                                            <tr>
                                                <td>#</td>
                                                <td>Product Name</td>
                                                <td>Product Price</td>
                                                <td>Product Quantity</td>
                                                <td>Sub Total</td>
                                            </tr>
                                </tr>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($order->orderDetails as $index=>$detail)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $detail->product->product_name }}</td>
                                    <td> @currency($detail->product->product_price)</td>
                                    <td>{{ $detail->product_quantity }}</td>
                                    <td> @currency($detail->product->product_price * $detail->product_quantity) </td>

                                </tr>
                                @php
                                $total += $detail->product->product_price * $detail->product_quantity
                                @endphp
                                @endforeach
                                <tr style="font-weight:bold;font-size:16px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>@currency($total)</td>
                                </tr>
                        </table>
                        </td>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
@endsection