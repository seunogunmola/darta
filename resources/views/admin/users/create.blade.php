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
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">{{ $action }}</h5>
                        </div>
                        <hr />
                        <form action="{{ route('users.store') }}" method="post">
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
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Fullname</label>
                                <div class="col-sm-9">
                                    <input name="fullname" required value="{{ old('fullname') }}" type="text"
                                        class="form-control" id="name" placeholder="Enter {{ $resource }} Fullname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                                <div class="col-sm-9">
                                    <input name="phone" required value="{{ old('phone') }}"
                                        type="text" class="form-control" id="email"
                                        placeholder="Enter {{ $resource }}  Phone" maxlength="11">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input name="email" required value="{{ old('email') }}"
                                        type="email" class="form-control" id="phone"
                                        placeholder="Enter {{ $resource }}  Email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputConfirmPassword2" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" required placeholder="Enter {{ $resource }} Password"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputConfirmPassword2" class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_confirmation" class="form-control" required placeholder="Confirm {{ $resource }} Password"/>
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
                                    <button type="submit" class="btn btn-info px-5">Create {{ $resource }} </button>
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
