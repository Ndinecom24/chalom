@extends('layouts.website.main')

@push('custom-stylesheets')
    <style>
        .table_wrapper{
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
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
                <div class="row justify-content-lg-center">
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
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 mb-4 mt-4 p-0 mt-3 mb-2">
                            <form id="finish_apply_form" action="{{ route('loan.approve', compact('loan' )) }}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3  mr-2">
                                    <div class="row">
                                        <div class="col-sm-3 ">
                                            <div class=" text-end">
                                                @if( ($loan->customer->avatar ?? "" ) == "" )
                                                    <img class="img-circle" width="60px" src="{{asset('images/user.png')}}" alt="">
                                                @else
                                                    <img class="img-circle"  width="60%" src="{{$loan->customer->avatar ?? ""}}" alt="{{asset('images/user.png')}}">
                                                @endif

{{--                                                @if( ($loan->customer->avatar ?? "" ) == "" )--}}
{{--                                                    <img class="nav-item " width="60%"--}}
{{--                                                         src="{{asset('images/user.png')}}" alt="">--}}
{{--                                                @else--}}
{{--                                                    <img class="nav-item " width="60%"--}}
{{--                                                         src="{{$loan->customer->avatar ?? ""}}"--}}
{{--                                                         alt="{{asset('images/user.png')}}">--}}
{{--                                                @endif--}}
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <h2 class="text-center"><strong>LOAN APPLICATION</strong></h2>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h6 class=" text-primary">PERSONAL DETAILS</h6>
                                    </div>
                                    <div class="card-body">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row gutters">

                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="name">Full Name : <span
                                                                        class="text-dark "> {{$loan->customer->name  ?? "" }} </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="eMail">Email : <span
                                                                        class="text-dark">{{$loan->customer->email  ?? "" }}</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="phone">Phone : <span
                                                                        class="text-dark">{{$loan->customer->mobile_number  ?? ""  }}</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="dob">Date of Birth : <span
                                                                        class="text-dark">{{$loan->customer->dob  ?? "" }}</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="nid">National Identity<span
                                                                        class="text-dark">{{$loan->customer->nid  ?? ""  }}</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="gender">Gender : <span
                                                                        class="text-dark">{{$loan->customer->gender  ?? ""  }}</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="card-header">
                                        <h6 class=" text-primary">ADDRESS DETAILS</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row gutters">
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="Street">Plot and Street : <span
                                                                    class="text-dark">{{$loan->customer->plot_street ?? "" }}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="ciTy">City : <span
                                                                    class="text-dark">{{$loan->customer->city ?? "" }}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="sTate">Country : <span
                                                                    class="text-dark">{{$loan->customer->country ?? "Zambia" }}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="zIp">Zip Code : <span
                                                                    class="text-dark">{{$loan->customer->zip_code ?? "10101" }}</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h6 class=" text-primary">WORK STATUS</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row gutters">
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="role_id">Work Status : <span
                                                                    class="text-dark">{{$loan->customer->work->name ?? "--Choose--" }}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="customer_type_id">User-Type <span
                                                                    class="text-dark">{{$loan->customer->customerType->name  ?? "" }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h6 class="text-primary">NEXT OF KIN</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row gutters">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="kin_name">Full Name : <span
                                                            class="text-dark">{{$loan->customer->kin->name ?? "" }}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="kin_phone">Phone : <span
                                                            class="text-dark">{{$loan->customer->kin->phone ?? "" }}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="kin_email">Email : <span
                                                            class="text-dark">{{$loan->customer->kin->email ?? "" }}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="kin_work">Work Status : <span
                                                            class="text-dark">{{$loan->customer->kin->work_status ?? "" }}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="kin_work_place">Work/School/Institution/Home : <span
                                                            class="text-dark">{{$loan->customer->kin->work_place ?? "" }}</span></label>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="kin_relationship">Relationship : <span
                                                            class="text-dark">{{$loan->customer->kin->kin_relationship ?? "" }}</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card  mt-2">
                                    <div class="card-header">
                                        <h6 class="mb-2 text-primary">PAYSLIPS
                                            <a class="btn btn-sm float-sm-end " data-toggle="collapse"
                                               href="#payslip_div">
                                                <i class="fa fa-arrow-down"></i></a>
                                        </h6>
                                    </div>
                                    <div id="payslip_div" class="card-body ">
                                        <div class="row gutters">
                                            @if($loan->payslips != null)
                                                @foreach($loan->payslips as $payslip)
                                                    <div class="col-12">
                                                        <iframe id="{{$payslip->id}}"
                                                                src="{{$payslip->path }}"
                                                                style="width:100%; height: 800px"
                                                                title="{{$payslip->name}}"></iframe>
                                                        <span>{{number_format( $payslip->file_size, 2) }}MB {{$payslip->name}} </span>
                                                        <span> | </span>
                                                        <a href="{{$payslip->path}}"
                                                           target="_blank">View</a>
                                                        <span> | </span>
                                                        <a href="#" data-toggle="modal" data-sent_data="{{$payslip}}"
                                                           data-target="#modal-change">Edit</a>

                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h6 class="mb-2 text-primary">ACCOUNT STATEMENT</h6>
                                    </div>
                                    <div class="card-body ">
                                        <div class="row gutters">
                                            @if($loan->statements != null)
                                                @foreach($loan->statements as $statement)
                                                    <div class="col-12">
                                                        <iframe id="{{$statement->id}}"
                                                                src="{{$statement->path }}"
                                                                style="width:100%; height: 800px"
                                                                title="{{$statement->name}}"></iframe>
                                                        <span>{{number_format( $statement->file_size, 2) }}MB {{$statement->name}} </span>
                                                        <span> | </span>
                                                        <a href="{{$statement->path}}"
                                                           target="_blank">View</a>
                                                        <span> | </span>
                                                        <a href="#" data-toggle="modal" data-sent_data="{{$statement}}"
                                                           data-target="#modal-change">Edit</a>

                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h6 class="mb-2 text-primary">NRC</h6>
                                    </div>
                                    <div class="card-body  ">
                                        <div class="row gutters">
                                            @if($loan->customer->nrc  ?? ""  != null)
                                                <div class="col-12">
                                                    <iframe id="{{$loan->customer->nrc->id  ?? "" }}"
                                                            src="{{$loan->customer->nrc->path  ?? ""  }}"
                                                            style="width:100%; height: 800px"
                                                            title="{{$loan->customer->nrc->name  ?? "" }}"></iframe>
                                                    <span>{{number_format( $loan->customer->nrc->file_size  ?? 0 , 2) }}MB {{$loan->customer->nrc->name  ?? "" }} </span>
                                                    <span> | </span>
                                                    <a href="{{$loan->customer->nrc->path  ?? "" }}"
                                                       target="_blank">View</a>
                                                    <span> | </span>
                                                    <a href="#" data-toggle="modal"
                                                       data-sent_data="{{$loan->customer->nrc  ?? "" }}"
                                                       data-target="#modal-change">Edit</a>

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if($loan->loan->collateral == "Need Collateral")
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h6 class="mb-2 text-primary">Collateral</h6>
                                    </div>
                                    <div class="card-body  ">
                                        <div class="row gutters">
                                            @if($loan->collaterals != null)
                                                @foreach($loan->collaterals as $collateral)
                                                    <div class="col-12">
                                                        <iframe id="{{$collateral->id}}"
                                                                src="{{$collateral->path }}"
                                                                style="width:100%; height: 800px"
                                                                title="{{$collateral->name}}"></iframe>
                                                        <span>{{number_format( $collateral->file_size, 2) }}MB {{$collateral->name}} </span>
                                                        <span> | </span>
                                                        <a href="{{$collateral->path}}"
                                                           target="_blank">View</a>
                                                        <span> | </span>
                                                        <a href="#" data-toggle="modal" data-sent_data="{{$collateral}}"
                                                           data-target="#modal-change">Edit</a>

                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <span class="text-bold">Description : </span>
                                        <span>{{$loan->collateral_description}}</span>
                                    </div>
                                </div>
                                @endif


                                <!-- APPROVALS LIST -->
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-striped table_wrapper" >
                                                    <thead>
                                                    <tr>
                                                        <td>By</td>
                                                        <td>From</td>
                                                        <td>To</td>
                                                        <td>Comment</td>
                                                        <td>Date</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($approvals as $approval)
                                                        <tr>
                                                            <td>{{$approval->by->name ?? '--'}}</td>
                                                            <td>{{$approval->from->name ?? '--'}}</td>
                                                            <td>{{$approval->to->name ?? '--'}}</td>
                                                            <td>{{$approval->comment ?? '--'}}</td>
                                                            <td>{{ \Carbon\Carbon::parse($approval->created_at)->diffForhumans() }}</td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- APPROVE ACTIONS -->
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mt-1 mb-3">
                                                <label> <b>Current Status : {{$loan->status->name ?? $loan->statuses_id }}</b></label>
                                            </div>

                                                {{-- [1] : LOAN APPLICATION NEEDS TO BE COMPLETED--}}
                                            @if($loan->statuses_id == config('constants.status.loan_request_login'))

                                                {{-- ADMIN --}}
                                                @if(
    ($logged_in_user->role_id ==  config('constants.role.admin.id'))
   || ($logged_in_user->role_id ==  config('constants.role.verifier.id'))
   || ($logged_in_user->role_id ==  config('constants.role.approver.id'))
    )
                                                {{-- CLIENT --}}
                                                <div class="col-12 text-center">
                                                    <span class=" bg-gradient-green"
                                                            title="Client ({{$loan->customer->name  ?? "" }}) needs to complete this loan application and submit for verification" >
                                                        Pending Loan Submission
                                                    </span>
                                                </div>
                                                @else
                                                    <div class="col-12 text-center">
                                                        <a class="btn btn-outline-primary"
                                                           title="{{$loan->customer->name  ?? ""  }} needs to complete this loan application and then submit for verification"
                                                           href="">
                                                            Complete Loan Application
                                                        </a>
                                                    </div>
                                                @endif


                                                {{--  LOAN HAS BEEN SUBMITTED --}}
                                            @elseif($loan->statuses_id == config('constants.status.loan_submission'))

                                                {{-- VERIFIER --}}
                                                @if($logged_in_user->role_id ==  config('constants.role.verifier.id'))
                                                    <div class="col-lg-8 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="eMail">Comment <span class="text-danger">*</span></label>
                                                            <input type="text" required
                                                                   title="You need to add a reason/comments for your decision"
                                                                   class="form-control" id="comment" name="comment"
                                                                   placeholder="Enter comment for your action">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-12">
                                                        <label for="approve"><span
                                                                class="text-success ">Approve</span></label>
                                                        <button type="submit" name="approve"
                                                                title="Click to approve that you have verified this loan"
                                                                value="{{config('constants.action.review')}}"
                                                                class="btn btn-outline-success"><i
                                                                class="ui-icon ui-icon-circle-check"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-12">
                                                        <label for="reject"><span
                                                                class="text-danger">Reject</span></label>
                                                        <button type="submit" name="reject"
                                                                title="Click to reject this loan application e.g because you have not verified the details"
                                                                value="{{config('constants.action.reject')}}"
                                                                class="btn btn-outline-danger"><i
                                                                class="ui-icon ui-icon-circle-close "></i>
                                                        </button>
                                                    </div>
                                                @else
                                                    {{-- CLIENT --}}
                                                    <div class="col-12 text-center">
                                                        <span class="btn btn-outline-primary"
                                                                title="Client ({{$loan->customer->name  ?? ""  }}) has completed and submitted loan application, it now needs to be verified by admins" >
                                                            Pending Loan Verification
                                                        </span>
                                                    </div>
                                                @endif


                                            {{--  LOAN HAS BEEN VERIFIED / PENDING APPROVAL --}}
                                            @elseif($loan->statuses_id == config('constants.status.loan_reviewed'))

                                                {{-- VERIFIER --}}
                                                @if($logged_in_user->role_id ==  config('constants.role.approver.id'))
                                                    <div class="col-lg-8 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="eMail">Comment<span class="text-danger">*</span></label>
                                                            <input type="text" required
                                                                   title="You need to add a reason/comments for your decision"
                                                                   class="form-control" id="comment" name="comment"
                                                                   placeholder="Enter comment for your action">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-12">
                                                        <label for="approve"><span
                                                                class="text-success ">Approve</span></label>
                                                        <button type="submit" name="approve"
                                                                title="Click to approve that you have verified this loan"
                                                                value="{{config('constants.action.approve')}}"
                                                                class="btn btn-outline-success"><i
                                                                class="ui-icon ui-icon-circle-check"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-12">
                                                        <label for="reject"><span
                                                                class="text-danger">Reject</span></label>
                                                        <button type="submit" name="reject"
                                                                title="Click to reject this loan application e.g because you have not verified the details"
                                                                value="{{config('constants.action.reject')}}"
                                                                class="btn btn-outline-danger"><i
                                                                class="ui-icon ui-icon-circle-close "></i>
                                                        </button>
                                                    </div>
                                                @else
                                                    {{-- CLIENT --}}
                                                    <div class="col-12 text-center">
                                                        <span class="btn btn-outline-primary"
                                                              title=" {{$loan->customer->name  ?? ""  }} Loan has been verified and now needs to be approved" >
                                                            Pending Loan Approval
                                                        </span>
                                                    </div>
                                                @endif

                                                {{--  APPROVED / FUNDS NEEDS TO BE DISBURSED--}}
                                            @elseif($loan->statuses_id == config('constants.status.loan_approved'))
                                                {{-- VERIFIER --}}
{{--                                                @if( $logged_in_user->role_id ==  config('constants.role.verifier.id'))--}}
                                                    @if( ($logged_in_user->role_id ==  config('constants.role.verifier.id')) ||
                                               ($logged_in_user->role_id ==  config('constants.role.approver.id')))
                                                    <div class="col-lg-8 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="eMail">Comment<span class="text-danger">*</span></label>
                                                            <input type="text" required
                                                                   title="You need to add a reason/comments for your decision"
                                                                   class="form-control" id="comment" name="comment"
                                                                   placeholder="Enter comment for your action">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-12">
                                                        <label for="approve"><span
                                                                class="text-success ">Approve</span></label>
                                                        <button type="submit" name="approve"
                                                                title="Click to approve that you have verified this loan"
                                                                value="{{config('constants.action.funds_disbursed')}}"
                                                                class="btn btn-outline-success"><i
                                                                class="ui-icon ui-icon-circle-check"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-12">
                                                        <label for="reject"><span
                                                                class="text-danger">Reject</span></label>
                                                        <button type="submit" name="reject"
                                                                title="Click to reject this loan application e.g because you have not verified the details"
                                                                value="{{config('constants.action.reject')}}"
                                                                class="btn btn-outline-danger"><i
                                                                class="ui-icon ui-icon-circle-close "></i>
                                                        </button>
                                                    </div>
                                                @else
                                                    {{-- CLIENT --}}
                                                    <div class="col-12 text-center">
                                                        <span class="btn btn-outline-primary"
                                                              title="{{$loan->customer->name  ?? ""  }} Loan has been approved, waiting for funds to be disbursed now." >
                                                            Pending Funds Disbursement
                                                        </span>
                                                    </div>
                                                @endif


                                                {{--  FUNDS NEEDS TO BE DISBURSED / REPAYEMENT--}}
                                            @elseif( ($loan->statuses_id == config('constants.status.loan_funds_disbursed') )
                                               )
                                                {{-- VERIFIER / ADMIN / APPROVER --}}
                                                @if($logged_in_user->role_id ==  config('constants.role.verifier.id')
                                               || ($loan->statuses_id == config('constants.role.approver.id')) )
                                                    <div class="col-lg-8 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="eMail">Amount<span class="text-danger">*</span></label>
                                                            <input type="number" required
                                                                   title="Enter Amount being repaid"
                                                                   class="form-control" id="amount" name="amount"
                                                                   placeholder="Enter Amount Repaid">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label>Total Balance :<br> ZMK {{number_format( ($loan->loan_amount_due - $loan->schedules->sum('paid')), 2) }} </label>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="eMail">Comment<span class="text-danger">*</span></label>
                                                            <input type="text" required
                                                                   title="You need to add a reason/comments for your decision"
                                                                   class="form-control" id="comment" name="comment"
                                                                   placeholder="Enter comment for your action">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="approve"><span
                                                                class="text-success ">Submit Payment</span></label>
                                                        <button type="submit" name="approve"
                                                                title="Click to approve that you have verified this loan"
                                                                value="{{config('constants.action.loan_payment')}}"
                                                                class="btn btn-outline-success"><i
                                                                class="ui-icon ui-icon-circle-check"></i>
                                                        </button>
                                                    </div>

                                                @else
                                                    {{-- CLIENT --}}
                                                    <div class="col-12 text-center">
                                                        <span class="btn btn-outline-primary"
                                                              title="{{$loan->customer->name  ?? ""  }} Loan has been approved, waiting for funds to be repaid now." >
                                                            Pending Loan Repayment
                                                        </span>
                                                    </div>
                                                @endif


                                                {{--  NEXT ACTION  --}}
                                            @else
                                                <div class="row-cols-12">
{{--                                                    <span type="submit" name="Submit"--}}
{{--                                                          title="ummmm devs"--}}
{{--                                                          class="btn btn-outline-success">--}}
{{--                                                        PENDING NEXT ACTION--}}
{{--                                                    </span>--}}
                                                </div>
                                            @endif





                                        </div>
                                    </div>

                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.developer.id')
      || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.admin.id')
       || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.verifier.id')
  || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.approver.id')
      )

                                    <div class="card-footer">
                                            <div class="row-cols-12">
                                                @if(sizeof($next_users) > 0 )
                                            <h6 class="mb-2 text-primary">NEXT USER TO ACT</h6>
                                                    @endif
                                        </div>
                                        @foreach( $next_users as $next_user)
                                            <span class="text-xs text-danger text-muted">Name : {{$next_user->name ?? '--'}}</span> <br>
                                            <span class="text-xs text-danger text-muted">Email :{{$next_user->email ?? '--'}}</span> <br>
                                            <span class="text-xs text-danger text-muted">Phone : {{$next_user->mobile_number ?? '--'}}</span> <br>
                                            <span class="text-xs text-danger text-muted">Role  : {{$next_user->role->name ?? '--'}}</span> <br>
                                            <hr>
                                        @endforeach
                                    </div>
                                        @endif

                                </div>



                            </form>

                        </div>
                        <div class="col-xl-5 col-lg-5  col-md-5  col-sm-12   mb-4 mt-4  p-0 mt-3 mb-2 ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3 " style="margin-left: 5%">
                                        <h2 class="text-center"><strong>LOAN DETAILS</strong></h2>
                                        <div class="m-3 text-left">
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Purpose : <span
                                                            class="mb-0"> <b>{{$loan->loan_purpose}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Loan Type : <span
                                                            class="mb-0"> <b>{{$loan->loan->name ?? ""}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Amount : <span
                                                            class="mb-0"> <b>ZMW {{$loan->loan_amount}}</b></span>
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
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Total Payable :<span
                                                            class="mb-0"> <b>ZMW {{$loan->loan_amount_due}}</b> </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Period : <span
                                                            class="mb-0"> <b>{{$loan->repayment_period}} Months</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Monthly Installments : <span
                                                            class="mb-0"> <b>ZMW {{$loan->monthly_installments}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3 " style="margin-left: 5%">
                                        <h2 class="text-center"><strong>SCHEDULE</strong></h2>
                                        <div class="m-3 text-left">
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        Balance : <span
                                                            class="mb-0"> <b>ZMW {{number_format( ($loan->loan_amount_due - $loan->schedules->sum('paid')), 2) }} </b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body  border-top py-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table table-striped table_wrapper">
                                                            <thead>
                                                            <tr>
                                                                <td>Installment</td>
                                                                <td>Amount ZMK</td>
                                                                <td>Due Date</td>
                                                                <td>Paid</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($loan->schedules as $schedule)
                                                                <tr>
                                                                    <td>{{$schedule->installment}}</td>
                                                                    <td> {{ number_format(($schedule->amount - ($schedule->paid ?? 0)),2)}}</td>
                                                                    <td>{{$schedule->date}}</td>
{{--                                                                    @if( $schedule->date  > date('Y-m-d') &&  ($schedule->paid ?? 0) != $schedule->amount )--}}
                                                                        @if( $schedule->date  < date('Y-m-d') )
                                                                        @if( ( $schedule->balance ?? -1 ) == 0)
                                                                            <td><span title="Paid after due date" class="text-success"><i
                                                                                        class="bi bi-check2-circle"></i> {{$schedule->paid ?? 0}}</span>
                                                                            </td>
                                                                        @else
                                                                        <td><span title="Payment is overdue. Please make payment" class="label"><i
                                                                                    class="bi bi-info-circle-fill text-danger"></i> {{$schedule->paid ?? 0}}</span>
                                                                        </td>
                                                                        @endif
                                                                    @else
                                                                        @if( ( $schedule->balance ?? -1 ) == 0)
                                                                            <td><span title="Paid in time" class="text-success"><i
                                                                                        class="bi bi-check2-circle"></i> {{$schedule->paid ?? 0}}</span>
                                                                            </td>
                                                                        @else
                                                                            <td><span title="Pending payment" class="text-info"><i
                                                                                        class="bi bi-dash-circle"></i> {{$schedule->paid ?? 0}}</span>
                                                                            </td>
                                                                        @endif
                                                                    @endif

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
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>



@endsection


@push('custom-scripts')

@endpush
