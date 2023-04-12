@extends('layouts.website.main')

@push('custom-stylesheets')
    <style class="stylesheet">
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        #grad1 {
            background-color: #9C27B0;
            background-image: linear-gradient(120deg, #FF4081, #81D4FA)
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        /*#msform input,*/
        /*#msform textarea {*/
        /*    padding: 0px 8px 4px 8px;*/
        /*    border: none;*/
        /*    border-bottom: 1px solid #ccc;*/
        /*    border-radius: 0px;*/
        /*    margin-bottom: 25px;*/
        /*    margin-top: 2px;*/
        /*    width: 100%;*/
        /*    box-sizing: border-box;*/
        /*    font-family: montserrat;*/
        /*    color: #2C3E50;*/
        /*    font-size: 16px;*/
        /*    letter-spacing: 1px*/
        /*}*/

        /*#msform input:focus,*/
        /*#msform textarea:focus {*/
        /*    -moz-box-shadow: none !important;*/
        /*    -webkit-box-shadow: none !important;*/
        /*    box-shadow: none !important;*/
        /*    border: none;*/
        /*    font-weight: bold;*/
        /*    border-bottom: 2px solid skyblue;*/
        /*    outline-width: 0*/
        /*}*/

        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204px;
            height: 104px;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
    </style>

@endpush

@section('content')
    <!-- partial -->
    <div class="py-2"
         style="background:url({{asset('theme/borrow/assets/images/slider/slider-2.jpg')}})no-repeat; background-position: center; background-size: cover;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12 ">
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
                    <form id="finish_apply_form" action="{{ route('loan.finish', compact('loan', 'user')) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12 mb-4 mt-4 p-0 mt-3 mb-2">

                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3  mr-2">
                                <h2 class="text-center"><strong>Complete your Loan Application</strong></h2>

                                <div class="card-header">
                                    <h6 class="mt-3 mb-2 text-primary">PERSONAL DETAILS</h6>
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row gutters">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="name">Full Name<span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$user->name}}"
                                                                   class="form-control" readonly required
                                                                   id="name" name="name"
                                                                   placeholder="Enter full name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="eMail">Email<span class="text-danger">*</span></label>
                                                            <input type="email" value="{{$user->email}}" readonly required
                                                                   class="form-control" id="eMail" name="email"
                                                                   placeholder="Enter email ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="phone">Phone<span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$user->mobile_number}}" required
                                                                   class="form-control" name="mobile_number"
                                                                   id="phone" placeholder="Enter phone number">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="dob">Date of Birth<span class="text-danger">*</span></label>
                                                            <input type="date" value="{{$user->dob}}" required
                                                                   class="form-control" id="dob"  name="dob"
                                                                   placeholder="Date of Birth">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="nid">National Identity<span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$user->nid}}"
                                                                   class="form-control" id="nid" name="nid" required
                                                                   placeholder="Enter national Identity Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                                            <select id="inputGender" name="gender" required
                                                                    class="form-control">
                                                                <option value="{{$user->gender ?? '' }}">{{$user->gender ?? "--Choose--"}}</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
{{--                                                                <option value="Other">Other</option>--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="card-header">
                                    <h6 class="mt-3 mb-2 text-primary">ADDRESS DETAILS</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row gutters">
{{--                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                                                    <h6 class="mt-3 mb-2 text-primary">Enter Address Details</h6>--}}
{{--                                                </div>--}}
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="Street">Plot and Street<span class="text-danger">*</span></label>
                                                        <input type="name" value="{{$user->plot_street ?? "" }}"
                                                               class="form-control" id="Street" required
                                                               name="plot_street" placeholder="Enter Street">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="ciTy">City<span class="text-danger">*</span></label>
                                                        <input type="name" value="{{$user->city ?? "" }}"
                                                               class="form-control" required
                                                               name="city" id="ciTy" placeholder="Enter City">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="sTate">Country<span class="text-danger">*</span></label>
                                                        <input type="text"
                                                               value="{{$user->country ?? "Zambia" }}"
                                                               class="form-control" required
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

                                <div class="card-header">
                                    <h6 class="mt-3 mb-2 text-primary">WORK STATUS</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="role_id">Work Status<span class="text-danger">*</span></label>
                                                        <select class="form-control" required name="work_status_id">
                                                            <option>--Choose--</option>
                                                             @foreach($works as $work)
                                                                <option value="{{$work->id ?? "" }}" > {{ $work->name ?? "" }} </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="customer_type_id">User-Type </label>
                                                        <select class="form-control" name="customer_type_id">
                                                            <option value="{{$user->customerType->id }}">{{$user->customerType->name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="role_id">Employer Name<span class="text-danger">*</span></label>
                                                        <input list="employer_list" type="work_name" value="{{$user->kin->name ?? "" }}"
                                                               class="form-control" id="work_name" required
                                                               name="work_name" placeholder="Enter Employer Name">
                                                        <datalist id="employer_list">
                                                            @foreach($work_places as $work_place)
                                                                <option
                                                                    value="{{$work_place->id ?? "" }}">{{      $work_place->name ?? "" }}</option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="role_id">Employer Address<span class="text-danger">*</span></label>
                                                        <input type="work_address" value="{{$user->kin->name ?? "" }}"
                                                               class="form-control" id="work_address" required
                                                               name="work_address" placeholder="Enter Employer Address">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-header">
                                    <h6 class="mt-3 mb-2 text-primary">NEXT OF KIN / GUARANTOR</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row gutters">
{{--                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                                                    <h6 class="mt-3 mb-2 text-primary">Enter Next of Kin Details</h6>--}}
{{--                                                </div>--}}
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kin_name">Full Name<span class="text-danger">*</span></label>
                                                        <input type="name" value="{{$user->kin->name ?? "" }}"
                                                               class="form-control" id="kin_name" required
                                                               name="kin_name" placeholder="Enter Next of Kin Name">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kin_phone">Phone<span class="text-danger">*</span></label>
                                                        <input type="number" value="{{$user->kin->phone ?? "" }}"
                                                               class="form-control" required
                                                               name="kin_phone" id="kin_phone" placeholder="Enter Next of Kin Phone">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kin_nid">NID (NRC/DRIVERS LICENCE)<span class="text-danger">*</span></label>
                                                        <input type="text" value="{{$user->kin->phone ?? "" }}"
                                                               class="form-control" required
                                                               name="kin_nid" id="kin_nid" placeholder="Enter National Identity">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kin_address">Address <span class="text-danger">*</span></label>
                                                        <input type="text" value="{{$user->kin->phone ?? "" }}"
                                                               class="form-control" required
                                                               name="kin_address" id="kin_address" placeholder="Enter Address">
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
                                                        <label for="kin_work">Work Status</label>
                                                        <select class="form-control" id="kin_work" name="kin_work">
                                                            <option
                                                                value="{{$user->kin->work_status ?? "" }}">{{$user->kin->work_status ?? "--Choose--" }}</option>
                                                            @foreach($works as $work)
                                                                <option
                                                                    value="{{$work->name ?? "" }}">{{$work->name ?? "" }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kin_work_place">Work/School/Institution/Home</label>
                                                        <input type="text"
                                                               value="{{$user->kin->work_place ?? "" }}"
                                                               class="form-control"
                                                               name="kin_work_place" id="kin_work_place"
                                                               placeholder="Enter Work/School/Institution ">
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kin_relationship">Relationship</label>
                                                        <select class="form-control" id="kin_relationship" name="kin_relationship">
                                                            <option value="">--Choose--</option>
                                                            <option>Husband</option>
                                                            <option>Wife</option>
                                                            <option>Brother</option>
                                                            <option>Mother</option>
                                                            <option>Father</option>
                                                            <option>Sister</option>
                                                            <option>Aunt</option>
                                                            <option>Uncle</option>
                                                            <option>Cousin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <h6 class="mt-3 mb-2 text-primary">FILES</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label
                                                            for="payslip_one">{{date("M Y", strtotime("-1 month"))}}
                                                            Payslip<span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control" required
                                                               name="payslip_one" id="payslip_one"
                                                               placeholder="Payslip one">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group ">
                                                        <label
                                                            for="payslip_two">{{date("M Y", strtotime("-2 month"))}}
                                                            Payslip<span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control" required
                                                               name="payslip_two" id="payslip_two"
                                                               placeholder="Payslip Two">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group mt-1">
                                                        <label for="account_statement"> Account Statement<span class="text-danger">*</span></label>
                                                        <input type="file" required
                                                               class="form-control" multiple
                                                               name="account_statement[]" id="account_statement">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @if($loan->loan->collateral == "Need Collateral")
                                        <div class="col-12">
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group mt-1">
                                                        <label for="collateral"> Collateral Files<span class="text-danger">*</span></label>
                                                        <input type="file" multiple
                                                               class="form-control"
                                                               name="collateral[]" id="collateral">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group mt-1">
                                                        <label for="collateral_description"> Collateral Description<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" title="Please Describe your collateral item/s"
                                                               name="collateral_description" id="collateral_description"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @endif
                                        @if($user->identity == null)
                                            <div class="col-12">
                                                <div class="row gutters">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group mt-1">
                                                            <label for="identity"> NRC<span class="text-danger">*</span></label>
                                                            <input type="file"
                                                                   class="form-control" multiple
                                                                   name="identity[]" id="identity">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row-col-6">
                                        <button type="submit" name="Submit"
                                                title="If you want your loan to be processed, please submit"
                                                class="btn btn-outline-success" > Submit</button>

                                        <span id="action_cancel" name="action_cancel" onclick="actionCancel({{$loan->id}})"
                                                title="If you are no longer interested in submitting this loan"
                                                class="btn btn-outline-danger" > Cancel</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-5  col-md-5  col-sm-5  col-12   mb-4 mt-4  p-0 mt-3 mb-2 ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3 " style="margin-left: 5%">
                                        <h2 class="text-center"><strong>LOAN DETAILS</strong></h2>
                                        <div class="m-3 text-left">
                                            <div class="card-body  border-top py-3">
                                               <div class="row">
                                                    <div class="col-12">
                                                        Purpose  : <span class="mb-0"> <b>{{$loan->loan_purpose}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Loan Type : <span class="mb-0"> <b>{{$loan->loan->name ?? ""}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Amount : <span class="mb-0"> <b>ZMW {{$loan->loan_amount}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Interest Percentage : <span class="mb-0"> <b>{{$loan->loan->rate_per_month}} %</b></span>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="card-body  border-top py-3">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        Total Payable :<span class="mb-0"> <b>ZMW {{$loan->loan_amount_due}}</b> </span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Period : <span class="mb-0"> <b>{{$loan->repayment_period}} Months</b></span>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="card-body  border-top py-3">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        Monthly Installments : <span class="mb-0"> <b>ZMW {{$loan->monthly_installments}}</b></span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3 " style="margin-left: 5%">
                                        <h2 class="text-center"><strong>SCHEDULE OPTION 1</strong></h2>
                                        <div class="m-3 text-left">
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <td>Installment</td>
                                                                <td>Amount</td>
                                                                <td>Date</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @for($i=1 ; $i <= $loan->repayment_period; $i++)
                                                                <tr>
                                                                    <td>Installment {{$i}}</td>
                                                                    <td>ZMW {{$loan->monthly_installments}}</td>
                                                                    <td>{{date("D d M Y", strtotime( $i." month"))}}</td>
                                                                </tr>
                                                            @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3 " style="margin-left: 5%">
                                        <h2 class="text-center"><strong>SCHEDULE OPTION 2</strong></h2>
                                        <div class="m-3 text-left">
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <td>Installment</td>
                                                                <td>Amount</td>
                                                                <td>Date</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @for($i=1 ; $i <= $loan->repayment_period; $i++)

                                                                @if($i == $loan->repayment_period)
                                                                <tr>
                                                                    <td>Installment {{$i}}</td>
                                                                    <td>ZMW {{ number_format( ($loan->loan_amount * ($loan->loan_rate / 100 ) ) + $loan->loan_amount , 2)}}</td>
                                                                    <td>{{date("D d M Y", strtotime( $i." month"))}}</td>
                                                                </tr>
                                                                @else
                                                                    <tr>
                                                                        <td> Installment {{$i}}</td>
                                                                        <td>ZMW {{ number_format( ($loan->loan_amount * ($loan->loan_rate / 100 ) ) , 2)}}</td>
                                                                        <td>{{date("D d M Y", strtotime( $i." month"))}}</td>
                                                                    </tr>
                                                                @endif
                                                            @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3 " style="margin-left: 5%">
                                        <h2 class="text-center"><strong>Payment Plan</strong></h2>
                                        <div class="m-3 text-left">
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label>Select Your Preferred Payment Schedule/Plan <span class="text-danger">*</span></label> <br>
                                                        <label>
                                                            <input type="radio" value="1" name="payment_plan" required>
                                                            Schedule Option 1
                                                        </label> <br>
                                                        <label>
                                                            <input type="radio" value="2" name="payment_plan">
                                                            Schedule Option 2
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>



@endsection


@push('custom-scripts')



    <script>


        function actionCancel(loan_id){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this loan application!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!  '
            }).then((result) => {
                if (result.isConfirmed) {

                    //delete the form
                    var route = '{{url('loan/apply/cancel')}}' + '/' + loan_id;

                    /* AJAX */
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: route,
                        type: 'get',
                        beforeSend: function () {
                            // Show image container
                           /// $("#loader_c_2").show();
                        },
                        success: function (response_data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                            Swal.fire({
                                title: 'Cancelled!',
                                text: "Your application has been cancelled",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Okay '
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        },
                        complete: function (response_data) {
                          //  $("#loader_c_2").hide();

                        }
                    });


                }
            }) ;

        }
    </script>

@endpush
