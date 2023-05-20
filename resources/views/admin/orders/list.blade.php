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
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <h6 class="mb-0 text-uppercase">{{ $title }}</h6>
            <hr />
            <div class="table-responsive">
                @if(count($orders))
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Retailer Name</th>
                            <th>Retailer Phone</th>
                            <th>Order Number</th>
                            <th>Order Title</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $index=>$order )
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $order->retailer->fullname }}</td>
                                <td>{{ $order->retailer->phone }}</td>
                                <td>{{ $order->uniqueid }}</td>
                                <td>{{ $order->order_title }}</td>
                                <td>
                                    @switch($order->status)
                                        @case("pending")
                                            <span class="badge bg-danger">Pending</span>
                                            @break
                                        @case("approved")
                                            <span class="badge bg-danger">Approved</span>
                                            @break                                    
                                        @case("declined")
                                            <span class="badge bg-danger">Declined</span>
                                            @break                                                                                
                                        @default                                            
                                    @endswitch                        
                                </td>
                                <td>{{ $order->order_date }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('admin.orders.details',$order->uniqueid) }}">Process</a></li>
                                            <li><a class="dropdown-item" href="{{ route('admin.orders.details',$order->uniqueid) }}">View Details</a></li>
                                            <li><a id="delete" class="dropdown-item" id="delete" href="{{ route('products.delete',$order->id) }}">Delete</a></li>
                                        </ul>
                                    </div>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Order Number</th>
                            <th>Order Title</th>
                            <th>Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                @else
                <div class="alert alert-info"> You do not have any Order yet</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
