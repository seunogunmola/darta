@extends('retailer.templates.main')
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
                        <form action="{{ route('retailer.orders.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                </div>
                            @endif
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Order Title</label>
                                <div class="col-sm-9">
                                    <input name="order_title" required value="{{ old('order_title') }}"
                                        type="text" class="form-control" id="order_title"
                                        placeholder="Enter Order Title">
                                </div>
                            </div>
                            <div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col"></th>
											<th scope="col">Product</th>
											<th scope="col">Price</th>
											<th scope="col">Quanity</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($products as $index => $product )
                                        <tr>
											<th scope="row">{{ ++$index }}</th>
											<td><img src="{{ asset($product->product_image) }}" style="width:50px" /></td>
											<td>{{ $product->product_name }}</td>
											<td>{{ $product->product_price }}</td>
											<td>
                                                <input type="hidden" name="product_id[]" value="{{$product->id}}"/>
                                                <input type="hidden" name="product_price[]" value="{{$product->product_price}}"/>
                                                <input type="number" name="product_quantity[]" class="form-control" />
                                            </td>
										</tr>                                     
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>                            
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
@endsection
