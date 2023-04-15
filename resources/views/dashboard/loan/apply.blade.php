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
            background: #40d961;
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
            <div class="col-lg-8 col-md-8 col-sm-12">
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

                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-8 col-sm-12 ">
                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                    <h2><strong>Sign Up Your User Account</strong></h2>
                                    <p>Fill all form field to go to next step</p>
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mx-0">
                                        <form id="msform">
                                            <!-- progressbar -->
                                            <div class="row justify-content-center">
                                            <ul id="progressbar">
                                                <li class="active" id="account"><strong>Loan</strong></li>
                                                <li id="personal"><strong>Eligibility</strong></li>
                                                <li id="payment"><strong>Type</strong></li>
                                                <li id="confirm"><strong>Finish</strong></li>
                                            </ul>
                                            </div>
                                                <!-- fieldsets -->
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Loan Details</h2>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row gutters">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="loan_amount">
                                                                            Loan Type</label>
                                                                        <select readonly id="loan_type" name="loan_type"
                                                                                onchange="loanPercent(event)"
                                                                                class="form-control ">
                                                                            <option value="{{$loanProd->id}}">{{$loanProd->category->name }}</option>
                                                                        </select>
                                                                        <label id="loan_type_error"
                                                                               style="display: none"
                                                                               class="text-danger"> Select Loan
                                                                            Type </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="payslip_three">Loan Product</label>
                                                                        <input type="text" readonly
                                                                               class="form-control "
                                                                               name="loan_purpose"
                                                                               value="{{$loanProd->name}}"
                                                                               id="loan_purpose">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="payslip_three">Next Repayment Date</label>
                                                                        <input type="text" readonly
                                                                               class="form-control "
                                                                               name="loan_date"
                                                                               value="{{date("D d M Y", strtotime("1 month"))}}"
                                                                               id="loan_date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="payslip_three">Collateral </label>
                                                                        <input type="text" readonly
                                                                               class="form-control "
                                                                               name="loan_date"
                                                                               value=" {{$loanProd->collateral}}"
                                                                               id="loan_date">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group mt-4">
                                                                        <label
                                                                            for="loan_amount">
                                                                            Loan Amount (ZMW)</label> <br>
                                                                        <span class="text-sm-center text-muted "
                                                                            for="loan_amount">
                                                                            A Min of zmw {{$loanProd->lowest_amount}} and a Max of zmw {{$loanProd->highest_amount}}</span>
                                                                        <input type="number" class="form-control "
                                                                               name="loan_amount" id="loan_amount"
                                                                               min="{{$loanProd->lowest_amount}}"
                                                                               max="{{$loanProd->highest_amount}}"
                                                                               onchange="totalRepayment()"
                                                                               placeholder="How much? e.g 5000 ">
                                                                        <label id="loan_amount_error"
                                                                               style="display: none"
                                                                               class="text-danger"> Enter Loan
                                                                            Amount </label>
                                                                    </div>
                                                                </div>
                                                                <div class=" col-12">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="repayment_period">
                                                                            Repayment Period in Months</label> <br>
                                                                        <span class="text-sm-center text-muted ml-2"
                                                                              for="loan_amount">
                                                                            Min of {{$loanProd->lowest_tenure}} month/s  and Max of {{$loanProd->highest_tenure}} month/s</span>
                                                                        <input type="number" class="form-control "
                                                                               onchange="totalRepayment()"
                                                                               name="repayment_period"
                                                                               id="repayment_period"
                                                                               min="{{$loanProd->lowest_tenure}}" max="{{$loanProd->highest_tenure}}"
                                                                               placeholder="How many months? e.g 2 ">
                                                                        <label id="repayment_period_error"
                                                                               style="display: none"
                                                                               class="text-danger"> Enter Repayment
                                                                            Period (months)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="payslip_three">Rate %</label>
                                                                        <input type="number" readonly
                                                                               class="form-control-plaintext "
                                                                               name="loan_percentage"
                                                                               value="{{$loanProd->rate_per_month}}"
                                                                               id="loan_percentage"
                                                                               placeholder="10 %">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="payslip_three">Arrangement Fee (ZMW)</label>
                                                                        <input type="number" readonly
                                                                               class="form-control-plaintext "
                                                                               name="arrangement_fee"
                                                                               value="{{$loanProd->arrangement_fee}}"
                                                                               id="arrangement_fee">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-sm-12 mt-2 ">
                                                                    <div class="form-group mt-2 ">
                                                                        <label
                                                                            for="payslip_three">Monthly
                                                                            Repayments (ZMW)</label>
                                                                        <input type="number" readonly
                                                                               class="form-control "
                                                                               name="monthly_amount" id="monthly_amount"
                                                                               placeholder="ZMW">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="payslip_three">Total Repayment</label>
                                                                        <input type="number" readonly
                                                                               class="form-control "
                                                                               name="total_repayment"
                                                                               id="total_repayment"
                                                                               placeholder="ZMW">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 text-left mt-2" id="calculate_btn"
                                                                     onclick="calculateDisappear()">
                                                                    <button class="btn btn-info">
                                                                        Calculate
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

