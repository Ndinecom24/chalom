@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-sm">
                <div class="row ">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">System Statuses</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('settings')}}">Settings</a></li>
                            <li class="breadcrumb-item active">System Statuses</li>
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
                                <form role="form" method="post" action="{{route('statuses.store')}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputRoleName"> Name</label>
                                                    <input type="text" class="form-control" id="inputRoleName"
                                                           name="name"
                                                           placeholder="Enter Name" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputRoleDescription"> Description</label>
                                                    <input type="text" class="form-control" id="inputRoleDescription"
                                                           name="description"
                                                           placeholder="Enter Description" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group text-start">
                                                    <span for="status_id"> Colour </span>
                                                    <select class="form-control" id="html" name="html" required>
                                                        <option value="">--Choose--</option>
                                                        <option value="success"><span class="text-success">green</span></option>
                                                        <option value="info"><span class="text-info">blue</span></option>
                                                        <option value="danger"><span class="text-danger">red</span></option>
                                                        <option value="warning"><span class="text-warning">yellow</span></option>
                                                        <option value="primary"><span class="text-primary">primary</span></option>
                                                        <option value="body"><span class="text-body">body</span></option>
                                                        <option value="default"><span class="text-default">default</span></option>
                                                        <option value="dark"><span class="text-dark">dark</span></option>
                                                        <option value="light"><span class="text-light">orange</span></option>
                                                            <option value="muted"><span class="text-muted">muted</span></option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
