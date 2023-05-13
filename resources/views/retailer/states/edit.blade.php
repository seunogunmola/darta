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
        <div class="col-xl-12 mx-auto">
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-map me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">{{ $action }}</h5>
                        </div>
                        <hr />
                        <form action="{{ route('states.update',$state->id) }}" method="post">
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
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">State Name</label>
                                <div class="col-sm-9">
                                    <input name="state_name" required value="{{ old('state_name',$state->state_name) }}" type="text" class="form-control" id="state_name" placeholder="Enter State Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">State Abbreviation</label>
                                <div class="col-sm-9">
                                    <input name="state_abbreviation" required value="{{ old('state_abbreviation',$state->state_abbreviation) }}" type="text" class="form-control" id="state_abbreviation" placeholder="Enter State Abbreviation">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" required class="form-control">
                                        <option value="">Select Option</option>
                                        <option {{ $state->status == 1 ?  "selected" : "" }} value="1">Enabled</option>
                                        <option {{ $state->status == 0 ?  "selected" : "" }} value="0">Disabled</option>
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
</div>
@endsection