{{--                                                <div  id="next_btn" style="display:none"    >--}}
                                                    <input type="button" name="next" class="next action-button"
                                                           value="Next Step"/>
{{--                                                </div>--}}

                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Loan Eligibility</h2>
                                                    <div id="selected_loan_div"></div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-12 mt-2">
                                                            <div class="row gutters">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="monthly_income">
                                                                            Monthly Income</label>
                                                                        <input required type="number" class="form-control "
                                                                               name="monthly_income" id="monthly_income"
                                                                               placeholder="How much? e.g 5000 ">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="other_income">
                                                                            Other Income</label>
                                                                        <input required type="number" class="form-control "
                                                                               name="other_income" id="other_income"
                                                                               placeholder="How much? e.g 5000 ">
                                                                    </div>
                                                                </div>
                                                                <div class=" col-12">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="monthly_deduct">
                                                                            Other Loans / Deduction</label>
                                                                        <input required type="number" class="form-control "
                                                                               name="monthly_deduct"
                                                                               id="monthly_deduct"
                                                                               placeholder="Monthly earnings deductions? e.g 2000 ">
                                                                    </div>
                                                                </div>
                                                                <div class=" col-12">
                                                                    <div class="form-group mt-2">
                                                                        <label
                                                                            for="monthly_deduct">
                                                                            Do you have the following loan requirements</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mt-2">
                                                                        <input type="checkbox" class="custom-checkbox"
                                                                               id="citizen_check" name="citizen_check">
                                                                        <label
                                                                            for="citizen_check">I am a Zambian
                                                                            Citizen/Resident</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mt-1">
                                                                        <input type="checkbox" class="custom-checkbox"
                                                                               id="nrc_check" name="nrc_check">
                                                                        <label
                                                                            for="nrc_check">I have a Copy of ID</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mt-1">
                                                                        <input type="checkbox" class="custom-checkbox"
                                                                               id="account_check" name="account_check">
                                                                        <label
                                                                            for="account_check"> i have an Active Bank/Mobile
                                                                            Money Account</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mt-1">
                                                                        <input type="checkbox" class="custom-checkbox"
                                                                               id="account_statement_check" required
                                                                               name="account_statement_check">
                                                                        <label
                                                                            for="account_statement_check"> i have a Latest
                                                                            Bank/Mobile Money Account Statement</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mt-1">
                                                                        <input type="checkbox" class="custom-checkbox"
                                                                               id="payslip_check" name="payslip_check" required>
                                                                        <label
                                                                            for="payslip_check">i have Latest 2 months
                                                                            payslips</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mt-1">
                                                                        <input type="checkbox" class="custom-checkbox"
                                                                               id="guarantor_check"
                                                                               name="guarantor_check">
                                                                        <label
                                                                            for="guarantor_check">Guarantor</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group mt-1">
                                                                        <input type="checkbox" class="custom-checkbox"
                                                                               id="crb_check"
                                                                               name="crb_check" required>
                                                                        <label
                                                                            for="crb_check">I Authorize Chalom Investments to check my CRB statement</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="button" name="previous"
                                                       class="previous action-button-previous" value="Previous"/>
                                                <input
                                                    type="button" id="check_eligibility" name="check_eligibility"
                                                    class="check_eligibility btn btn-outline-success"
                                                    value="Check Now"/>

                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Customer Type</h2>
                                                    <div class="row">

                                                        <label for="customer_type">Are you a new Customer or You are a
                                                            Returning ?</label>
                                                        <select name="customer_type" id="customer_type" required
                                                                class="form-control">
                                                            <option value="">--Choose--</option>
                                                            @if(auth()->check())
                                                                <option value="{{config('constants.customer_type.returning')}}">{{auth()->user()->customerType->name ?? ""}}</option>
                                                            @else
                                                            @foreach($customer_types as $customer_type)
                                                                <option
                                                                    value="{{$customer_type->id}}">{{$customer_type->name}}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>

                                                    </div>
                                                </div>
                                                <input type="button" name="previous"
                                                       class="previous action-button-previous" value="Previous"/> <input
                                                    type="button" name="make_payment" class="submit action-button"
                                                    value="Confirm"/>
                                            </fieldset>

                                        </form>

                                        <fieldset>
                                            <div class="form-card" id="success_div" style="display: none">
                                                <h2 class="fs-title text-center">Saved !</h2> <br><br>
                                                <div class="row justify-content-center">
                                                    <div class="col-3"><img
                                                            src="https://img.icons8.com/fluency/344/ok.png"
                                                            class="fit-image"></div>
                                                </div>

                                                <br><br>
                                                <div class="row justify-content-center">
                                                    <div class="col-7 text-center">
                                                        <h5>Your loan request is pending completion! </h5> <br>
                                                        <span>Please create or login to your account in order to complete and submit your application for processing. Thank you.</span>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row justify-content-center">
                                                    <form id="msform-sign"  id="old_btn" method="post" action="{{route('loan.returning.customer')}}" >
                                                       @csrf
                                                        <div class="row"  id="uuid_div_1" >
                                                        </div>
                                                    </form>

                                                    <form id="msform-create"  id="new_btn" method="post" action="{{route('loan.new.customer')}}"   >
                                                        @csrf
                                                        <div class="row" id="uuid_div_2">
                                                        </div>
                                                    </form>

                                                    <div class="row" id="uuid_div_3">
                                                    </div>

                                                </div>
                                            </div>
                                        </fieldset>

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
    <script>
        //set the percentage
        function loanPercent(e) {
            var percent = $("#loan_type").find(':selected').data('percent')
            document.getElementById('loan_percentage').value = percent;

            var arrangement_fee = $("#loan_type").find(':selected').data('arrangement_fee')
            document.getElementById('arrangement_fee').value = arrangement_fee;

            // highest_amount

        }

        function totalRepayment() {
            //LOAN VARIABLES
            var loan_amount = document.getElementById('loan_amount').value;
            var repayment_period = document.getElementById('repayment_period').value;
            var loan_percentage = document.getElementById('loan_percentage').value;
            var arrangement_fee = document.getElementById('arrangement_fee').value;

            if (repayment_period == "") {
                repayment_period = 1;
            }
            if (loan_percentage == "") {
                loan_percentage = 0;
            }
            //LOAN CALCULATION
            var loan_percentage_val = (loan_percentage / 100);
            var monthly_interest_payable = parseFloat(loan_amount * loan_percentage_val);
            for (var i = 1; i < repayment_period; i++) {
                monthly_interest_payable += parseFloat(loan_percentage_val  || 0 ) * parseFloat(loan_amount / 2);
            }
            var total_loan_repayment = parseFloat(monthly_interest_payable  || 0) + parseFloat(loan_amount || 0) + parseFloat(arrangement_fee  || 0);
            var monthly = parseFloat(total_loan_repayment || 0) / (repayment_period || 0);

            //SET THE CALCULATED VALUES
            document.getElementById('total_repayment').value = round(total_loan_repayment, 2);
            document.getElementById('monthly_amount').value = round(monthly, 2);

            var category = @json( $loanProd->category->name );
            var product = @json( $loanProd->name );
            var loan_amount = document.getElementById('loan_amount').value;

            //set the text on next tab
            var html_text = '<label>You are Applying for a <b> K' + loan_amount + ' ' + product + '</b> loan under '+category+'. Your monthly installments will be K'+round(monthly, 2)+' for '+repayment_period+' months  </label>'  ;
            document.getElementById('selected_loan_div').innerHTML = html_text;


        }

        function calculateDisappear() {
            var loan_amount = document.getElementById('loan_amount').value;
            var repayment_period = document.getElementById('repayment_period').value;
            var loan_percentage = document.getElementById('loan_percentage').value;

            //error fields
            document.getElementById('loan_amount_error').style.display = 'none';
            document.getElementById('repayment_period_error').style.display = 'none';
            document.getElementById('loan_type_error').style.display = 'none';

            var calc = true;

            if (loan_amount == "") {
                calc = false;
                document.getElementById('loan_amount_error').style.display = 'block';
            }
            if (repayment_period == "") {
                calc = false;
                document.getElementById('repayment_period_error').style.display = 'block';
            }
            if (loan_percentage == "") {
                calc = false;
                document.getElementById('loan_type_error').style.display = 'block';
            }

            if (calc == true) {
                var calculate_btn = document.getElementById('calculate_btn');
                calculate_btn.style.display = 'none';
                document.getElementById('next_btn').style.display = 'block';
            }

        }

    </script>

    <script>
        function round(num, decimalPlaces = 0) {
            var p = Math.pow(10, decimalPlaces);
            var n = (num * p) * (1 + Number.EPSILON);
            return Math.round(n) / p;
        }
    </script>

