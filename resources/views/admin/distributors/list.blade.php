@extends('admin.templates.main')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ $resource }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">{{ $action }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <h6 class="mb-0 text-uppercase">{{ $action }}</h6>
            <hr />
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Region</th>
                            <th>State</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($distributors as $index=>$distributor )
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $distributor->uniqueid }}</td>
                                <td>{{ $distributor->name }}</td>
                                <td>{{ $distributor->phone }}</td>
                                <td>{{ $distributor->email }}</td>
                                <td>{{ $regions[$distributor->region_id] }}</td>
                                <td>{{ $states[$distributor->state_id] }}</td>
                                <td>
                                    @if($distributor->status == 1)
                                     <span class="badge bg-success">Enabled</span>
                                    @else
                                    <span class="badge bg-danger">Disabled</span>
                                    @endif                           
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('distributor.edit',$distributor->id) }}">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">View Details</a></li>
                                            <li><a class="dropdown-item" id="delete" href="{{ route('distributor.delete',$distributor->id) }}">Delete</a></li>
                                        </ul>
                                    </div>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Unique ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Region</th>
                            <th>State</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
