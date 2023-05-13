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
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Unique ID</th>
                                        <th>Name</th>
                                        <th>Abbreviation</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($states as $index=>$state )
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $state->uniqueid }}</td>
                                        <td>{{ $state->state_name }}</td>
                                        <td>{{ $state->state_abbreviation }}</td>
                                        <td>
                                            @if($state->status == 1)
                                            <span class="badge bg-success">Enabled</span>
                                            @else
                                            <span class="badge bg-danger">Disabled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('state.edit',$state->uniqueid) }}">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">View Details</a></li>
                                                    <li><a class="dropdown-item" id="delete" href="{{ route('states.delete',$state->uniqueid) }}">Delete</a></li>
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
                                        <th>Abbreviation</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
@endsection
