@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">{{$user_types}}</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">{{$user_types}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr>

        <div class="row">

            <div class="col-12">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <p class="lead"> {{session()->get('message')}}</p>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <p class="lead"> {{session()->get('error')}}</p>
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

            <div class="col-sm-2 mb-4">
                <div class="card card-body text-center">
                    <h2>{{$users->count() }}</h2> <h4>{{$user_types}}</h4>
                </div>
            </div>

            @if($user_types == "Customers")
                <div class="col-sm-4 mb-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <span>{{$users->where('customer_type_id', config('constants.customer_type.new'))->count() }} New Customers</span>
                        </div>
                        <div class="col-sm-12">
                            <span>{{$users->where('customer_type_id',  config('constants.customer_type.returning') )->count() }} Returning Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <span>{{$users->where('gender', 'Male')->count() }} Males</span>
                        </div>
                        <div class="col-sm-12">
                            <span>{{$users->where('gender',  'Female' )->count() }} Females</span>
                        </div>
                        <div class="col-sm-12">
                            <span>{{$users->where('gender',  '' )->count() }} None</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-sm-4 mb-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <span>{{$users->where('role_id', config('constants.role.developer.id'))->count() }} {{config('constants.role.developer.name')}}</span>
                        </div>
                        <div class="col-sm-12">
                            <span>{{$users->where('role_id', config('constants.role.admin.id'))->count() }} {{config('constants.role.admin.name')}}</span>
                        </div>
                        <div class="col-sm-12">
                            <span>{{$users->where('role_id',  config('constants.role.verifier.id') )->count() }} {{config('constants.role.verifier.name')}}</span>
                        </div>
                        <div class="col-sm-12">
                            <span>{{$users->where('role_id',  config('constants.role.approver.id') )->count() }} {{config('constants.role.approver.name')}}</span>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">

                <div class="card">
                    {{--                        <div class="card-header" id="headingOne">--}}
                    {{--                            <h5 class="mb-0">--}}
                    {{--                                <a class="btn btn-link" href="{{route('user.create')}}" >--}}
                    {{--                                    {{$user_types}} --}}
                    {{--                                </a>--}}
                    {{--                            </h5>--}}
                    {{--                        </div>--}}
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                         data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-sm btn-outline-success mb-2"
                                       @if($user_types == "Customers")
                                           href="{{route('user.client.create')}}"
                                       @else
                                           href="{{route('user.admin.create')}}"
                                        @endif
                                    >
                                        New {{$user_types}}
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Gender</td>
                                        <td>Type</td>
                                        <td>Role</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td> {{$user->id}} </td>
                                            <td>{{$user->name }}  </td>
                                            <td>{{$user->email }}  </td>
                                            <td>{{$user->mobile_number ?? "" }}  </td>
                                            <td>{{$user->gender ?? ""}}  </td>
                                            <td>{{$user->customerType->name ?? $user->customer_types_id}}  </td>
                                            <td>{{$user->role->name ?? $user->roles_id}}  </td>
                                            <td>{{$user->status->name ?? ""}}  </td>
                                            <td>
                                                <div class="row ">
                                                    <div class="col-3">
                                                        <a class="btn btn-sm btn-secondary"
                                                           href="{{route('user.client.profile', $user)}}">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </div>
                                                    {{--                                                        <div class="col-3 ">--}}
                                                    {{--                                                            <button class="btn btn-sm btn-secondary text-left" data-toggle="modal" data-target="#modal-delete-user"--}}
                                                    {{--                                                                    data-sent_data="{{$user}}" >--}}
                                                    {{--                                                                <i class="fa fa-trash"></i>--}}
                                                    {{--                                                            </button>--}}
                                                    {{--                                                        </div>--}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <!--
     ***************************
     USER MODELS
     ***************************
    -->

    <!-- NEW USER MODAL-->
    <div class="modal fade" id="modal-create-user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Create User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('user.client.store')}}" enctype="multipart/form-data">
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
                                    <input type="file" class="form-control" id="inputImage" name="image_id"
                                           placeholder="Enter Image">
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.NEW USER MODAL -->

    <!-- DELETE USER MODAL-->
    <div class="modal fade" id="modal-delete-user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('user.admin.destroy')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" class="form-control" id="delete-user-name" name="name"
                                           placeholder="Enter Name" readonly required>
                                </div>
                                <input hidden type="text" class="form-control" id="delete-user-id" name="id"
                                       required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.DELETE USER MODAL -->

@endsection


@push('custom-scripts')

    <script>

        //USER

        $('#modal-delete-user').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('sent_data'); // Extract info from data-* attributes
            $('#delete-user-name').val(recipient.name);
            $('#delete-user-id').val(recipient.id);
        });


    </script>
@endpush
