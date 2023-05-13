@extends('admin.templates.main')
@section('content')
    <div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
						<a href="{{ route('states.list') }}">
							<div class="card radius-10 bg-gradient-orange">
							 	<div class="card-body">								
									<div class="d-flex align-items-center">
										<h5 class="mb-0 text-white">{{ $stateCount}}</h5>
										<div class="ms-auto">
											<i class='bx bx-map fs-3 text-white'></i>
										</div>
									</div>								
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">States</p>
									<!-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
								</div>
								</div>
						  	</div>
						  </a>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-deepblue">
							 <div class="card-body">
								<a href="{{ route('distributor.list') }}">
									<div class="d-flex align-items-center">
										<h5 class="mb-0 text-white">{{ $distributorCount}}</h5>
										<div class="ms-auto">
											<i class='bx bx-user fs-3 text-white'></i>
										</div>
									</div>
								</a>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Distributors</p>
									<!-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-orange">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">{{ $retailerCount }}</h5>
									<div class="ms-auto">
                                        <i class='bx bx-group fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Retailers</p>
									<!-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> -->
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<a href="{{ route('products.list') }}" >
								<div class="card radius-10 bg-gradient-ohhappiness">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<h5 class="mb-0 text-white">{{ $productCount }}</h5>
										<div class="ms-auto">
											<i class='bx bx-group fs-3 text-white'></i>
										</div>
									</div>
									<div class="progress my-3 bg-light-transparent" style="height:3px;">
										<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex align-items-center text-white">
										<p class="mb-0">Products</p>
									</div>
								</div>
								</div>
							</a>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-ibiza">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">{{ $orderCount }}</h5>
									<div class="ms-auto">
                                        <i class='bx bx-cart fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Orders</p>
									<p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>
					</div><!--end row-->
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Orders Summary</h5>
                    </div>
                    <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                    </div>
                </div>
                <hr />
                <div class="table-responsive">
                    @if (count($orders))                        
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order id</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#447896</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src="assets/images/icons/tshirt.png" alt="">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">T-Shirt Blue</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>Emy Jackson</td>
                                <td>28 Jul 2020</td>
                                <td>$96.00</td>
                                <td>
                                    <div class="d-flex align-items-center text-danger"> <i
                                            class='bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1'></i>
                                        <span>Pending</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex order-actions"> <a href="javascript:;" class=""><i
                                                class="bx bx-cog"></i></a>
                                        <a href="javascript:;" class="ms-4"><i class='bx bx-down-arrow-alt'></i></a>
                                    </div>
                                </td>
                            </tr>
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