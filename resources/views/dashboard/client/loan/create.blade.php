@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">Clients Loan Application</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Clients Loan Application</li>
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

            <!-- USERS ACCORDION-->
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 mb-4">
                    <div class="row">
                        <div class="col-12">
                            <div id="accordion1 ">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                {{__('#STEP 1: PERSONAL DETAILS')}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row gutters">
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="name">Full Name</label>
                                                                <input type="text" value="{{$user->name}}"
                                                                       class="form-control"
                                                                       id="name" name="name"
                                                                       placeholder="Enter full name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="eMail">Email</label>
                                                                <input type="email" value="{{$user->email}}"
                                                                       class="form-control" id="eMail" name="email"
                                                                       placeholder="Enter email ID">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" value="{{$user->mobile_number}}"
                                                                       class="form-control" name="mobile_number"
                                                                       id="phone" placeholder="Enter phone number">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="dob">Date of Birth</label>
                                                                <input type="date" value="{{$user->dob}}"
                                                                       class="form-control" id="dob" - name="dob"
                                                                       placeholder="Date of Birth">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="nid">National Identity</label>
                                                                <input type="text" value="{{$user->nid}}"
                                                                       class="form-control" id="nid" name="nid"
                                                                       placeholder="Enter national Identity Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="gender">Gender</label>
                                                                <select id="inputGender" name="gender"
                                                                        class="form-control">
                                                                    <option>{{$user->gender}}</option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                    <option>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div id="accordion2 ">
                                <div class="card">
                                    <div class="card-header" id="heading2">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2"
                                                    aria-expanded="true" aria-controls="collapse2">
                                                {{__('#STEP 2: ADDRESS')}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse2" class="collapse hide" aria-labelledby="heading2"
                                         data-parent="#accordion2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mt-3 mb-2 text-primary">Enter Address Details</h6>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="Street">Plot and Street</label>
                                                                <input type="name" value="{{$user->plot_street ?? "" }}"
                                                                       class="form-control" id="Street"
                                                                       name="plot_street" placeholder="Enter Street">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="ciTy">City</label>
                                                                <input type="name" value="{{$user->city ?? "" }}"
                                                                       class="form-control"
                                                                       name="city" id="ciTy" placeholder="Enter City">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="sTate">Country</label>
                                                                <input type="text"
                                                                       value="{{$user->country ?? "Zambia" }}"
                                                                       class="form-control"
                                                                       name="country" id="sTate"
                                                                       placeholder="Enter Country">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="zIp">Zip Code</label>
                                                                <input type="text"
                                                                       value="{{$user->zip_code ?? "10101" }}"
                                                                       class="form-control"
                                                                       name="zip_code" id="zIp" placeholder="Zip Code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div id="accordion2A ">
                                <div class="card">
                                    <div class="card-header" id="heading2A">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2A"
                                                    aria-expanded="true" aria-controls="collapse2A">
                                                {{__('#STEP 3: NEXT OF KIN')}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse2A" class="collapse hide" aria-labelledby="heading2A"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mt-3 mb-2 text-primary">Enter Next of Kin Details</h6>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="kin_name">Full Name</label>
                                                                <input type="name" value="{{$user->kin->name ?? "" }}"
                                                                       class="form-control" id="kin_name"
                                                                       name="kin_name" placeholder="Enter Next of Kin Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="kin_phone">Phone</label>
                                                                <input type="number" value="{{$user->kin->phone ?? "" }}"
                                                                       class="form-control"
                                                                       name="kin_phone" id="kin_phone" placeholder="Enter Next of Kin Phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="kin_email">Email</label>
                                                                <input type="email"
                                                                       value="{{$user->kin->email ?? "" }}"
                                                                       class="form-control"
                                                                       name="kin_email" id="kin_email"
                                                                       placeholder="Enter Kin Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="kin_work">Work</label>
                                                                <select class="form-control" id="kin_work" name="kin_work">
                                                                    <option
                                                                        value="{{$user->kin->work_status ?? "" }}">{{$user->kin->work_status ?? "" }}</option>
                                                                @foreach($works as $work)
                                                                        <option
                                                                            value="{{$work->name ?? "" }}">{{$work->name ?? "" }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="kin_work_place">Work/School/Institution</label>
                                                                <input type="text"
                                                                       value="{{$user->kin->work_place ?? "" }}"
                                                                       class="form-control"
                                                                       name="kin_work_place" id="kin_work_place"
                                                                       placeholder="Enter Work/School/Institution ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div id="accordion3 ">
                                <div class="card">
                                    <div class="card-header" id="heading3">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse3"
                                                    aria-expanded="true" aria-controls="collapse3">
                                                {{__('#STEP 4: WORK STATUS')}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse3" class="collapse hide" aria-labelledby="heading3"
                                         data-parent="#accordion3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mt-3 mb-2 text-primary">Enter Work Details</h6>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="role_id">Status</label>
                                                                <select class="form-control" name="role_id">
                                                                    <option
                                                                        value="{{$user->work->id ?? "" }}">{{$user->work->name ?? "" }}</option>
                                                                    @foreach($works as $work)
                                                                        <option
                                                                            value="{{$work->id ?? "" }}">{{$work->name ?? "" }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="customer_type_id">User-Type </label>
                                                                <select class="form-control" name="customer_type_id">
                                                                    <option
                                                                        value="{{$user->customerType->id }}">{{$user->customerType->name }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div id="accordion4 ">
                                <div class="card">
                                    <div class="card-header" id="heading4">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4"
                                                    aria-expanded="true" aria-controls="collapse4">
                                                {{__('#STEP 5: FILES')}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse4" class="collapse hide" aria-labelledby="heading4"
                                         data-parent="#accordion4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mt-3 mb-2 text-primary">Upload Supporting Documents</h6>
                                                        </div>

                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="payslip_one">{{date("M Y", strtotime("-1 month"))}}
                                                                    Payslip</label>
                                                                <input type="file" class="form-control"
                                                                       name="payslip_one" id="payslip_one"
                                                                       placeholder="Zip Code">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="payslip_two">{{date("M Y", strtotime("-2 month"))}}
                                                                    Payslip</label>
                                                                <input type="file" class="form-control"
                                                                       name="payslip_two" id="payslip_two"
                                                                       placeholder="Zip Code">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="payslip_three">{{date("M Y", strtotime("-3 month"))}}
                                                                    Payslip</label>
                                                                <input type="file"
                                                                       class="form-control"
                                                                       name="payslip_three" id="payslip_three"
                                                                       placeholder="Zip Code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mt-3 mb-2 text-primary">Documents</h6>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="payslip_three"> Documents</label>
                                                                <input type="file"
                                                                       class="form-control"
                                                                       name="documents" id="documents">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @if($user->identity == null)
                                                <div class="col-12">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mt-3 mb-2 text-primary">National Identity</h6>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="identity"> NID</label>
                                                                <input type="file"
                                                                       class="form-control"
                                                                       name="identity" id="identity">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-4 mb-4">
{{--                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-4 mb-4">--}}
                        <div id="accordionApplic">
                            <div class="card ">
                                <div class="card-header" id="headingApplic">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseApplic"
                                                aria-expanded="true" aria-controls="collapseApplic">
                                            {{__('LOAN APPLICATION')}}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseApplic" class="collapse show" aria-labelledby="headingApplic"
                                     data-parent="#accordionApplic">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row gutters">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <h6 class="mt-3 mb-2 text-primary">Enter Loan Details</h6>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="loan_amount">
                                                                Loan Type</label>
                                                           <select id="loan_type" name="loan_type" class="form-control ">
                                                               <option value="">--Choose--</option>
{{--                                                               @foreach()--}}
                                                                   <option></option>
{{--                                                            @endforeach--}}
                                                           </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="loan_amount">
                                                                Loan Amount in Kwacha</label>
                                                            <input type="number" class="form-control "
                                                                   name="loan_amount" id="loan_amount"
                                                                   placeholder="How much? e.g 5000 ">
                                                        </div>
                                                    </div>
                                                    <div class=" col-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="repayment_period">
                                                                Repayment Period in Months</label>
                                                            <input type="number" class="form-control "
                                                                   name="repayment_period" id="repayment_period"
                                                                   placeholder="How many months? e.g 2 ">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label
                                                                for="payslip_three">Percentage</label>
                                                            <input type="number" readonly
                                                                   class="form-control is-valid"
                                                                   name="loan_percentage" id="loan_percentage"
                                                                   placeholder="10 %">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label
                                                                for="payslip_three">Monthly Repayments</label>
                                                            <input type="number" readonly
                                                                   class="form-control is-valid"
                                                                   name="monthly_amount" id="monthly_amount"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label
                                                                for="payslip_three">Total Repayment</label>
                                                            <input type="number" readonly
                                                                   class="form-control is-valid"
                                                                   name="loan_percentage" id="loan_percentage"
                                                                   placeholder="%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn  btn-success mb-2" data-toggle="modal"
                                                        data-target="#modal-create-user">
                                                    APPLY
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                    </div>--}}
                </div>
            </div>

        </div>
    </div>




@endsection


@push('custom-scripts')

@endpush
