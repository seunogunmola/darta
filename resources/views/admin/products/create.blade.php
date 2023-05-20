@extends('admin.templates.main')
@section('pageTitle',$action)
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ $resource }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $action }}</li>
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
                            <h5 class="mb-0 text-info">{{ $action }}</h5>
                        </div>
                        <hr />
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
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
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">SKU</label>
                                <div class="col-sm-9">
                                    <input name="sku" required value="{{ old('sku') }}"
                                        type="text" class="form-control" id="sku"
                                        placeholder="Enter SKU">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input name="product_name" required value="{{ old('product_name') }}" type="text"
                                        class="form-control" id="product_name" placeholder="Enter Product Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Product Description</label>
                                <div class="col-sm-9">
                                    <textarea name="product_description" class="form-control" id="" cols="30" rows="5" placeholder="Enter Product Description">{{ old('product_description') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Product Price</label>
                                <div class="col-sm-9">
                                    <input name="product_price" required value="{{ old('product_price') }}" type="number"
                                        class="form-control" id="product_price" placeholder="Enter Product Price">
                                </div>
                            </div>    
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Product Unit</label>
                                <div class="col-sm-9">
                                    <select name="unit_id" id="unit_id" required class="form-select">
                                        <option value="">Select Unit</option>
                                        @foreach($units as $unit)
                                            <option {{ old('unit_id') == $unit->id ?  "selected" : "" }}  value="{{ old('unit_id',$unit->id) }}">{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                                                    

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Product Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="product_image" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Distributor</label>
                                <div class="col-sm-9">
                                    <select name="distributor_id" id="distributor_id" required class="form-select">
                                        <option value="">Select Option</option>
                                        @foreach($distributors as $distributor)
                                            <option {{ old('distributor_id') == $distributor->id ?  "selected" : "" }}  value="{{ old('distributor_id',$distributor->id) }}">{{ $distributor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" required class="form-control">
                                        <option value="">Select Option</option>
                                        <option {{ old('status') === 1 ?  "selected" : "" }} value="1">Enabled</option>
                                        <option {{ old('status') === 0 ?  "selected" : "" }} value="0">Disabled</option>
                                    </select>
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
