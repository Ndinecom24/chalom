@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">Settings</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
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

            <!-- STATUSES ACCORDION-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    {{__('System Statuses')}}
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-sm btn-outline-success mb-2" data-toggle="modal" data-target="#modal-create-status">
                                            New Status
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <table  class="table table-striped">
                                        <thead>
                                        <tr>
                                            <td> #</td>
                                            <td>Name</td>
                                            <td>Description</td>
                                            <td>Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($statuses as $status)
                                            <tr>
                                                <td> {{$status->id}} </td>
                                                <td>{{$status->name}} </td>
                                                <td>{{$status->description}}  </td>
                                                <td>
                                                    <div class="row ">
                                                        <div class="col-3">
                                                            <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-edit-status"
                                                                    data-sent_data="{{$status}}" >
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-3 ">
                                                            <button class="btn btn-sm btn-secondary text-left" data-toggle="modal" data-target="#modal-delete-status"
                                                                    data-sent_data="{{$status}}" >
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
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

            <!-- ROLES ACCORDION-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                <div id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    {{__('System Roles')}}
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                             data-parent="#accordionTwo">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-sm btn-outline-success mb-2" data-toggle="modal" data-target="#modal-create-role">
                                            New Role
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <table  class="table table-striped">
                                        <thead>
                                        <tr>
                                            <td> #</td>
                                            <td>Name</td>
                                            <td>Description</td>
                                            <td>Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td> {{$role->id}} </td>
                                                <td>{{$role->name}} </td>
                                                <td>{{$role->description}}  </td>
                                                <td>
                                                    <div class="row ">
                                                        <div class="col-3">
                                                            <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-edit-role"
                                                                    data-sent_data="{{$role}}" >
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-3 ">
                                                            <button class="btn btn-sm btn-secondary text-left" data-toggle="modal" data-target="#modal-delete-role"
                                                                    data-sent_data="{{$role}}" >
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
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

            <!-- CUSTOMER TYPES ACCORDION-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                <div id="accordionThree">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">
                                    {{__('Customer Types')}}
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                             data-parent="#accordionThree">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-sm btn-outline-success mb-2" data-toggle="modal" data-target="#modal-create-type">
                                            New Type
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <table  class="table table-striped">
                                        <thead>
                                        <tr>
                                            <td> #</td>
                                            <td>Name</td>
                                            <td>Description</td>
                                            <td>Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customer_types as $type)
                                            <tr>
                                                <td> {{$type->id}} </td>
                                                <td>{{$type->name}} </td>
                                                <td>{{$type->description}}  </td>
                                                <td>
                                                    <div class="row ">
                                                        <div class="col-3">
                                                            <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-edit-type"
                                                                    data-sent_data="{{$type}}" >
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-3 ">
                                                            <button class="btn btn-sm btn-secondary text-left" data-toggle="modal" data-target="#modal-delete-type"
                                                                    data-sent_data="{{$type}}" >
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
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
    </div>



    <!--
     ***************************
     STATUS MODELS
     ***************************
    -->

    <!-- NEW STATUS MODAL-->
    <div class="modal fade" id="modal-create-status">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Create Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('statuses.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="inputStatusName"> Name</label>
                                    <input type="text" class="form-control" id="inputStatusName" name="name"
                                           placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="inputStatusDescription"> Description</label>
                                    <input type="text" class="form-control" id="inputStatusDescription" name="description"
                                           placeholder="Enter Description" required>
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
    <!-- /.NEW STATUS MODAL -->

    <!-- EDIT STATUS MODAL-->
    <div class="modal fade" id="modal-edit-status">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Update Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('statuses.update')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit-status-name"> Name</label>
                                    <input type="text" class="form-control" id="edit-status-name" name="name"
                                           placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-status-description"> Description</label>
                                    <input type="text" class="form-control" id="edit-status-description" name="description"
                                           placeholder="Enter Description" required>
                                </div>
                                <input hidden="" type="text" class="form-control" id="edit-status-id" name="id"
                                       required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.EDIT STATUS MODAL -->

    <!-- DELETE STATUS MODAL-->
    <div class="modal fade" id="modal-delete-status">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Delete Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('statuses.destroy')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" class="form-control" id="delete-status-name" name="name"
                                           placeholder="Enter Name" readonly required>
                                </div>
                                <input hidden  type="text" class="form-control" id="delete-status-id" name="id"
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
    <!-- /.DELETE STATUS MODAL -->




    <!--
     ***************************
     ROLE MODELS
     ***************************
    -->

    <!-- NEW ROLE MODAL-->
    <div class="modal fade" id="modal-create-role">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Create Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('role.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="inputRoleName"> Name</label>
                                    <input type="text" class="form-control" id="inputRoleName" name="name"
                                           placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="inputRoleDescription"> Description</label>
                                    <input type="text" class="form-control" id="inputRoleDescription" name="description"
                                           placeholder="Enter Description" required>
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
    <!-- /.NEW ROLE MODAL -->

    <!-- EDIT ROLE MODAL-->
    <div class="modal fade" id="modal-edit-role">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Update Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('role.update')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit-status-name"> Name</label>
                                    <input type="text" class="form-control" id="edit-role-name" name="name"
                                           placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-status-description"> Description</label>
                                    <input type="text" class="form-control" id="edit-role-description" name="description"
                                           placeholder="Enter Description" required>
                                </div>
                                <input hidden="" type="text" class="form-control" id="edit-role_id" name="id"
                                       required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.EDIT ROLE MODAL -->

    <!-- DELETE ROLE MODAL-->
    <div class="modal fade" id="modal-delete-role">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Delete Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('role.destroy')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="delete-role-name"> Name</label>
                                    <input type="text" class="form-control" id="delete-role-name" name="name"
                                           placeholder="Enter Name" readonly required>
                                </div>
                                <input hidden  type="text" class="form-control" id="delete-role-id" name="id"
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
    <!-- /.DELETE ROLE MODAL -->




    <!--
     ***************************
     TYPES MODELS
     ***************************
    -->

    <!-- NEW TYPES MODAL-->
    <div class="modal fade" id="modal-create-type">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Create Customer type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('customer.type.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="inputTypeName"> Name</label>
                                    <input type="text" class="form-control" id="inputTypeName" name="name"
                                           placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="inputTypeDescription"> Description</label>
                                    <input type="text" class="form-control" id="inputTypeDescription" name="description"
                                           placeholder="Enter Description" required>
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
    <!-- /.NEW TYPES MODAL -->

    <!-- EDIT TYPES MODAL-->
    <div class="modal fade" id="modal-edit-type">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Update Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('customer.type.update')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit-status-name"> Name</label>
                                    <input type="text" class="form-control" id="edit-type-name" name="name"
                                           placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit-status-description"> Description</label>
                                    <input type="text" class="form-control" id="edit-type-description" name="description"
                                           placeholder="Enter Description" required>
                                </div>
                                <input hidden="" type="text" class="form-control" id="edit-type-id" name="id"
                                       required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.EDIT TYPES MODAL -->

    <!-- DELETE TYPES MODAL-->
    <div class="modal fade" id="modal-delete-type">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Delete Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="{{route('customer.type.destroy')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name</label>
                                    <input type="text" class="form-control" id="delete-type-name" name="name"
                                           placeholder="Enter Name" readonly required>
                                </div>
                                <input hidden  type="text" class="form-control" id="delete-type-id" name="id"
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
    <!-- /.DELETE TYPES MODAL -->



@endsection


@push('custom-scripts')

<script>

    //STATUS
    $('#modal-edit-status').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('sent_data'); // Extract info from data-* attributes
        $('#edit-status-name').val(recipient.name);
        $('#edit-status-description').val(recipient.description);
        $('#edit-status-id').val(recipient.id);
    });
    $('#modal-delete-status').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('sent_data'); // Extract info from data-* attributes
        $('#delete-status-name').val(recipient.name);
        $('#delete-status-id').val(recipient.id);
    });

    // ROLE
    $('#modal-edit-role').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('sent_data'); // Extract info from data-* attributes
        $('#edit-role-name').val(recipient.name);
        $('#edit-role-description').val(recipient.description);
        $('#edit-role_id').val(recipient.id);
    });
    $('#modal-delete-role').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('sent_data'); // Extract info from data-* attributes
        $('#delete-role-name').val(recipient.name);
        $('#delete-role-id').val(recipient.id);
    });

    // TYPES
    $('#modal-edit-type').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('sent_data'); // Extract info from data-* attributes
        $('#edit-type-name').val(recipient.name);
        $('#edit-type-description').val(recipient.description);
        $('#edit-type-id').val(recipient.id);
    });
    $('#modal-delete-type').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('sent_data'); // Extract info from data-* attributes
        $('#delete-type-name').val(recipient.name);
        $('#delete-type-id').val(recipient.id);
    });

</script>
@endpush
