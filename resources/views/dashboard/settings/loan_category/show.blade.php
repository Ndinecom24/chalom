@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-sm">
                <div class="row ">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">Loan Category</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('settings')}}">Settings</a></li>
                            <li class="breadcrumb-item active">Loan Category</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-8 offset-2">
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <p class="lead"> {{session()->get('message')}}</p>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row gutters">

                    <div class="col-xl-8 offset-2 col-lg-8 offset-2  col-md-8 offset-2  col-sm-12 offset-2  col-12">
                        <div class="card ">
                            <div class="card-body">
                                <!-- form start -->
                                <form role="form" method="post" action="{{route('loan.category.update', $loanCategory)}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputRoleName"> Name</label>
                                                    <input type="text" class="form-control" id="inputRoleName"
                                                           name="name" value="{{$loanCategory->name}}"
                                                           placeholder="Enter Name" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputRoleDescription"> Description</label>
                                                    <input type="text" class="form-control" id="inputRoleDescription"
                                                           name="description"  value="{{$loanCategory->description}}"
                                                           placeholder="Enter Description" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if(( auth()->user()->role_id ==  config('constants.role.admin.id') ) || ( auth()->user()->role_id ==  config('constants.role.developer.id')))
                               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card card-footer mt-4 mb-7">
                                        <form role="form12" method="post" action="{{route('loan.category.destroy', $loanCategory )}}">
                                            @csrf
                                            <div class="justify-content-between">
                                                <span class="text-danger ">Do you want to delete this item ? Action will not be reversed : </span>
                                                <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('custom-scripts')

@endpush
