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
        <div class="row " style="align-content: center">
            <div class="col-xl-8 col-lg-8 col-md-8  col-sm-12 center-block ">
                <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="container-fluid ">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8  offset-2 text-center p-0 mt-3 mb-2 ">
                                <div class="card ">
                                    <h2><strong>Sign Up Your User Account</strong></h2>
                                    <p>Fill all form field to go to next step</p>
                                    <div class="row">
                                        <div class="col-md-12 mx-0">
                                            <form id="msform">
                                                <!-- progressbar -->
                                                <ul id="progressbar">
                                                    <li class="active" id="account"><strong>Loan</strong></li>
                                                    <li id="personal"><strong>Eligibility</strong></li>
                                                    <li id="payment"><strong>Type</strong></li>
                                                    <li id="confirm"><strong>Finish</strong></li>
                                                </ul> <!-- fieldsets -->
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
                                                                            <select id="loan_type" name="loan_type"
                                                                                    onchange="loanPercent(event)"
                                                                                    class="form-control ">
                                                                                <option value="{{$loanProd->id}}">{{$loanProd->name}}</option>
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
                                                                                for="payslip_three">Purpose</label>
                                                                            <input type="text" readonly
                                                                                   class="form-control "
                                                                                   name="loan_purpose"
                                                                                   value="{{$loan_purpose}}"
                                                                                   id="loan_purpose">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group mt-2">
                                                                            <label
                                                                                for="payslip_three">Next Repayment Date</label>
                                                                            <input type="text" readonly
                                                                                   class="form-control "
                                                                                   name="loan_purpose"
                                                                                   value="{{date("D d M Y", strtotime("1 month"))}}"
                                                                                   id="loan_purpose">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group mt-2">
                                                                            <label
                                                                                for="loan_amount">
                                                                                Loan Amount in Kwacha</label>
                                                                            <input type="number" class="form-control "
                                                                                   name="loan_amount" id="loan_amount"
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
                                                                                Repayment Period in Months</label>
                                                                            <input type="number" class="form-control "
                                                                                   onchange="totalRepayment()"
                                                                                   name="repayment_period"
                                                                                   id="repayment_period"
                                                                                   placeholder="How many months? e.g 2 ">
                                                                            <label id="repayment_period_error"
                                                                                   style="display: none"
                                                                                   class="text-danger"> Enter Repayment
                                                                                Period </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group mt-2">
                                                                            <label
                                                                                for="payslip_three">Percentage</label>
                                                                            <input type="number" readonly
                                                                                   class="form-control is-valid"
                                                                                   name="loan_percentage"
                                                                                   value="{{$loanProd->rate_per_month}}"
                                                                                   id="loan_percentage"
                                                                                   placeholder="10 %">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group mt-2">
                                                                            <label
                                                                                for="payslip_three">Arrangement Fee</label>
                                                                            <input type="number" readonly
                                                                                   class="form-control is-valid"
                                                                                   name="arrangement_fee"
                                                                                   value="{{$loanProd->arrangement_fee}}"
                                                                                   id="arrangement_fee">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 mt-2">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="payslip_three">Monthly
                                                                                Repayments</label>
                                                                            <input type="number" readonly
                                                                                   class="form-control is-valid"
                                                                                   name="monthly_amount" id="monthly_amount"
                                                                                   placeholder="ZMW">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group mt-2">
                                                                            <label
                                                                                for="payslip_three">Total Repayment</label>
                                                                            <input type="number" readonly
                                                                                   class="form-control is-valid"
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

                                                    <input type="button" name="next" class="next action-button"
                                                           value="Next Step"/>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title">Loan Eligibility</h2>
                                                        <div id="selected_loan_div"></div>
                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <div class="row gutters">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="monthly_income">
                                                                                Monthly Income</label>
                                                                            <input type="number" class="form-control "
                                                                                   name="monthly_income" id="monthly_income"
                                                                                   placeholder="How much? e.g 5000 ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="other_income">
                                                                                Other Income</label>
                                                                            <input type="number" class="form-control "
                                                                                   name="other_income" id="other_income"
                                                                                   placeholder="How much? e.g 5000 ">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-12">
                                                                        <div class="form-group mt-2">
                                                                            <label
                                                                                for="monthly_deduct">
                                                                                Other Loans / Deduction</label>
                                                                            <input type="number" class="form-control "
                                                                                   name="monthly_deduct"
                                                                                   id="monthly_deduct"
                                                                                   placeholder="Monthly earnings deductions? e.g 2000 ">
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
                                                                                for="nrc_check"> Copy of ID</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group mt-1">
                                                                            <input type="checkbox" class="custom-checkbox"
                                                                                   id="account_check" name="account_check">
                                                                            <label
                                                                                for="account_check"> Active Bank/Mobile
                                                                                Money Account</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group mt-1">
                                                                            <input type="checkbox" class="custom-checkbox"
                                                                                   id="account_statement_check"
                                                                                   name="account_statement_check">
                                                                            <label
                                                                                for="account_statement_check"> Latest
                                                                                Bank/Mobile Money Account Statement</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group mt-1">
                                                                            <input type="checkbox" class="custom-checkbox"
                                                                                   id="payslip_check" name="payslip_check">
                                                                            <label
                                                                                for="payslip_check">Latest 2 months
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
                                                                <option value="">--Choose</option>
                                                                @foreach($customer_types as $customer_type)
                                                                    <option
                                                                        value="{{$customer_type->id}}">{{$customer_type->name}}</option>
                                                                @endforeach
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
                                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-3"><img
                                                                src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                                class="fit-image"></div>
                                                    </div>
                                                    <br><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-7 text-center">
                                                            <h5>You Have Successfully submitted your loan request!</h5>
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
                monthly_interest_payable += parseFloat(loan_percentage_val) * parseFloat(loan_amount / 2);
            }
            var total_loan_repayment = parseFloat(monthly_interest_payable) + parseFloat(loan_amount) + parseFloat(arrangement_fee);
            var monthly = parseFloat(total_loan_repayment) / repayment_period;

            //SET THE CALCULATED VALUES
            document.getElementById('total_repayment').value = round(total_loan_repayment, 2);
            document.getElementById('monthly_amount').value = round(monthly, 2);

            var name = $("#loan_type").find(':selected').data('name');
            var loan_amount = document.getElementById('loan_amount').value;

            //set the text on next tab
            var html_text = '<label>Iam Applying for <b> K' + loan_amount + ' ' + name + '</b> loan';
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".check_eligibility").click(function () {

                /** check for loan eligibility */

                    //input values
                var loan_amount = document.getElementById('loan_amount').value;
                var loan_name = $("#loan_type").find(':selected').data('name');
                var monthly_amount_repayment = document.getElementById('monthly_amount').value;
                var monthly_income = document.getElementById('monthly_income').value;
                var other_income = document.getElementById('other_income').value;
                var monthly_deduct = document.getElementById('monthly_deduct').value;

                //calculate
                var total_monthly = parseFloat(monthly_income) + parseFloat(other_income);
                var deduct_from_limit = parseFloat(total_monthly) * (20 / 100);
                var total_monthly_subtracted = parseFloat(deduct_from_limit) - parseFloat(monthly_deduct);

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

                //response
                if (eligible == true) {
                    Swal.fire(
                        'Eligible',
                        'You are Eligible for a K' + loan_amount + ' ' + loan_name + ' Loan',
                        'success'
                    )
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

                } else {
                    Swal.fire(
                        'Not Eligible',
                        'You are not Eligible for a K' + loan_amount + ' ' + loan_name + ' Loan',
                        'warning'
                    )
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
                        other_income: other_income,
                        monthly_deduct: monthly_deduct,
                        customer_type: customer_type,
                        loan_purpose: loan_purpose,
                        total_repayment: total_repayment,
                    },  // passing the values
                    success: function (res) {
                        var response = JSON.parse(res);

                        var returning = {!! json_encode(config('constants.customer_type.returning')) !!} ;
                        var new_cus = {!! json_encode(config('constants.customer_type.new')) !!} ;

                        var html_div1 = "<div class='col-12'>" +
                            " <div class='form-group'>" +
                            " <label hidden for='monthly_income'> Unique Reference</label> " +
                            "<input hidden type='text' class='form-control' name='uuid' id='uuid1' value='" + response.uuid + "' readonly> " +
                            "</div>" +
                            "</div>" +
                            "" +
                            "<div class='col-12 text-center mt-1 mb-2' > " +
                            "<button class='btn btn-outline-success'>Create Account </button> " +
                            "</div>";

                        var html_div2 = "<div class='col-12'>" +
                            " <div class='form-group'>" +
                            " <label hidden for='monthly_income'> Unique Reference</label> " +
                            "<input hidden type='text' class='form-control' name='uuid' id='uuid2' value='" + response.uuid + "' readonly> " +
                            "</div>"+
                            "</div>" +
                            "" +
                            "<div class='col-12 text-center mt-1 mb-2' > " +
                            "<button class='btn btn-outline-success'>Login to your Account </button> " +
                            "</div>";

                        if(response.customer_type == new_cus){
                            $('#uuid_div_1').html(html_div1);
                        }else if (response.customer_type == returning){
                            $('#uuid_div_2').html(html_div2);
                        }
                        else {

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
