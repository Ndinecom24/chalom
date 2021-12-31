@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-sm">
                <div class="row ">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">Roles</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('settings')}}">Settings</a></li>
                            <li class="breadcrumb-item active">Roles</li>
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
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- form start -->
                                <form role="form" method="post" action="{{route('role.update', $role)}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputRoleName"> Name</label>
                                                    <input type="text" class="form-control" id="inputRoleName"
                                                           name="name" value="{{$role->name}}"
                                                           placeholder="Enter Name" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputRoleDescription"> Description</label>
                                                    <input type="text" class="form-control" id="inputRoleDescription"
                                                           name="description"  value="{{$role->description}}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('custom-scripts')

@endpush
