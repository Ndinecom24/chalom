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
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings" >
                                    <div class="profile-pic text-center" >
                                        @if( ($user->avatar ?? "" ) == "" )
                                            <a data-toggle="modal" data-sent_data="{{$user}}" data-target="#modal-edit-user-image">
                                            <img src="{{asset('images/user.png')}}" alt="" width="100%">
                                            </a>
                                        @else
                                            <div class="user-avatar">
                                                <a data-toggle="modal"  data-sent_data="{{$user}}" data-target="#modal-edit-user-image">
                                                    <img width="100%" src="{{$user->avatar ?? ""}}" alt="{{asset('images/user.png')}}">
                                                </a>
                                            </div>
                                        @endif
                                        <br> <br>
                                        <h4 class="user-name text-uppercase">{{$user->name}}</h4>
                                        <h5 class="user-email">{{$user->email}}</h5>
                                    </div>
                                    <div class="text-center"> <hr>
                                        <p>{{$user->customerType->name ?? ""}}<br>
                                        {{$user->role->name ?? ""}} Profile</p>
                                    </div>
                                    @if(\Illuminate\Support\Facades\Auth::user()->id ==  $user->id )

                                    <form id="update_user" method="POST" action="{{route('user.admin.update.image', $user )}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-footer justify-content-between">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="Street">Change Image</label>
                                                    <input type="file"
                                                           class="form-control" id="avatar" name="avatar" placeholder="Enter Image">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-xs btn-secondary">Update Image</button>
                                        </div>
                                    </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <form id="update_user" method="POST" action="{{route('user.client.update', $user->id )}}">
                                    @csrf
                                    <fieldset>
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h6 class="mb-2 text-primary">Personal Details</h6>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" value="{{$user->name}}" class="form-control"
                                                           id="name" name="name" placeholder="Enter full name">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="eMail">Email</label>
                                                    <input type="email" value="{{$user->email}}" class="form-control" id="eMail" name="email"
                                                           placeholder="Enter email ID">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" value="{{$user->mobile_number}}" class="form-control" name="mobile_number"
                                                           id="phone" placeholder="Enter phone number">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" value="{{$user->dob}}" class="form-control" id="dob"- name="dob"
                                                           placeholder="Date of Birth">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="nid">National Identity</label>
                                                    <input type="text" value="{{$user->nid}}" class="form-control" id="nid" name="nid"
                                                           placeholder="Enter national Identity Number">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select id="inputGender" name="gender" class="form-control">
                                                        <option>{{$user->gender}}</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="Street">Plot and Street</label>
                                                    <input type="name" value="{{$user->plot_street ?? "" }}"
                                                           class="form-control" id="Street" name="plot_street" placeholder="Enter Street">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="ciTy">City</label>
                                                    <input type="name" value="{{$user->city ?? "" }}" class="form-control"
                                                           name="city"  id="ciTy" placeholder="Enter City">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="sTate">Country</label>
                                                    <input type="text" value="{{$user->country ?? "" }}" class="form-control"
                                                           name="country" id="sTate" placeholder="Enter Country">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="zIp">Zip Code</label>
                                                    <input type="text" value="{{$user->zip_code ?? "" }}" class="form-control"
                                                           name="zip_code" id="zIp" placeholder="Zip Code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h6 class="mt-3 mb-2 text-primary">Roles</h6>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="role_id">Role</label>
                                                    <select class="form-control" name="role_id"
                                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  config('constants.role.client.id')) readonly @endif
                                                    >
                                                        <option value="{{$user->role->id ?? "" }}">{{$user->role->name ?? "" }}</option>
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id !=  config('constants.role.client.id'))
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id }}">{{$role->name }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="customer_type_id">User-Type </label>
                                                    <select class="form-control" name="customer_type_id"
                                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  config('constants.role.client.id')) readonly @endif >
                                                        <option value="{{$user->customerType->id }}">{{$user->customerType->name }}</option>
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id !=  config('constants.role.client.id'))
                                                            @foreach($types as $type)
                                                            <option value="{{$type->id }}">{{$type->name }}</option>
                                                        @endforeach
                                                            @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right mt-2">
                                                <button type="submit" id="submit" name="submit" class="btn btn-primary">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
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

    <script>

        //USER
        $('#modal-edit-user-image').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('sent_data'); // Extract info from data-* attributes

        });
        $('#modal-delete-user').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('sent_data'); // Extract info from data-* attributes
            $('#delete-user-name').val(recipient.name);
            $('#delete-user-id').val(recipient.id);
        });


    </script>
@endpush
