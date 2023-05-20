@extends('retailer.templates.main')
@section('pageTitle',$title)
@section('content')
    <div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
						<a href="{{ route('states.list') }}">
							<div class="card radius-10 bg-gradient-orange">
							 	<div class="card-body">								
									<div class="d-flex align-items-center">
										<h5 class="mb-0 text-white">{{ $ordersCount}}</h5>
										<div class="ms-auto">
											<i class='bx bx-map fs-3 text-white'></i>
										</div>
									</div>								
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Orders</p>
									<!-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
								</div>
								</div>
						  	</div>
						  </a>
						</div>
					</div><!--end row-->
                    <div class="card col-md-12 radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Available Products</h5>
                    </div>
                    <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                    </div>
                </div>
                <hr />
                <div class="table-responsive">
                    @if (count($products))                        
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Price</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index=>$product)
                            <tr>
                                <td>{{ ++$index}}</td>
                                <td> <img src="{{ asset($product->product_image) }}" style="width:50px"/>  </td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}</td>
                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">No Orders </div>
                    @endif
                </div>
            </div>
                    </div>
    </div>
@endsection