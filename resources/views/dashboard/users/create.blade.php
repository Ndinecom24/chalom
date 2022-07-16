@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">User Profile</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
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

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <form role="form" method="post" action="{{route('user.admin.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="inputName"> Full Name</label>
                                                    <input type="text" class="form-control" id="inputName" name="name"
                                                           placeholder="Enter Name" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="inputDOD"> DOB</label>
                                                    <input type="date" class="form-control" id="inputDOD" name="dob"
                                                           placeholder="Enter Name" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="inputGender"> Gender</label>
                                                    <select id="inputGender" name="gender" class="form-control">
                                                        <option>--choose--</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="inputNID"> NID</label>
                                                    <input type="text" class="form-control" id="inputNID" name="nid"
                                                           placeholder="Enter National Identity Number" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="inputEmail"> Email</label>
                                                    <input type="email" class="form-control" id="inputEmail" name="email"
                                                           placeholder="Enter Email" required>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="inputMobileNumber"> Mobile Number</label>
                                                    <input type="text" class="form-control" id="inputMobileNumber" name="mobile_number"
                                                           placeholder="Enter Phone" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="inputCustomerType"> User Type</label>
                                                    <select id="inputCustomerType" name="customer_type_id" class="form-control">
                                                        <option>--choose</option>
                                                        @foreach($types as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="inputRole"> User Role</label>
                                                    <select id="inputRole" name="role_id" class="form-control">
                                                        <option>--choose</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="inputImage"> Profile Image</label>
                                                    <input type="file" class="form-control" id="inputImage" name="avatar"
                                                           placeholder="Enter Image" >
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
