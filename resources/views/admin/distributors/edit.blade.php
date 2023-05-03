@extends('admin.templates.main')
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
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">{{ $action }}</h5>
                        </div>
                        <hr />
                        <form action="{{ route('distributor.update',$distributor->id) }}" method="post">
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
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input name="name" required value="{{ old('name',$distributor->name) }}" type="text"
                                        class="form-control" id="name" placeholder="Enter Distributor Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                                <div class="col-sm-9">
                                    <input name="phone" required value="{{ old('phone',$distributor->phone) }}"
                                        type="text" class="form-control" id="phone"
                                        placeholder="Enter Distributor Phone" maxlength="11">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input name="email" required value="{{ old('email',$distributor->email) }}"
                                        type="email" class="form-control" id="email"
                                        placeholder="Enter Distributor Email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputConfirmPassword2" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea name="address" required class="form-control" id="" cols="30"
                                        rows="3">{{ old('address',$distributor->name) }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <select name="state_id" id="state_id" required class="form-control">
                                        <option value="">Select Option</option>
                                        @foreach($states as $id=>$name)
                                            <option {{ $distributor->state_id == $id ? "selected" : "" }} value="{{ old('state_id',$id) }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Region</label>
                                <div class="col-sm-9">
                                    <select name="region_id" id="region_id" required class="form-control">
                                        <option value="">Select Option</option>
                                        @foreach($regions as $id=>$name)
                                            <option {{ $distributor->region_id == $id ? "selected" : "" }} value="{{ old('region_id',$id) }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" required class="form-control">
                                        <option value="">Select Option</option>
                                        <option {{ $distributor->status == 1 ? "selected" : "" }} value="1">Enabled</option>
                                        <option {{ $distributor->status == 0 ? "selected" : "" }} value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Update</button>
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