{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}

    <script>
        $(document).ready(function () {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".check_eligibility").click(function () {

                /** check for loan eligibility */

                    //input values
                var loan_amount = parseFloat(document.getElementById('loan_amount').value || 0 ) ;
                var loan_name = @json( $loanProd->name ?? "" );
                var monthly_amount_repayment =parseFloat( document.getElementById('monthly_amount').value  || 0 ) ;
                var monthly_income = parseFloat(document.getElementById('monthly_income').value || 0 ) ;
                var other_income = parseFloat(document.getElementById('other_income').value || 0 ) ;
                var monthly_deduct = parseFloat(document.getElementById('monthly_deduct').value|| 0 ) ;
                var repayment_period =parseFloat( document.getElementById('repayment_period').value || 0) ;
                var dsr = @json( $loanProd->dept_service_ratio );

                //calculate
                var total_monthly = parseFloat(monthly_income  || 0 ) + parseFloat(other_income  || 0 );
                if( dsr > 0){
                    var deduct_from_limit = parseFloat(total_monthly  || 0) * (dsr / 100);
                }else{
                    dsr = 100;
                    var deduct_from_limit = parseFloat(total_monthly  || 0)   ;
                }

                var total_monthly_subtracted = parseFloat(deduct_from_limit  || 0) - parseFloat(monthly_deduct  || 0 );
                var total_income = parseFloat(total_monthly  || 0) - parseFloat(monthly_deduct  || 0 );
                var qualify_for = total_monthly_subtracted * repayment_period ;

                //the checks
                var citizen_check = document.getElementById('citizen_check').checked;
                var account_check = document.getElementById('account_check').checked;
                var account_statement_check = document.getElementById('account_statement_check').checked;
                var guarantor_check = document.getElementById('guarantor_check').checked;
                var payslip_check = document.getElementById('payslip_check').checked;


                //validation rules
                var eligible = false;

                if (
                    (total_monthly_subtracted >= monthly_amount_repayment) &&
                    (citizen_check == true) &&
                    (account_check == true) &&
                    (account_statement_check == true) &&
                    (guarantor_check == true) &&
                    (payslip_check == true)
                ) {
                    eligible = true;
                }



                var lowest_amount = @json( $loanProd->lowest_amount ?? 0 );
                var highest_amount = @json( $loanProd->highest_amount ?? 0 );
                var lowest_tenure = @json( $loanProd->lowest_tenure ?? 0 );
                var highest_tenure = @json( $loanProd->highest_tenure ?? 0 );
                var loan_type = @json( $loanProd->category->name ?? "0" );



                if( (loan_amount >= lowest_amount)  &&  (loan_amount <= highest_amount) ){
                    if( (repayment_period >= lowest_tenure)  && (repayment_period <= highest_tenure) ){

                        //response
                        if (eligible == true) {
                            try {
                                Swal.fire(
                                    'Eligible',
                                    'You are Eligible for a ZMW ' + loan_amount + ' ' + loan_name + ' Loan. Your monthly repayment is ZMW '+monthly_amount_repayment+' for '+repayment_period+' months',
                                    'success'
                                )
                            } catch (e) {
                               alert('You are Eligible for a ZMW ' + loan_amount + ' ' + loan_name + ' Loan. Your monthly repayment is ZMW '+monthly_amount_repayment+' for '+repayment_period+' months' ) ;
                            }

                            //   alert( 'You are Eligible for a K' + loan_amount + ' ' + loan_name + ' Loan');

                            current_fs = $(this).parent();
                            next_fs = $(this).parent().next();
                            //Add Class Active
                            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                            //show the next fieldset
                            next_fs.show();
                            //hide the current fieldset with style
                            current_fs.animate({opacity: 0}, {
                                step: function (now) {
                                    // for making fielset appear animation
                                    opacity = 1 - now;

                                    current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                    });
                                    next_fs.css({'opacity': opacity});
                                },
                                duration: 600
                            });

                        }
                        else {

                            try {
                                Swal.fire(
                                    'Not Eligible',
                                    'You are not Eligible for a zmw ' + loan_amount + ' ' + loan_name + ' Loan. Your monthly repayment of zmw '+monthly_amount_repayment+' is more than '+dsr+'%  (DSR threshold) of your total monthly income (zmw '+total_income+'). For a repayment period of '+repayment_period+' months, you qualify for a maximum of zmw '+qualify_for+'.',
                                    'warning'

                                )
                            } catch (e) {
                                alert('You are not Eligible for a zmw ' + loan_amount + ' ' + loan_name + ' Loan. Your monthly repayment of zmw '+monthly_amount_repayment+' is more than '+dsr+'%  (DSR threshold) of your total monthly income (zmw '+total_income+'). For a repayment period of '+repayment_period+' months, you qualify for a maximum of zmw '+qualify_for+'.');
                            }

                        }

                    }else{
                        try {
                            Swal.fire(
                                'Not Eligible',
                                'Your repayment period (' + repayment_period + ' months ) should be between ' + lowest_tenure + ' months and '+highest_tenure+' months, for this type of loan ('+loan_name+' under '+loan_type+')',
                                'warning'

                            )
                        } catch (e) {
                            alert('Your repayment period (' + repayment_period + ' months ) should be between ' + lowest_tenure + ' months and '+highest_tenure+' months, for this type of loan ('+loan_name+' under '+loan_type+')');
                        }

                    }
                }else{
                    try {
                        Swal.fire(
                            'Not Eligible',
                            'Your Loan Amount (K' + loan_amount + ') should be between K' + lowest_amount + ' and K'+highest_amount+'  for this type of loan ('+loan_name+' under '+loan_type+')',
                            'warning'
                        )
                    } catch (e) {
                        alert(
                            'Your Loan Amount (K' + loan_amount + ') should be between K' + lowest_amount + ' and K'+highest_amount+'  for this type of loan ('+loan_name+' under '+loan_type+')');
                    }

                }




            });

            $(".next").click(function () {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

//Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
                previous_fs.show();

//hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
// for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function () {

                //input values
                var loan_amount = document.getElementById('loan_amount').value;
                var loan_prod = document.getElementById('loan_type').value;
                var repayment_period = document.getElementById('repayment_period').value;
                var monthly_income = document.getElementById('monthly_income').value;
                var other_income = document.getElementById('other_income').value;
                var monthly_deduct = document.getElementById('loan_amount').value;
                var customer_type =  document.getElementById('customer_type').value;
                var loan_purpose = document.getElementById('loan_purpose').value;
                var total_repayment = document.getElementById('total_repayment').value;

                var success_div =  document.getElementById('success_div').style.display = 'block';


                var url = '{!! route('loan.save') !!}';
                var csrf = '{!! @csrf_token() !!}';

                /* AJAX */
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                /* AJAX */
                $.ajax({
                    type: "POST",  //type of method
                    url: url,  //your page
                    data: {
                        _token: csrf,
                        loan_amount: loan_amount,
                        loan_prod: loan_prod,
                        repayment_period: repayment_period,
                        monthly_income: monthly_income,
                        other_income: other_income ,
                        monthly_deduct: monthly_deduct,
                        customer_type: customer_type,
                        loan_purpose: loan_purpose,
                        total_repayment: total_repayment,
                    },  // passing the values
                    success: function (res) {
                        var response = JSON.parse(res);

                        var returning = {!! json_encode(config('constants.customer_type.returning')) !!} ;
                        var new_cus = {!! json_encode(config('constants.customer_type.new')) !!} ;

                        var html_div2 = "<div class='col-12'>" +
                            " <div class='form-group'>" +
                            " <label hidden for='monthly_income'> Unique Reference</label> " +
                            "<input hidden type='text' class='form-control' name='uuid' id='uuid1' value='" + response.uuid + "' readonly> " +
                            "</div>" +
                            "</div>" +
                            "" +
                            "<div class='col-12 text-center mt-1 mb-2' > " +
                            "<button class='btn btn-success'>Create Account </button> " +
                            "</div>";

                        var html_div1 = "<div class='col-12'>" +
                            " <div class='form-group'>" +
                            " <label hidden for='monthly_income'> Unique Reference</label> " +
                            "<input hidden type='text' class='form-control' name='uuid' id='uuid2' value='" + response.uuid + "' readonly> " +
                            "</div>"+
                            "</div>" +
                            "" +
                            "<div class='col-12 text-center mt-1 mb-2' > " +
                            "<button class='btn btn-success'>Login to your Account </button> " +
                            "</div>";

                        var html_div3 = "<div class='col-12'>" +
                            " <div class='text-center'>" +
                            "<p  > <b>" + response.message + "</b> </p> " +
                            "</div>"+
                            "</div>" +
                            "<div class='col-12 text-center mt-1 mb-2' > " +
                            "<a href='' class='btn btn-success'>Restart </a> " +
                            "</div>";

                        if(response.error){
                            $('#uuid_div_3').html(html_div3);
                        }else{
                            if(response.customer_type == new_cus){
                                $('#uuid_div_2').html(html_div2);
                            }else if (response.customer_type == returning){
                                $('#uuid_div_1').html(html_div1);
                            }
                            else {

                            }
                        }





                    }
                });


                //
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });

                return false;
            })

        });
    </script>
@endpush
