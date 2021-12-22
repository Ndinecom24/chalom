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
        <div class="row">
            <div class="col-8 offset-2">
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
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12 mb-4 mt-4 p-0 mt-3 mb-2">
                            <form id="finish_apply_form" action="{{ route('loan.approve', compact('loan' )) }}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3  mr-2">
                                    <div class="row">
                                        <div class="col-sm-3 ">
                                            <div class=" text-end">
                                                @if( ($loan->customer->avatar ?? "" ) == "" )
                                                    <img class="nav-item " width="60%"
                                                         src="{{asset('images/user.png')}}" alt="">
                                                @else
                                                    <img class="nav-item " width="60%"
                                                         src="{{$loan->customer->avatar ?? ""}}"
                                                         alt="{{asset('images/user.png')}}">
                                                @endif
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

                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="name">Full Name : <span
                                                                        class="text-dark "> {{$loan->customer->name}} </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="eMail">Email : <span
                                                                        class="text-dark">{{$loan->customer->email}}</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="phone">Phone : <span
                                                                        class="text-dark">{{$loan->customer->mobile_number}}</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="dob">Date of Birth : <span
                                                                        class="text-danger">{{$loan->customer->dob}}</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="nid">National Identity<span
                                                                        class="text-dark">{{$loan->customer->nid}}</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <label for="gender">Gender : <span
                                                                        class="text-dark">{{$loan->customer->gender }}</span></label>
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
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="Street">Plot and Street : <span
                                                                    class="text-dark">{{$loan->customer->plot_street ?? "" }}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="ciTy">City : <span
                                                                    class="text-dark">{{$loan->customer->city ?? "" }}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="sTate">Country : <span
                                                                    class="text-dark">{{$loan->customer->country ?? "Zambia" }}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
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
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="role_id">Work Status : <span
                                                                    class="text-dark">{{$loan->customer->work->name ?? "--Choose--" }}</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="customer_type_id">User-Type <span
                                                                    class="text-dark">{{$loan->customer->customerType->name }}</span>
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
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="kin_name">Full Name : <span
                                                            class="text-dark">{{$loan->customer->kin->name ?? "" }}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="kin_phone">Phone : <span
                                                            class="text-dark">{{$loan->customer->kin->phone ?? "" }}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="kin_email">Email : <span
                                                            class="text-dark">{{$loan->customer->kin->email ?? "" }}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="kin_work">Work Status : <span
                                                            class="text-dark">{{$loan->customer->kin->work_status ?? "" }}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="kin_work_place">Work/School/Institution/Home : <span
                                                            class="text-dark">{{$loan->customer->kin->work_place ?? "" }}</span></label>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
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
                                                    <div class="col-6">
                                                        <iframe id="{{$payslip->id}}"
                                                                src="{{$payslip->path }}"
                                                                style="width:100%; height: 1000px"
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
                                                    <div class="col-6">
                                                        <iframe id="{{$statement->id}}"
                                                                src="{{$statement->path }}"
                                                                style="width:100%; height: 1000px"
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
                                            @if($loan->customer->identity != null)
                                                <div class="col-6">
                                                    <iframe id="{{$loan->customer->nrc->id}}"
                                                            src="{{$loan->customer->nrc->path }}"
                                                            style="width:100%; height: 1000px"
                                                            title="{{$loan->customer->nrc->name}}"></iframe>
                                                    <span>{{number_format( $loan->customer->nrc->file_size, 2) }}MB {{$loan->customer->nrc->name}} </span>
                                                    <span> | </span>
                                                    <a href="{{$loan->customer->nrc->path}}"
                                                       target="_blank">View</a>
                                                    <span> | </span>
                                                    <a href="#" data-toggle="modal"
                                                       data-sent_data="{{$loan->customer->nrc}}"
                                                       data-target="#modal-change">Edit</a>

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                        <div class="col-12 mt-1 mb-3">
                                            <label> <b>Current Status : {{$loan->statuses_id }}</b></label>
                                        </div>

                                        @if($loan->statuses_id == config('constants.status.loan_request'))
                                        <div class="row-cols-6">
                                            <button type="submit" name="Submit" disabled
                                                    class="btn btn-outline-success"> Approve
                                            </button>
                                        </div>
                                        @elseif($loan->statuses_id == config('constants.status.loan_request_login'))
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="eMail">Comment<span class="text-danger">*</span></label>
                                                    <input type="text" readonly
                                                           class="form-control" id="comment" name="comment"
                                                           placeholder="Enter comment for your action">
                                                </div>
                                            </div>
                                                <div class="col-2">
                                                    <label for="approve"><span class="text-success">Approve</span></label>
                                                    <button type="submit" name="Submit" readonly
                                                            class="btn btn-outline-success"> <i class="ui-icon ui-icon-circle-check"></i>
                                                    </button>
                                                </div>
                                                <div class="col-2">
                                                    <label for="reject"><span class="text-danger">Reject</span></label>
                                                    <button type="submit" name="Reject" readonly
                                                            class="btn btn-outline-danger"> <i class="ui-icon ui-icon-circle-close "></i>
                                                    </button>
                                                </div>
                                        @else
                                            <div class="row-cols-6">
                                                <button type="submit" name="Submit"
                                                        class="btn btn-outline-success"> Approve
                                                </button>
                                            </div>

                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </form>

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
